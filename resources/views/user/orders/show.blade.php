@extends('layouts.user')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Order #{{ $order->id }} Details</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p><strong>Total:</strong> ${{ $order->total }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>
            <p><strong>Placed At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    <h4 class="mb-3">Products</h4>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                 alt="{{ $item->product->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">
        ← Back to My Orders
    </a>
</div>
@endsection
