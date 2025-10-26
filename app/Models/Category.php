<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'category_id');
    }
}
