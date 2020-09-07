@extends('site.template.templatePersonaliza')

@section('content')


<div class="perso">
		<div class="fundo">
			<div class="fundo-title" >
				<h2>Personalização de Contas</h2>
					<p>Mude os elementos de sua conta, nem todos são obrigatórios, você pode mudar depois.</p>
			</div>

	<form method="POST" action="{{url('edit/home')}}" enctype="multipart/form-data">


    @csrf

        <div class="row">
			<div class="col-lg-6 fundo-body">
				<div class="foto">
					<h5>Foto de Perfil</h5>
						<p>Clique na área abaixo para selecionar um arquivo</p>
						<input type="file" name="foto_perfil">
						<p></p>
                            @if(!Auth()->user()->foto_perfil)
                                <img style="position:relative;left:60px" width="130vh" height="130vh" src="{{url('assets/imgs/imgFeed/Inserir_foto.png')}}">
                            @else
							<img style="position:relative;left:60px" src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" width="130vh" height="130vh">
                            @endif
                        </p>
				</div>
        </div>
				<div class="col-lg-6 infos">
					<h5>Nome de Usuário:</h5>
					<input type="text" name="usuario" placeholder="@exemplo" value="{{ auth()->user()->usuario }}">

					<h5>Data de nascimento</h5>
					<input type="text" name="data_nascimento" placeholder="Fortaleza - CE" value="{{ auth()->user()->data_nascimento }}">

					<h5>Nome completo:</h5>
					<input type="text" name="name" placeholder="Adoro desenvolver sites." required="" value="{{ auth()->user()->name }}">

					<h5>Biografia:</h5>
					<textarea class="area" name="biografia" placeholder="Adoro desenvolver sites." >{{auth()->user()->biografia}}</textarea>

                </div>


			</div>

			<div class="fundo-footer">
					<input class="btn" type="submit" name="" value="Pular">
					<input class="btn" type="submit" name="" value="Enviar">
			</div>
	</form>

			</div>
		</div>
	</div>


@endsection
