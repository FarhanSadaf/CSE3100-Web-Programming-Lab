<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Timestamps are not used
    public $timestamps = false;

    // Define the M:M relationship between Post and Tag with a pivot table 'post_tag'
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
