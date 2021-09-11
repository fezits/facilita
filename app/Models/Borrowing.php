<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasManyThrough(User::class, Borrowing::class);

    }

}
