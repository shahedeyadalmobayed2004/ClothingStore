@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="text-center bg-light p-5 rounded-4 shadow-lg">
        <h1 class="display-4 fw-bold text-primary mb-3">Welcome to the Clothing Store 👕</h1>
        <p class="lead text-secondary mb-4">Manage your products and categories easily.</p>
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg px-4 rounded-pill">
            Go to Products
        </a>
    </div>
</div>
@endsection
