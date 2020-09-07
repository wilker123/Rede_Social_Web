<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{


    public function index(){
        return view('site.home');
    }

    public function logout(){
        Auth::logout();
        return view('site.home');
    }

/*
    public function dashboard(){

        var_dump($request->all());

        $credents = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credents)){
            return redirect()->route('usuario.verifica');
        }
        return redirect()->back()->withInput()->withErrors('Não conferem com os dados');

    }

    public function verifica(){
        if(Auth::check() === true){
            return view('site.paginaInicial');
        }
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin');
    }

    public function store(User $request){
        $data = $request->all();

        $insert = $this->usuario->create($data);

        if($insert){
            return view('site.paginaInicial');
        }else{
            return redirect()->back();
        }

    }
*/
}
