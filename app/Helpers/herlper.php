

<?php

use App\Models\Category;

  //  echo "hello zaheer";

   function getCategories(){

    return  Category::with('subCategories:id,category_id,name')
    ->where('show_home','Yes')  
    ->where('status',1) 
    ->orderBy('name','ASC')
    ->orderBy('id','DESC')
    ->get();
    
  }
?>