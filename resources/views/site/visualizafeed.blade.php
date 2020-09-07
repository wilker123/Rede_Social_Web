@extends('site.template.templateShow')

@section('content')

<div class="perso" style="background-color:#AB59FF">


<button class="btn" style="color: white;margin-top:-60px;margin-left:-150px">
   <i class="fas fa-photo-video"></i><a style="color:white" href="{{url('/home')}}">Feed</a>
</button>

    <div class="fundo">

        <center class="contend-middle">
            <br><br><br>


           <img src="{{url('storage/'.$post->postagem)}}"
                style="max-width:40em; min-width: 10em; margin-bottom: 3vh; box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); border-style: ridge;">

            <div class="feedback" style="margin-left:280px">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    @if(isset($like))

                    <form name="descurtir">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                            <input type="hidden" name="id_post" value="{{$post->id}}">
                                                            <button type="submit" class="input-group-text" name="like" id="descurtir">deslike<i
                                    class="fas fa-heart"></i></button>
                        </form>

                        @else

                        <form name="gostei">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                            <input type="hidden" name="id_post" value="{{$post->id}}">

                            <button type="submit" class="input-group-text" name="like" id="curtir">Curtir<i
                                    class="fas fa-heart"></i></button>
                        </form>
                        @endif


                    </div>

                    <div class="input-group-append">
                        <button class="input-group-text" id="basic-addon2" data-toggle="modal"
                            data-target="#exampleModalScrollable"
                            style="background-color:white;color:#AB59FF">Comentar<i
                                class="fas fa-comment-alt"></i></button>

                    </div>
                </div>
            </div>
        </center>




        <hr>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle" style="color: #AB59FF">Comentários
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p style="padding:5opx">

                            @foreach($comentarios as $coment)
                            <img width="40vh" ; class="rounded-circle" src="{{url('storage/users/'.$coment->perfil)}}">
                            <small style="font-size: 20px;" id="nome"
                                style="color:black">{{$coment->nomeUsuario}}</small><br><br>
                            {{$coment->comentario}}
                            <br>
                            <hr>
                            @endforeach
                        </p>

                        <!-- Cada <p> é um comentário, ficou perfeito -->

                    </div>


                    <form name="coment">
                        <div class="modal-footer">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Faça seu comentário"
                                    name="comentario" aria-describedby="basic-addon2">

                                <input type="hidden" name="post" value="{{$post->id}}">

                                <input type="hidden" name="nomeUsuario" value="{{Auth()->user()->usuario}}">
                                <input type="hidden" name="perfil" value="{{Auth()->user()->foto_perfil}}">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color:  #AB59FF">Adicionar comentário</button>
                                <div class="input-group-append">
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>


                        </div>
                    </form>

                </div>
            </div>
        </div>



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
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary"
                            style="background-color:  #AB59FF">Publicar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

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
$(function() {
    $('form[name="descurtir"]').submit(function(event) {
        event.preventDefault();

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "{{ url('/deslike') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success === true) {

                    document.getElementById('descurtir').style.display = "none";
                    document.getElementById('curtir').style.display = "block";
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

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: "{{ url('/comenta') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success === true) {
                    alert('Deu certo');
                }

            }
        });

    });
});
</script>

@endpush
