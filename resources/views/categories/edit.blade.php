@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-4 px-4">
                <h3 class="mb-0 fw-bold text-primary">Edit Category</h3>
            </div>
            <div class="card-body px-4 py-5 bg-white">
                <form action="{{ route('categories.update', $category) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Name Of Category</label>
                        <input type="text" name="name" id="name" value="{{ $category->name }}" required
                               class="form-control form-control-lg rounded-3 shadow-sm" placeholder="Category Name">
                        @error('name')
                            <div class="text-danger mt-2 small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary:hover {
        background-color: #0b5ed7;
        box-shadow: 0 8px 18px rgba(13, 110, 253, 0.4);
        transform: translateY(-2px);
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
