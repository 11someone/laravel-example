@extends('master')

@section('meta')
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
    <p>esto es una seccion</p>
    @if(!@empty($numbers))
      @for($i = 0; $i < count($numbers); $i++)
          el numbero es {{ $numbers[$i] }}
          {{-- dsfsf --}}

      @endfor
        <br>
        <x-alert type="error" :message="$message" class="mt-4" />

    @else
        no es un array
    @endif
@endsection

