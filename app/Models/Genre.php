<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class)
            ->withPivot('is_active')
            ->withTimestamps();
    }
}
