@extends('layouts.user')
@section('content')
<!-- Page Content -->
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>new arrivals</h4>
          <h2>sixteen products</h2>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="products">

  <div class="container">
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
    <form class="d-flex" style="gap: 20px;" action="{{ route('user.products') }}" method="GET" role="search">
      <input class="form-control me-2" type="search" name="search" placeholder="Search products..." aria-label="Search">
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
    <div class="container my-4">
      <div class="d-flex flex-wrap align-items-center justify-content-center" style="gap: 15px;">
        <!-- زرار All -->
        <a href="{{ route('user.products') }}" class="btn btn-sm {{ request('category') ? 'btn-outline-primary' : 'btn-primary' }}">
          All
        </a>

        <!-- باقي الكاتيجوريات -->
        @foreach($categories as $category)
        <a href="{{ route('user.products', ['category' => $category->id]) }}" class="btn btn-sm {{ request('category') == $category->id ? 'btn-primary' : 'btn-outline-primary' }}">
          {{ $category->name }}
        </a>
        @endforeach
      </div>
    </div>

    <div class="row">
      @foreach($products as $product)
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="product-item shadow-sm rounded p-3 position-relative">

          <!-- صورة المنتج -->
          <div class="position-relative">
            <!-- كاتيجوري فوق الصورة -->
            <span class="badge bg-primary text-white position-absolute top-0 start-0 m-2">
              {{ $product->category->name ?? 'Uncategorized' }}
            </span>

            <a href="{{route('user.productDetails', $product->id)}}">
              <img src="{{ asset('storage/' . $product->image) }}" style="height: 270px" alt="{{ $product->title }}" class="img-fluid rounded product-img">
            </a>
          </div>

          <div class="down-content mt-3">
            <!-- اسم المنتج -->
              <h4>
                {{ $product->name }}
              </h4>

            <!-- السعر -->
            <h6>$
              {{ number_format($product->price, 2) }}
            </h6>

            <!-- الوصف -->
            <p class="" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
              {{ Str::limit($product->description, 100) }}
            </p>

            <!-- الكمية -->
            <p><strong>Available:</strong>
              {{ $product->quantity }}
            </p>

            <!-- الأزرار -->
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

          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="w-100 d-flex align-items-center justify-content-center">
      {{ $products->links('pagination::custome') }}
    </div>
  </div>
</div>

@endsection
@section('title')
<title>Products</title>
@endsection