<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeReleased(Builder $query): void
    {
        $query->whereNotNull('released')
            ->where('released_at', '<=', now())
            ->latest('released_at');
    }

    public function isPublished(): Attribute
    {
        return Attribute::get(
            fn () =>  $this->released_at !== null && $this->released_at->isBefore(now())
        );
    }
}
