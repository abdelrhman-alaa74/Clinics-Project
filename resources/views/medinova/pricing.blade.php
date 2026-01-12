@extends('layout.app')

@section('title' , 'Pricing')

@section('content')
{{-- Top Navbar --}}
<x-top-navbar-component/>

{{-- Navbar --}}
@include('includes.navbar')

{{-- Pricing --}}
<x-pricing-component/>

{{-- Footer --}}
@include('includes.footer')

@endsection