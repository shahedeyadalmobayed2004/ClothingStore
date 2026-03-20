@extends('layout')

@section('content')
<div class="container py-5">
    <form method="GET" class="mb-4 d-flex flex-wrap gap-3 align-items-end">
    <div class="flex-grow-1">
        <input type="text" name="search" class="form-control shadow-sm" placeholder="🔍 Search products..." value="{{ request('search') }}">
    </div>
    <div>
        <select name="category_id" class="form-select shadow-sm">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-gradient fw-semibold px-4 shadow-sm">Filter</button>
</form>

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold display-6 text-gradient">🛍️ Explore Our Collection</h2>
        <a href="{{ route('products.create') }}" class="btn btn-gradient px-4 py-2 fw-semibold rounded-pill shadow">
            + Add Product
        </a>
    </div>

    @if($products->isEmpty())
       <div class="text-center py-5">
    <i class="bi bi-bag-x-fill fs-1 text-secondary mb-3"></i>
    <h4 class="text-muted">No products found.</h4>
    <p class="small">Try adjusting your search or add a new product.</p>
</div>

    @else
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow product-card h-100 rounded-4 overflow-hidden">
                    <div class="card-body d-flex flex-column justify-content-between p-4 bg-white bg-opacity-75">
                        <div>
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $product->name }}</h5>
                            <p class="card-text text-muted small mb-3">{{ $product->description }}</p>
                            <div class="mb-2">
                                <span class="badge price-badge">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>
                            <p class="text-secondary small mb-0">
                                <i class="bi bi-tags-fill me-1 text-primary"></i> {{ $product->category->name }}
                            </p>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('products.edit', $product) }}" 
                               class="btn btn-sm btn-outline-warning rounded-pill shadow-sm px-3">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill shadow-sm px-3">
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
<div class="mt-4">
    {{ $products->links() }}
</div>

<style>
    .text-gradient {
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        box-shadow: 0 8px 20px rgba(13, 110, 253, 0.3);
        transform: translateY(-2px);
    }

    .product-card {
        background: #ffffffcc;
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .price-badge {
        background: #e6f4ea;
        color: #28a745;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 0.4rem 0.7rem;
        border-radius: 8px;
    }

    .card-title {
        font-size: 1.3rem;
        letter-spacing: 0.3px;
    }

    .bi {
        vertical-align: -0.1em;
    }

    @media (max-width: 576px) {
        .btn-gradient, .btn-outline-warning, .btn-outline-danger {
            width: 100%;
            text-align: center;
            margin-top: 0.5rem;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>
@endsection
