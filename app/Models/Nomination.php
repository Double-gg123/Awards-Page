<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
protected $fillable = [
    'nominee_id',
    'nominee_type',
    'name',
    'email',
    'phone',
    'category_id',
    'sub_category',
    'reason',
    'image',
    'nomination_count',
    'user_id',
  'last_free_nomination',
];
public function nominee()
{
    return $this->belongsTo(Nominee::class);
}



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}