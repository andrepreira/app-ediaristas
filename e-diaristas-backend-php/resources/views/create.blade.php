@extends('app')

@section('titulo', 'Criar Diarista')

@section('conteudo')

    <h1>Criar Darista</h1>

    <form action="{{ route('diaristas.store') }}" method="POST" enctype="multipart/form-data">
        @include('_form')
    </form>



@endsection
