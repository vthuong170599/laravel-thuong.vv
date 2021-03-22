<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','status'];

    public function getAllPost(){
        return $this->hasOne(Category::class,'id','category');
    }
}
