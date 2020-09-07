
@extends('site.template.template')

@section('corpo')

<div class="container-fluid">

        <div id="mySidebar" class="sidebar" >
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


   <div class="row">

    <form class="col s12" method="POST" action="{{ route('register') }}" >

    @csrf

    <div class="row">

      <h2 style="color: #AB59FF;position: relative;top: -40px;text-indent: 30px">Registro</h2>
      <h6 style="color: #AB59FF;position: relative;top: -50px;text-indent: 30px">Criar uma conta é bem facil e rápido</h6>

        <div class="input-field col s6">
          <input id="last_name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
          <label for="last_name" style="color: #AB59FF;font-family: arial;font-size: 20px">Nome</label>
          @error('name')

            <h6 style="font-size:15px;color:red">{{$message}}</h6>

		@enderror
        </div>


        <div class="input-field col s6">
          <input id="last_usuario" name="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" value="{{old('usuario')}}">
          <label for="last_usuario" style="color: #AB59FF;font-family: arial;font-size: 20px">Usuário</label>

          @error('usuario')

<h6 style="font-size:15px;color:red">{{$message}}</h6>

@enderror

        </div>


      </div>
      <div class="row">

     <div class="input-field col s6">
          <input id="last_email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
          <label for="last_email" style="color: #AB59FF;font-family: arial;font-size: 20px">Email</label>

          @error('email')

<h6 style="font-size:15px;color:red">{{$message}}</h6>

@enderror

        </div>

       <div class="input-field col s6">
          <input id="last_senha" name="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
          <label for="last_senha" style="color: #AB59FF;font-family: arial;font-size: 20px">senha</label>

          @error('password')

<h6 style="font-size:15px;color:red">{{$message}}</h6>

@enderror

        </div>

     </div>
      <div class="row">
         <div class="input-field col s6">
          <input id="last_nascimento" name="data_nascimento" type="text" class="form-control @error('data_nascimento') is-invalid @enderror" value="{{old('data_nascimento')}}">
          <label for="last_nascimento" style="color: #AB59FF;font-family: arial;font-size: 20px">Data de Nascimento</label>

          @error('data_nascimento')

<h6 style="font-size:15px;color:red">{{$message}}</h6>

@enderror

        </div>

        <div class="input-field col s6">
          <input id="confirm" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation')}}">
          <label for="confirm" style="color: #AB59FF;font-family: arial;font-size: 20px">Confirmar a senha</label>

          @error('password_confirmation')

<h6 style="font-size:15px;color:red;">{{$message}}</h6>

@enderror

        </div>

      </div>


<br>
    <center>
        <input type="submit" id="registrar">
      <h5 style="font-size: 15px">Ao clicar no botão de registro você concorda com todos os<br>nossos Termos,Política de Dados e Política de Cookies</h5>
    </center>

    </form>
  </div>



        </div>
      <center><br><br><br><br><br>

        <div class="col-md-4 col-sm-10 col-xs-4 col-lg-12" id="teste">

            <img src="{{url('assets/imgs/imgHome/LogoBranca.png')}}" width="20%">

        </div>

        <div id="main">

            <button class="openbtn" onclick="openNav()">Registro</button>
            <button class="openbtn" onclick="openlogin()">Login</button>

        </div>



      </center>
    <div id="frase"
    >
      <h6 id="t" style="color: white;position: relative;top: 20px;text-indent: 30px">Compartilhe seus melhores momentos</h6>

    </div>

<!--Div do form do login-->

    <div id="mySidebar2" class="sidebar">
          <a href="javascript:void(0)" class="closebtn" onclick="closelogin()">&times;</a>
<br><br>

    <div class="row">
        <form class="col s12" method="POST" action="{{ route('login') }}">

            @csrf
            <div class="row">
                <center>
                    <h2 style="color: #AB59FF;position: relative;top: -40px;">Login</h2>
                </center>
                <div class="input-field col s7" style="margin-left:120px">
                    <input id="input_text" name="email" type="text" data-length="10">
                    <label style="color: #AB59FF;font-family: arial;font-size: 25px" for="input_text">Email do usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s7" style="margin-left:120px;">
                    <input id="input" name="password" type="password" data-length="10">
                    <label style="color: #AB59FF;font-family: arial;font-size: 25px" for="input">Senha do usuário</label>
            </div>


        <center>

        <input type="submit" id="registrar2">

    </center>


        </div>
      </form>

    </div>

    </div>



        <script type="text/javascript">

        function openNav() {
  document.getElementById("mySidebar").style.width = "800px";
  document.getElementById("main").style.display = "none";
  document.getElementById("teste").style.width = "100%";
  document.getElementById("teste").style.marginLeft = "300px";
  document.getElementById("frase").style.marginLeft = "850px";
  document.getElementById("frase").style.fontFamily = "arial";
  document.getElementById("frase").style.fontSize = "500px";

}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.display = "block";
  document.getElementById("teste").style.width = "100%";
  document.getElementById("teste").style.marginLeft = "0";
  document.getElementById("frase").style.marginLeft = "0";

}
function openlogin() {
  document.getElementById("mySidebar2").style.width = "550px";
  document.getElementById("main").style.display = "none";
  document.getElementById("teste").style.width = "100%";
  document.getElementById("teste").style.marginLeft = "300px";
  document.getElementById("frase").style.marginLeft = "850px";
  document.getElementById("frase").style.fontFamily = "arial";
  document.getElementById("frase").style.fontSize = "500px";

}

function closelogin() {
  document.getElementById("mySidebar2").style.width = "0";
  document.getElementById("main").style.display = "block";
  document.getElementById("teste").style.width = "100%";
  document.getElementById("teste").style.marginLeft = "0";
  document.getElementById("frase").style.marginLeft = "0";

}
    </script>

@endsection
