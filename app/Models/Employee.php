<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function department(){
        return $this->belongsTo(Department::class,'department_id' , 'department_id');
    }
}
