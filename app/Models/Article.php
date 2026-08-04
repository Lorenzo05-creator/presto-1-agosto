<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
