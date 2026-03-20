@extends('layout')

@section('content')
<div class="card shadow-lg rounded-4 border-0 bg-white bg-opacity-75 backdrop-blur">
    <div class="card-header bg-white border-bottom py-4 px-4">
        <h2 class="fw-bold mb-0 text-gradient">✏️ Edit Product</h2>
    </div>

    <div class="card-body px-4 py-5">
        @if ($errors->any())
            <div class="alert alert-danger rounded-3 shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST" class="vstack gap-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="form-label fw-semibold">Product Name</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}"
                       class="form-control rounded-3 shadow-input" required>
            </div>

            <div>
                <label for="description" class="form-label fw-semibold">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="form-control rounded-3 shadow-input" required>{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="price" class="form-label fw-semibold">Price ($)</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}"
                       class="form-control rounded-3 shadow-input" required>
            </div>

            <div>
                <label for="category_id" class="form-label fw-semibold">Category</label>
                <select name="category_id" id="category_id"
                        class="form-select rounded-3 shadow-input" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-gradient px-4 py-2 fw-semibold rounded-pill shadow">
                    ✅ Update Product
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .text-gradient {
        background: linear-gradient(45deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(to right, #198754, #0d6efd);
        color: white;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-gradient:hover {
        box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
        transform: translateY(-2px);
    }

    .shadow-input {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.07);
        transition: all 0.2s ease-in-out;
    }

    .shadow-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        border-color: #0d6efd;
    }

    .backdrop-blur {
        backdrop-filter: blur(8px);
    }
</style>
@endsection
