@extends('layouts.user')

@section('title')
<title>My Cart</title>
@endsection

@section('content')
<div class="page-heading products-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <h4>shopping</h4>
          <h2>My Cart</h2>
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
  @if($cartItems->count() > 0)
  <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php $total = 0; @endphp
        @foreach($cartItems as $item)
        @php
        $subtotal = $item->product->price * $item->quantity;
        $total += $subtotal;
        @endphp
        <tr>
          <td style="width: 120px;">
            <img src="{{ asset('storage/'.$item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded" style="max-height: 100px;">
          </td>
          <td class="align-middle">
            {{ $item->product->name }}
          </td>
          <td class="fw-bold align-middle">EGP
            {{ number_format($item->product->price, 2) }}
          </td>
          <td class="align-middle">
            <div class="d-flex justify-content-center align-items-center">
              <!-- Decrease -->
              {{-- {{ route('cart.decrease', $item->id) }} --}}
              <form action="{{ route('user.decreaseQuantity', $item->product->id) }}" method="POST" class="me-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">-</button>
              </form>

              <span class="mx-2 fw-bold">
                {{ $item->quantity }}</span>

              <!-- Increase -->
              {{-- {{ route('cart.increase', $item->id) }} --}}
              <form action="{{ route('user.increaseQuantity', $item->product->id) }}" method="POST" class="ms-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-success">+</button>
              </form>
            </div>
          </td>
          <td class="fw-bold align-middle">EGP
            {{ number_format($subtotal, 2) }}
          </td>
          <td class="align-middle">
            {{-- --}}
            <form action="{{ route('user.removeFromCart', $item->product->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Remove
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Total & Checkout -->
  <div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded shadow">
    <h5 class="mb-0">Total: <span class="text-success fw-bold">
        EGP
        {{ number_format($total, 2) }}</span></h5>
    {{-- <form action="{{ route('user.checkout') }}" method="GET"> --}}
      {{-- @csrf --}}
      <a href="{{ route('user.checkout') }}" type="submit" class="btn btn-success btn-md">
        <i class="fa fa-credit-card"></i> Checkout
      </a>
    {{-- </form> --}}
  </div>

  @else
  <div class="alert alert-warning text-center p-5 rounded shadow">
    <h4>Your cart is empty 🛍️</h4>
    <a href="{{ route('user.products') }}" class="btn btn-primary mt-3">Continue Shopping</a>
  </div>
  @endif
</div>
@endsection