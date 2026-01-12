@extends('layout.app')

@section('title' , 'About Page')

@section('content')

{{-- Top Navbar --}}
<x-top-navbar-component/>

{{-- Navbar --}}
@include('includes.navbar')

{{-- About --}}
<x-about-component/>

{{-- Footer --}}
@include('includes.footer')

@endsection