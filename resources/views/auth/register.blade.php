@extends('layouts.app')

@section('titulo')
    Registrate
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/register.png') }}" alt="Imagen Registro de Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <!-- INPUT NOMBRE -->
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="T&uacute; Nombre"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                        value="{{old('name')}}"
                    />
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- INPUT NOMBRE DE USUARIO-->
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="T&uacute; Nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                        @enderror"
                        value="{{old('username')}}" 
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- INPUT EMAIL-->
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="T&uacute; Correo de Registro"
                        class="border p-3 w-full rounded-lg  @error('email')
                        border-red-500
                        @enderror"
                        value="{{old('email')}}" 
                    />
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- INPUT PASSWORD-->
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="T&uacute; Contraseña"
                        class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                        @enderror"
                        {{-- value="{{old('passwird')}}"  --}}
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-1">{{$message}}</p>
                    @enderror
                </div>
                
                <!-- INPUT REPETIR PASSWORD-->
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite T&uacute; Contraseña"
                        class="border p-3 w-full rounded-lg" 
                    />
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-red-600 hover:bg-red-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg mt-5"
                />
            </form>
        </div>
    </div>
@endsection