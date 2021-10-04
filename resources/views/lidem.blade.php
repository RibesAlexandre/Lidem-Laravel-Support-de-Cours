@extends('layouts.app')

@section('title', "Lidem")

@section('content')
    <h1>Salut</h1>

    <p>Je suis une page de l'idem</p>

    <ul>
        @foreach( $users as $user )
            @if( $loop->first )
                <li>{{ $user }} : le numéro 1</li>
            @else
                <li>{{ $user }}</li>
            @endif
        @endforeach
    </ul>


@endsection