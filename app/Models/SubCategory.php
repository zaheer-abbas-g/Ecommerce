<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','slug','status','category_id','showhome'];

    public function Categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
