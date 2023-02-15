<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Categoria extends Model
{
    public function getIdCatedoriaByName($nameCategoria){
//        $prod -> categoria_id = Categoria::where('name', $request->input('selecaoCategoria'))->get[0]->id;
            $cat = Categoria::where('name',$nameCategoria)->get()[0]->id;
            return $cat;
    }
}
