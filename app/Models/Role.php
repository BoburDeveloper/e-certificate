<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'name',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'role_id');
    }
}
