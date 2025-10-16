@extends('layouts.user')

@section('title')
<title>My Wishlist</title>
@endsection

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

<div class="container my-5">
  @if($wishlistItems->count() > 0)
    <div class="table-responsive">
      <table class="table table-bordered align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($wishlistItems as $item)
            <tr class="align-middle">
              <td style="width: 120px;">
                <img src="{{ asset('storage/'.$item->product->image) }}" 
                     alt="{{ $item->product->name }}" 
                     class="img-fluid rounded" style="max-height: 100px;">
              </td>
              <td class="align-middle">{{ $item->product->name }}</td>
              <td class="align-middle">${{ number_format($item->product->price, 2) }}</td>
              <td class="align-middle">
                <form action="{{ route('user.removeFromWishlist', $item->product->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">
                    Remove
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="alert alert-info text-center">
      Your wishlist is empty. <a href="{{ route('user.products') }}" class="btn btn-sm btn-primary ms-2">Browse Products</a>
    </div>
  @endif
</div>
@endsection
