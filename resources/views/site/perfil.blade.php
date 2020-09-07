@extends('site.template.templatePerfil')

@section('content')


<div class="row">
    <div style="" class="col-lg-3">
        <div class="card" style="width: 18rem;background-color:#AB59FF;position:fixed;height:700px">

            <img src="{{url('assets/imgs/imgFeed/LogoBrancoImagiUni.png')}}" width="60vh"
                style="position:relative;top:10px;left:20px;">
            <div class="card-body"><br>

                <h6 class="card-title" style="color:white">Pesquisar Usuário</h6>
                <input
                    style="background-color: rgba(236, 240, 241,0.0); border-top: none; border-color: white; border-left: none; border-right: none; outline: none;)"
                    type="text" placeholder="Inserir Usuário"><br><br>


                <h3>
                    @if(auth()->user()->foto_perfil != null)
                    <img width="40vh" height="40vh" src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" alt=""
                        style="max-width:50px; max-height: 50px" class="rounded-circle">
                    @endif

                    <small style="font-size: 20px;" id="nome">{{auth()->user()->name}}</small>
                </h3>
                <hr>


                <nav style="padding-top: -50px;color:white;" class="nav flex-column nav">
                    <a href="#" style="text-decoration: none; color: white" class="nav-link active" data-toggle="modal"
                        data-target="#exampleModal">
                        <svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                        </svg>
                        Criar publicação
                    </a>
                    <a class="nav-link" href="{{url('usuario',  auth()->user()->id)}}">
                        <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        Perfil

                    </a>

                    <a class="nav-link" href="{{url('/home/config')}}">
                        <svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z" />
                        </svg>
                        Configurações</a>
                    <a class="nav-link" href="{{url('/')}}">
                        <svg class="bi bi-arrow-left-circle-fill" width="1em" height="1em" viewBox="0 0 16 16"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.646 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L6.207 7.5H11a.5.5 0 0 1 0 1H6.207l2.147 2.146z" />
                        </svg>
                        Sair da conta</a>
                </nav>
                <hr>

                <div>
                    <h6 style="color:white; font-size: 2vh;">2020 Todos os Direitos Reservados ImagiUni</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="perfil-card">
                <div class="row">
                    <div class="col-lg-3"><br>
                        <img src="{{url('storage/users/'.auth()->user()->foto_perfil)}}" style="width:35vh;height: 35vh"
                            class="rounded-circle">
                    </div>

                    <div class="col-lg-8">
                        <br><br>
                        <br>
                        <div class="info-perfil">
                            <h4 style="font-size:30px">{{auth()->user()->usuario}}</h4>
                            <h6 style="font-size:30px">Email: {{auth()->user()->email}}</h6>
                            <p>Bio: {{auth()->user()->biografia}}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="pub-card">
                <div class="row">
                    <div class="col-lg-12">

                        <center>
                            <h3>Publicações</h3>
                        </center>
                        <hr style="border:1px solid gray;width:200px">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="thumbinail">

                                    @foreach($posts as $post)

                                    <a href="{{url('visualizar/'.$post->id)}}">
                                    <img class="img-thumbnail" src="{{asset('storage/'.$post->postagem)}}" class="rounded float-left"
                                        width="33%">
                                    </a>

                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Criar Publicação</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                             <form method="POST" action="{{url('home/postagem')}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                 <div class="selecionar-imagem">
                                     <p>Selecionar imagem:<p>
                                             <input class="botao" type="file" name="postagem">
                                 </div>
                                 <div class="legenda">
                                     <p>Legenda:</p>
                                     <textarea class="botao" rows="5" cols="50"
                                         placeholder=" Digite sua legenda" name="titulo"></textarea>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn" data-dismiss="modal">Fechar</button>
                                     <input type="submit" class="btn">
                            </form>
                                 </div>
                             </div>
                         </div>
                     </div>


                </div>


                <!--
            <h6>Criar Publicação</h6>

                <form method="">
                    <div class="legenda-perfil">
                        Legenda:
                        <input class="" type="text" name="">
                    </div>

                    <div class="foto">
                        <input class="" type="file" name="">
                    </div>

                    <input class="botao-enviar" type="submit" name="" value="Enviar">
            </div>
            </form>
            -->
            </div>
        </div>

        @endsection
