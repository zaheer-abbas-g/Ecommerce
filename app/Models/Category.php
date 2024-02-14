<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','slug','image','status','show_home'];

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id','id');
    }


    // public function scopeSort($query, array $params = []) {
    //     return $query->orderBy('id')->orderBy('id','desc');
    // }
}
