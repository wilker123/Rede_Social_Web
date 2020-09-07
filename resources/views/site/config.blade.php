@extends('site.template.templateConfig')

@section('content')


<div class="container-fluid">

<button class="btn" style="color: white; float: right;">
    <i class="fas fa-sign-out-alt"></i> <a style="color:white" href="{{url('/')}}">Logout</a>
</button>

<button class="btn" style="color: white;">
   <i class="fas fa-photo-video"></i><a style="color:white" href="{{url('/home')}}">Feed</a>
</button>


    <div class="divCentral" id="myGroup">
        <center>
            <p class="nav-menu">
                <nav id="port">

                    <tr>
                        <td><a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                                aria-controls="multiCollapseExample1">Informações do usuário</a></td>
                    </tr>


                </nav>

            </p>

        </center>
        <hr>

        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                <div class="collapse show" id="multiCollapseExample1" data-parent="#myGroup">
                    <!-- <img width="200hv" src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" alt=""
                        class="img-thumbnail rounded-circle" style="position:relative;left:100px"> -->
                    <div class="user-info">
                        <img width="250hv" src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" alt=""
                        class="img-thumbnail rounded-circle" style="margin-left: 2em; float: left; margin-right: 2em; margin-bottom: 1em;">

                        <div class="user-mid-info" style="position:relative;top:20px">
                            <h3>Nome completo:  {{Auth()->user()->name}} | Nome de usuário:  {{Auth()->user()->usuario}}</h3>
                            <h3>Email: {{Auth()->user()->email}} | Data de nascimento: {{Auth()->user()->data_nascimento}}</h3>

                            <h3>Biografia: {{Auth()->user()->biografia}} </h3>

                            <a href="{{url('/edit')}}" class="btn btn-primary" style="background-color: #AB59FF;color:white">Editar dados</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="divCentral2" id="myGroup">
        <center>
            <p class="nav-menu">
                <nav id="port">


                    <tr>
                        <td><a data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false"
                                aria-controls="multiCollapseExample2">Alterar senha </a>
                        </td>
                    </tr>

                </nav>

            </p>

        </center>
        <hr>

        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                <div class="collapse show" id="multiCollapseExample2" data-parent="#myGroup">
                    <!-- <img width="200hv" src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" alt=""
                        class="img-thumbnail rounded-circle" style="position:relative;left:100px"> -->



<div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf



        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" style="background-color: #AB59FF;color:white">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



</div>
</div>
</div>
</div>


</body>
</html>

@endsection

