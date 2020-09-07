<?php

namespace App\Http\Controllers;

use App\comentario;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    private $comentarios;

    public function __construct(comentario $comentario){
        $this->comentarios = $comentario;
     }

     public function comenta(Request $request){

        $data = $request->all();

        $insert = $this->comentarios->create($data);

        if($insert){
            $comentc['success'] = true;
            echo json_encode($comentc);
        }
     }

}
