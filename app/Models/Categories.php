<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categories extends Model
{
    use HasFactory;
    public function getAllCategory(){
        return DB::table('menu')->get();
    }
    public function add(){

    }
    public function edit(){

    }
    public function postedit($id){
        return $id;
    }
    public function delete(){

    }
}
