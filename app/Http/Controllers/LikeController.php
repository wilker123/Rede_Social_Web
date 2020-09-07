<?php

namespace App\Http\Controllers;
use App\User;
use App\Like;
use App\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    private $like;

    public function __construct(Like $like){
        $this->like = $like;
    }


    public function like(Request $request)
    {

        $data = $request->all();



        $data['like'] = ( !isset($dataForm['like']) ) ? 0 : 1;



        $insert = $this->like->create($data);

        if($insert){
            $like['success'] = true;
            echo json_encode($like);
        }

    }


    public function deslike(Request $request){
        $data = $request->all();

        $delete = $this->like->delete($data);

        if($delete){
            $del['success'] = true;
            echo json_encode($del);
        }
    }

}
