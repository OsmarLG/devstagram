@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <!---POST-->
    <div class=" container mx-auto md:flex">
        <div class=" md:w-1/2">
            <!--IMAGEN-->
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">

            <!--INFORMACION-->
            <div class="">
                <p class=" font-bold">{{ $post->user->username }}</p>
                <p class=" text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            <!--LIKES-->
            <div class=" p-3 flex items-center gap-2">
                @auth

                    <livewire:like-post :post="$post" />

                @endauth
            </div>

            <div class=" mt-2 p-2">
                <h4 class=" font-bold">Descripci&oacute;n</h4>

                <p class=" mt-1 p-1">{{ $post->descripcion }}</p>
            </div>

            @auth
            @if ($post->user_id === auth()->user()->id)
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input 
                        type="submit"
                        value="Eliminar Publicacion"
                        class=" bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                    />
                </form>
            @endif
            @endauth
        </div>

        <!--COMENTARIOS-->

        <div class=" md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-cl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif
                
                <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                    @csrf
                    <!-- INPUT COMENTARIO -->
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                            Agrega Un Comentario
                        </label>
                        <textarea 
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un Comentario"
                            class="border p-3 w-full rounded-lg @error('comentario')
                                border-red-500
                            @enderror"
                        ></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                            @enderror
                    </div>

                    <input 
                    type="submit"
                    value="Comentar"
                    class="bg-red-600 hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
                    />
                </form>
                @endauth
                
                <!--COMENTARIOS-->
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    <p class="mb-2 block uppercase text-gray-500 font-bold">Comentarios</p>
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">Sin Comentarios</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection