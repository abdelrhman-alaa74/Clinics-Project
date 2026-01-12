@extends('layout.app')

@section('title' , 'Pricing')
@section('styles')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
@endpush
@endsection

@section('content')
{{-- Top Navbar --}}
<x-top-navbar-component/>

{{-- Navbar --}}
@include('includes.navbar')

{{-- Contact --}}
<x-contact-component/>

{{-- Footer --}}
@include('includes.footer')

@endsection

@section('scripts')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>
    document.getElementById('contactForm').addEventListener('submit' , function(e){
        e.preventDefault();

        const formData = new FormData(this);
        const btn = this.querySelector('button[type="submit"]');

        btn.disabled = true;
        btn.innerText = 'Sending...';

        fetch('{{ route("contact.store") }}' , {
            'method': 'POST',
            'headers':{
                'X-CSRF-TOKEN':"{{ csrf_token() }}",
                'Accept': 'application/json'
            },
            'body':formData
        })
        .then(async (response)=>{
            const data = await response.json();
            if(response.ok){
                alert('Message Send Successfully');
            }else if(response.status == 422){
                alert('Validation is Wrong' + data.message)
            }else{
                alert(data.message)
            }
        }).catch(e=>{
            alert('Connection Error' + e)
        }).finally(()=>{
            btn.disabled = false
            btn.innerText = 'Send Message'
        })
    }) 
</script>
@endpush
@endsection