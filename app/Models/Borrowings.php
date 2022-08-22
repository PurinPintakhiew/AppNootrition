<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowings extends Model
{
    use HasFactory;
    protected $table = 'borrowings';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
