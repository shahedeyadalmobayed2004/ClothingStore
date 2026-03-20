@extends('layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold display-6 text-gradient">📂 Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-gradient px-4 py-2 fw-semibold rounded-pill shadow">
            + Add Category
        </a>
    </div>

    @if($categories->isEmpty())
        <div class="text-center text-muted fs-4 py-5">
            <i class="bi bi-folder-x fs-1 text-secondary d-block mb-3"></i>
            No categories available yet.
        </div>
    @else
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-lg rounded-4 h-100 category-card">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <h5 class="card-title fw-bold text-dark mb-2">
                                <i class="bi bi-folder-fill me-1 text-primary"></i> {{ $category->name }}
                            </h5>
                            <p class="text-muted small">Category ID: <strong>{{ $category->id }}</strong></p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('categories.edit', $category->id) }}" 
                               class="btn btn-sm btn-outline-warning rounded-pill shadow-sm">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .text-gradient {
        background: linear-gradient(45deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        color: white;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-gradient:hover {
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.4);
        transform: translateY(-2px);
    }

    .category-card:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
    }

    .card-title {
        font-size: 1.2rem;
    }

    .bi {
        vertical-align: -0.1em;
    }
</style>
@endsection
