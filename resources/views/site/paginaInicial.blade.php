 @extends('site.template.templateFeed')

 @section('content')

 <!-- Menu Lateral Fixo -->

 <div class="row">
     <div style="" class="col-lg-3">
         <div class="card" style="width: 18rem;background-color:#AB59FF;position:fixed;height:700px">

             <img src="{{url('assets/imgs/imgFeed/LogoBrancoImagiUni.png')}}" width="60vh"
                 style="position:relative;top:20px;left:20px;">
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
                     <small style="font-size: 20px;position:relative;" id="nome">{{auth()->user()->usuario}}</small>
                 </h3>
                 <hr>


                 <nav style="padding-top: -50px;" class="nav flex-column nav">
                     <a href="#" style="text-decoration: none; color: white" class="nav-link active" data-toggle="modal"
                         data-target="#exampleModalCenter">
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

                     <a class="nav-link" href="{{url('home/config')}}">
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
         <div class="col-lg-10">

             <div class="col-lg-12">
                 <div class="feed">



                     @foreach($posts as $post)
                     @if($post->postagem)

                     <div class="pub">

                         <div class="info-pub-user">
                             <img id="perfil" width="70vh" height="70vh" style="float: left;"
                                 src="{{url('storage/users/'.$post->perfil)}}" class="rounded-circle" alt="">

                                 <input type="hidden"value="">

                             <a href="{{ route('perfil', ['id' => $post->usuario], ['idPost' => $post->id]) }}"
                                 style="color: #AB59FF; text-decoration: none; font-size: 25px; padding-left: 0.5em;position:relative;top:18px">{{$post->nome_usuario}}<br></a>

                         </div>


                         <br>
                         <center class="contend-middle">
                             <p style="padding-top: 3vh;position:relative;left:-170px;">
                                 {{$post->titulo}}
                             </p>

                             <img src="{{url('storage/'.$post->postagem)}}"
                                 style="max-width:40em; min-width: 10em; margin-bottom: 3vh; box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-style: ridge;">

                             <div class="feedback" style="margin-left:200px">
                                 <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                             <a href="{{route('visualizar', ['id' => $post->usuario ])}}" type="submit" class="input-group-text" name="like"
                                                 id="curtir" style=" background-color:white;color: #AB59FF;">Visualizar postagem<i class="fas fa-heart"></i></a>
                                     </div>


                                 </div>
                             </div>
                         </center>

                         <hr>
                     </div>
                     @endif
                     @endforeach



                 </div>


             </div>


             <!-- Modal de Comentário -->
             <!-- Modal da Publicação -->
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLongTitle">Criar publicação</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form method="POST" action="{{url('home/postagem')}}" enctype="multipart/form-data">
                                 @csrf
                                 <input type="file" name="postagem"><br><br>
                                 <input type="text" name="titulo" placeholder="@exemplo">
                                 <button type="submit" class="btn btn-primary"
                                 style="background-color:  #AB59FF">Publicar</button>
                             </form>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

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



 <!-- Menu Lateral Fixo -->

 @endsection

 @push('scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

 <script>
$(function() {
    $('form[name="gostei"]').submit(function(event) {
        event.preventDefault();

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "{{ url('/home') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success === true) {
                    document.getElementById('curtir').style.display = "none";
                    document.getElementById('descurtir').style.display = "block";
                }

            }
        });

    });
});
 </script>

 <script>
$(function() {
    $('form[name="coment"]').submit(function(event) {
        event.preventDefault();

        $.ajax({
            0,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "{{ url('/comenta') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success === true) {
                    alert('deu bom');

                }

            }
        });

    });
});
 </script>

 @endpush
