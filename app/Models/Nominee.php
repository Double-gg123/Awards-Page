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
        'social_handle', 
        'reason', 
        'image'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    // This is for the nomination records
    public function nominations(): HasMany
    {
        return $this->hasMany(Nomination::class);
    }

    // ADD THIS for the Dashboard Controller to work
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}