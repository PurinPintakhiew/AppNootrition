<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipment';

    public function category(){
        return $this->belongsTo(Categories::class,'categories_id' , 'categories_id');
    }

}
