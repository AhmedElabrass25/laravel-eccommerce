@extends('layouts.user')

@section('content')
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

<div class="container py-5">
    <h2 class="mb-4 text-center">Checkout</h2>

    <!-- ✅ فتح الفورم هنا -->
    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <div class="row">
            <!-- 📝 بيانات المستخدم -->
            <div class="col-md-7">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Billing Details</h5>

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" 
                                   class="form-control" 
                                   value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" 
                                   class="form-control" 
                                   value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Shipping Address</label>
                            <textarea id="address" name="address" 
                                      class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🛒 ملخص الكارت -->
            <div class="col-md-5">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body">
                        <h5 class="mb-4 fw-bold">Your Order</h5>

                        <ul class="list-group mb-3">
                            @foreach ($cartItems as $item)
                                <li class="list-group-item border-0 d-flex align-items-center justify-content-between py-3">
                                    <!-- صورة المنتج -->
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $item->product->image) }}" 
                                             alt="{{ $item->product->name }}" 
                                             class="img-thumbnail me-3" 
                                             style="width: 60px; height: 60px; object-fit: cover; border-radius:10px;">

                                        <div>
                                            <strong class="d-block">{{ $item->product->name }}</strong>
                                            <small class="text-muted">
                                                ${{ $item->product->price }} × {{ $item->quantity }}
                                            </small>
                                        </div>
                                    </div>

                                    <!-- السعر الإجمالي للمنتج -->
                                    <span class="fw-bold text-success">
                                        ${{ $item->product->price * $item->quantity }}
                                    </span>
                                </li>
                            @endforeach

                            <!-- الإجمالي -->
                            <li class="list-group-item d-flex justify-content-between align-items-center border-top pt-3">
                                <span class="fw-bold fs-5">Total</span>
                                <strong class="fs-5 text-primary">${{ $total }}</strong>
                            </li>
                        </ul>

                        <!-- زرار إكمال الطلب -->
                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            <i class="bi bi-bag-check me-2"></i> Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- ✅ قفل الفورم هنا -->
</div>
@endsection
