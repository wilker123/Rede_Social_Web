<?php

namespace App\Http\Controllers;

use Cache;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $data = $this->post;

        $data->usuario = auth()->user()->id;
        $data->nome_usuario = auth()->user()->name;
        $data->perfil = auth()->user()->foto_perfil;
        $data->postagem = $request->hasFile('postagem');
        $data->titulo = $request->titulo;
        $insert = $data->save();

        if($insert){
            return redirect('home');
        }else{
            return redirect()->back();
        }
        */

        $data = $request->all();

        $data['usuario'] = auth()->user()->id;
        $data['nome_usuario'] = auth()->user()->usuario;
        $data['perfil'] = auth()->user()->foto_perfil;

        if($request->hasFile('postagem') && $request->postagem->isValid()){
            $imagePath = $request->postagem->store('postes');

            $data['postagem'] = $imagePath;

        }
        $insert = $this->post->create($data);

        if($insert){
            return redirect('home');
        }else{
            return redirect()->back()->witInput()->withErrors['Deu ruim'];
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       //
/*Relacionamento de 1 para 1
        if($user){
            echo "<h1>Deu bom</h1>";
            echo "<p>Nome: {$user->name} Email: {$user->email}</p>";
        }

        $postagem = $user->posts()->first();

        if($postagem){
            echo "Titulo: {$postagem->usuario}";
        }

*/
    $user = User::where('id', $id)->first();


    $posts = $user->posts()->get();

    if($posts){
        return view('site.perfil', compact('posts'));
    }

    }

//relacionamento de 1 para muitos

    public function visualiza($id){
        $post = Post::find($id);
        $like = new Like();
        $like = $like->where('user_id', auth()->user()->id)->where('id_post', $id)->first();
        $comentarios = DB::table('comentarios')
        ->join('posts', 'posts.id', '=','comentarios.post')
        ->select('comentarios.*')
        ->get();
        return view('site.showPost',compact('post','comentarios','like'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {

    }
}
