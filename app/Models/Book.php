<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;
use App\Models\User;


class Book extends Model
{
    use HasFactory;

    public function borrowingsByUser()
    {
        return $this->hasManyThrough(User::class, Borrowing::class);

    }
    
}
