<?php
namespace App\Repositories;

use App\Models\Products;

class  ProductsRepository{

    public static function all(){
       return Products::all();
    }
}
