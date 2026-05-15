<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nominee extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'sub_category_id',
        'reason',
        'image',
        'socials',       // ← replaces 'social_handle'
    ];

    protected $casts = [
        'socials' => 'array',   // auto encode/decode JSON
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function nominations(): HasMany
    {
        return $this->hasMany(Nomination::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}