@extends('layouts.user')

@section('title')
<title>
  {{ $product->title }}
</title>
@endsection

@section('content')
<!-- Header -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>my wishlist</h4>
          <h2>Saved Products</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-5">
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="row g-5">
    <!-- صورة المنتج -->
    <div class="col-md-6">
      <div class="shadow rounded overflow-hidden">
        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid w-100" style="object-fit: cover; height: 400px; object-position: top">
      </div>
    </div>

    <!-- بيانات المنتج -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-4">
        {{ $product->name }}
      </h2>
      <p class="text-muted mb-2">Category:
        <span class="badge bg-primary text-white px-2 py-1">
          {{ $product->category->name ?? 'Uncategorized' }}</span>
      </p>
      <h3 class="text-success fw-bold mb-3">$
        {{ number_format($product->price, 2) }}
      </h3>
      <p class="mb-3">
        {{ $product->description }}
      </p>
      <p class="mb-2"><strong>Available:</strong>
        {{ $product->quantity }}
      </p>

      <!-- زر Add to Cart -->
      <!-- الأزرار -->
      @auth
      <div class="d-flex justify-content-between align-items-center mt-3">
        <!-- Add to Cart -->
        @if(in_array($product->id, $cartProductIds))
        <button class="btn btn-sm btn-success" disabled>
          <i class="fa fa-check"></i> In Cart
        </button>
        @else
        <form action="{{ route('user.addToCart', $product->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-sm btn-primary">
            <i class="fa fa-shopping-cart"></i> Add to Cart
          </button>
        </form>
        @endif

        <!-- Wishlist -->
        @if(in_array($product->id, $wishlistProductIds))
        <!-- لو المنتج موجود بالفعل -->
        <form action="{{ route('user.removeFromWishlist', $product->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">
            <i class="fa fa-heart"></i>
          </button>
        </form>
        @else
        <!-- لو مش موجود -->
        <form action="{{ route('user.addToWishlist', $product->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-danger">
            <i class="fa fa-heart"></i>
          </button>
        </form>
        @endif

      </div>
      @endauth
    </div>
  </div>

  <!-- منتجات مرتبطة -->
  <div class="mt-5">
    <h3 class="mb-4 fw-bold text-center">Related Products</h3>
    <div class="row g-4">
      @forelse($relatedProducts as $related)
      <div class="col-md-3">
        <div class="card h-100 shadow-sm border-0">
          <a href="{{ route('user.productDetails', $related->id) }}">
            <img src="{{ asset('storage/'.$related->image) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $related->title }}">
          </a>
          <div class="card-body text-center">
            <h6 class="fw-bold">
              {{ $related->title }}
            </h6>
            <p class="text-success fw-bold">$
              {{ number_format($related->price, 2) }}
            </p>
            <a href="{{ route('user.productDetails', $related->id) }}" class="btn btn-sm btn-outline-primary">
              View Details
            </a>
          </div>
        </div>
      </div>
      @empty
      <p class="text-center">No related products found.</p>
      @endforelse
    </div>
  </div>
</div>
@endsection