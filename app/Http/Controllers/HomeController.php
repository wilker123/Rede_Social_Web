<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;
use App\comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;

class HomeController extends Controller
{

    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        $posts = $this->post->all()->sortByDesc('id');
        $comentarios = DB::table('comentarios')
        ->join('posts', 'posts.id', '=','comentarios.post')
        ->select('comentarios.*')
        ->get();

        return view('site.paginaInicial', compact('posts','comentarios'));


    }


    public function editar(){

        return view('site.personaliza');
    }

    public function atualiza(Request $request){
        $user = auth()->user();

        $data = $request->all();

        $data['foto_perfil'] = $user->foto_perfil;
        if($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()){
            if($user->foto_perfil)
                $name = $user->foto_perfil;
            else
                $name = $user->id.$user->name;

            $extensao = $request->foto_perfil->extension();
            $nameFile = "{$name}.{$extensao}";

            $data['foto_perfil'] = $nameFile;

            $upload = $request->foto_perfil->storeAs('users', $nameFile);

            if(!$upload)
                return redirect()->back();

        }

        $update = $user->update($data);

        if($update){
            return redirect('home');
        }

    }

    public function config(){
        return view('site.config');
    }

    public function userVisu($id){
        $user = User::find($id);
        $post = new Post();
        $posts = $post->where('usuario', $id)->get();

        return view('site.perfil',compact('user', 'posts'));
    }


    public function visualizarFeed($id){

        $post = Post::find($id);
        $like = new Like();
        $like = $like->where('user_id', auth()->user()->id)->where('id_post', $id)->first();
        $comentarios = DB::table('comentarios')
        ->join('posts', 'posts.id', '=','comentarios.post')
        ->select('comentarios.*')
        ->get();
        return view('site.visualizafeed',compact('post','comentarios', 'like'));
    }

}
