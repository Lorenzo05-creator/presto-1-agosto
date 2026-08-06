<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'is_accepted',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function setAccepted(?bool $value): void
    {
        $this->is_accepted = $value;
        $this->save();
    }

    public function scopeAccepted($query)
    {
        return $query->where('is_accepted', true);
    }

    public static function toBeRevisedCount(): int
    {
        return self::whereNull('is_accepted')->count();
    }
}