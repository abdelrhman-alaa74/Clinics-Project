@extends('layout.app')

@section('title' , 'Service')

@section('content')
{{-- Top Navbar --}}
<x-top-navbar-component/>

{{-- Navbar --}}
@include('includes.navbar')

{{-- Service --}}
<x-service-component/>

{{-- Footer --}}
@include('includes.footer')

@endsection