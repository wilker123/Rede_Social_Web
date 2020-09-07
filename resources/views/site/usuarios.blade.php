@extends('site.template.templateUser')

@section('content')

<div class="row">


<div class="perso">
<!-- Card 1 -->
<button class="btn" style="color: white;margin-top:-60px;margin-left:-150px">
   <i class="fas fa-photo-video"></i><a style="color:white" href="{{url('/home')}}">Feed</a>
</button>

@foreach($users as $user)


	 <div class="perfil-card">

          <button class="btn" type="submit" name="">
          <i class="fas fa-user-times"></i></button>

          <img src="{{url('storage/users/'.$user->foto_perfil)}}" width="140" height="140">


              <div class="info-perfil">
                <h4 style="font-size: 20px;">Usuário Aleatório</h4>
                <h6>@user_name</h6>

              <div class="seguidores">
                <h6>Seguidores</h6><p>180 mil</p>
              </div>

                <h6>Seguindo</h6><p>168</p>
            </div>
        </div>

@endforeach

</div>

</div>

@endsection
