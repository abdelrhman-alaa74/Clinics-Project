@extends('layout.app')

@section('title', 'MEDINOVA - Hospital Website')



    {{-- TopNavbar --}}
    <x-top-navbar-component/>    
    {{-- Navbar --}}
    @include('includes.navbar')
    
    
    {{-- Hero Start --}}
    <x-hero-start-component/>
    
    
    {{-- About --}}
    <x-about-component/>
    
    {{-- Services --}}
    <x-service-component/>    
    
    {{-- Appointment --}}
    <x-appointment-component />
    
    {{-- Pricing --}}
    <x-pricing-component/>
    
    
    {{-- Team --}}
    <x-team-component/>
    
    {{-- Search --}}
    @include('includes.search')
    
    {{-- Testimonial --}}
    @include('includes.testimonial')
    
    {{-- blog --}}
    <x-blog-component/>
    
    {{-- Footer --}}
    @include('includes.footer')
    

    @push("scripts")
    <script>
        @if(session('message'))
            alert("{{ session('message') }}");
        @endif
    </script>
    @endpush