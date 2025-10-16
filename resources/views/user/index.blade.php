@extends('layouts.user')
@section('content')

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
  <div class="owl-banner owl-carousel">
    <div class="banner-item-01">
      <div class="text-content">
        <h4>Best Offer</h4>
        <h2>New Arrivals On Sale</h2>
      </div>
    </div>
    <div class="banner-item-02">
      <div class="text-content">
        <h4>Flash Deals</h4>
        <h2>Get your best products</h2>
      </div>
    </div>
    <div class="banner-item-03">
      <div class="text-content">
        <h4>Last Minute</h4>
        <h2>Grab last minute deals</h2>
      </div>
    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
  <div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('success') }}
    </div>
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Latest Products</h2>
          <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
        </div>
      </div>
      @foreach($products as $product)
      <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="product-item shadow-sm rounded p-3 position-relative">

          <!-- صورة المنتج -->
          <div class="position-relative">
            <!-- كاتيجوري فوق الصورة -->
            <span class="badge bg-primary text-white position-absolute top-0 start-0 m-2">
              {{ $product->category->name ?? 'Uncategorized' }}
            </span>

            <a href="{{ route('user.productDetails', $product->id) }}">
              <img src="{{ asset('storage/' . $product->image) }}" style="height: 270px" alt="{{ $product->title }}" class="img-fluid rounded product-img">
            </a>
          </div>

          <div class="down-content mt-3">
            <!-- اسم المنتج -->
            {{-- <a href="#"> --}}
              <h4>
                {{ $product->name }}
              </h4>
            {{-- </a> --}}

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
            @auth
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
            @endauth

          </div>
        </div>
      </div>
      @endforeach



    </div>
  </div>

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About Sixteen Clothing</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <h4>Looking for the best products?</h4>
            <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
            <ul class="featured-list">
              <li><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li><a href="#">Consectetur an adipisicing elit</a></li>
              <li><a href="#">It aquecorporis nulla aspernatur</a></li>
              <li><a href="#">Corporis, omnis doloremque</a></li>
              <li><a href="#">Non cum id reprehenderit</a></li>
            </ul>
            <a href="about.html" class="filled-button">Read More</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="assets/images/feature-image.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
              </div>
              <div class="col-md-4">
                <a href="#" class="filled-button">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  @endsection
  @section('title')
  <title>Home</title>
  @endsection