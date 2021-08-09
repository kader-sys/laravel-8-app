<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['title', 'body', 'slug', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
