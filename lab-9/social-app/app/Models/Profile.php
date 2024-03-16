<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define the 1:1 relationship between Profile and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
