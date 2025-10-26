<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model{

        protected $fillable = [
        'name',
        'id',
        'role_id',
        'category_id',
        'description',
        'link',
        'photo',
        'status',
    ];

        public function role() {
            return $this->belongsTo(Role::class, 'role_id');
        }

        public function category() {
            return $this->belongsTo(Category::class, 'category_id');
        }
}
