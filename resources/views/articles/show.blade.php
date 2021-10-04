@extends('layouts.app')

@section('title', 'Article #' . $id)

@section('content')
    <h1>Article #{{ $id }}</h1>

    <a href="{{ route('articles.index') }}" title="Liste des articles">Retour aux articles</a>
@endsection