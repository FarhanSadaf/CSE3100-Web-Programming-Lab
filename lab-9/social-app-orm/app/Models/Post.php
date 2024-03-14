<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the M:1 relationship between User and Post
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the M:M relationship between Post and Tag with a pivot table 'post_tag'
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
