@extends('layouts.app')

@section('titulo')
    P&aacute;gina Principal
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" />

@endsection