<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Nomination, Nominee, Category, SubCategory, User};
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NominationController extends Controller
{
    public function index()
    {
        return $this->create();
    }

    public function create()
    {
        $categories = Category::with('subCategories')
            ->orderBy('name', 'asc')
            ->get();

        $nominees = Nominee::withCount('nominations')
            ->orderByDesc('nominations_count')
            ->take(4)
            ->get();

        return view('events.nomination', compact('categories', 'nominees'));
    }

    public function store(Request $request)
    {
         \Log::info('FORM SUBMITTED', $request->all());

        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|email',
            'phone'           => 'required|string|max:20',
            'category_id'     => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'reason'          => 'required|string|min:10',

            // socials
            'socials'            => 'nullable|array',
            'socials.*.platform' => 'nullable|string|max:50',
            'socials.*.handle'   => 'nullable|string|max:100',

            // image
            'cropped_image' => 'nullable|string',
            'image'         => 'nullable|image|max:51200',
        ]);

        \Log::info('VALIDATION PASSED');
        $now = Carbon::now();

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | USER ACCOUNT HANDLING (AUTO CREATE IF NOT EXISTS)
            |--------------------------------------------------------------------------
            */

            $user = User::where('email', $request->email)
                        ->orWhere('phone', $request->phone)
                        ->first();

            $plainPassword = null;

            if (!$user) {

                $plainPassword = Str::random(10);

                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'phone'    => $request->phone,
                    'password' => Hash::make($plainPassword),
                ]);

                // Send login credentials email
                Mail::to($user->email)->send(
                    new \App\Mail\AutoLoginCredentialsMail($user, $plainPassword)
                );
            }

            /*
            |--------------------------------------------------------------------------
            | HANDLE IMAGE
            |--------------------------------------------------------------------------
            */

            $imagePath = null;

            if ($request->cropped_image) {

                $image = preg_replace('#^data:image/\w+;base64,#i', '', $request->cropped_image);
                $image = base64_decode($image);

                $fileName = 'nominees/' . time() . '_' . uniqid() . '.jpg';

                Storage::disk('public')->put($fileName, $image);

                $imagePath = $fileName;

            } elseif ($request->file('image')) {

                $imagePath = $request->file('image')->store('nominees', 'public');
            }

            /*
            |--------------------------------------------------------------------------
            | CREATE / FIND NOMINEE
            |--------------------------------------------------------------------------
            */

            $nominee = Nominee::firstOrNew(
                [
                    'name' => $request->name,
                    'sub_category_id' => $request->sub_category_id,
                ],
                [
                    'category_id' => $request->category_id,
                    'reason'      => $request->reason,
                    'image'       => $imagePath,
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | SOCIALS
            |--------------------------------------------------------------------------
            */

            if ($request->socials) {

                $cleanSocials = array_values(array_filter($request->socials, function ($item) {
                    return !empty($item['platform']) && !empty($item['handle']);
                }));

                $nominee->socials = json_encode($cleanSocials);
                $nominee->save();
            }

            /*
            |--------------------------------------------------------------------------
            | NOMINATION LOGIC
            |--------------------------------------------------------------------------
            */

            $nomination = Nomination::where('nominee_id', $nominee->id)
    ->where('user_id', $user->id)
    ->first();
          
            if ($nomination) {

                $canVoteFree = !$nomination->last_free_nomination
                    || $now->diffInHours($nomination->last_free_nomination) >= 24;

                if ($canVoteFree) {

                    $nomination->increment('nomination_count');

                    $nomination->update([
                        'last_free_nomination' => $now
                    ]);

                    DB::commit();

                    return back()->with('success', 'Free nomination recorded successfully!');
                }

                DB::commit();

                return redirect()->route('nomination.pay', [
                    'nominee_id' => $nominee->id
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | FIRST NOMINATION
            |--------------------------------------------------------------------------
            */

            Nomination::create([
                'nominee_id' => $nominee->id,
                'category_id' => $request->category_id,
                'nomination_count' => 1,
                'last_free_nomination' => $now,

                // NEW LINK TO USER
                'user_id' => $user->id,
            ]);

            DB::commit();

            return back()->with('success', 'Nomination submitted successfully!');

          } catch (\Exception $e) {

            DB::rollBack();

            dd($e->getMessage(), $e->getTrace());

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}