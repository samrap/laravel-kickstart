{{-- The base layout should be the wrapper on all pages--}}
@extends('layouts.base')

@section('title', 'Home')

{{-- Add a class to the body tag for DOM-based routing in main.js --}}
@section('body_class', 'home')

{{-- Begin Custom templating --}}
@section('body')

<div class="container">
    <h1>Hello world!</h1>
</div>

@endsection
