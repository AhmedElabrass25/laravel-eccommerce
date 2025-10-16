@extends('layouts.dashboard')
@section('content')
<!-- Preloader -->
<div id="preloader">
  <div class="spinner"></div>
</div>

<!-- Main Wrapper -->
<div id="main-wrapper" class="d-flex">
  @include('inc.dashSidebar')

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Header -->
    @include('inc.dashNavbar')

    <!-- Main Content -->
    <div class="main-content">
      <div class="card-header">
        <h4 class="mb-0">Add Product</h4>
      </div>

      {{-- Display success message --}}
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card shadow-lg border-0 w-100" style="max-width: 600px;">
          <div class="card-body p-4">
            <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
              @csrf

              {{-- Product Name --}}
              <div class="form-group mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" placeholder="Enter product name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Description --}}
              <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3" 
                          class="form-control @error('description') is-invalid @enderror" 
                          placeholder="Enter product description">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Price --}}
              <div class="form-group mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" id="price" 
                       class="form-control @error('price') is-invalid @enderror" 
                       value="{{ old('price') }}" placeholder="Enter product price">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Quantity --}}
              <div class="form-group mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" 
                       class="form-control @error('quantity') is-invalid @enderror" 
                       value="{{ old('quantity') }}" placeholder="Enter product quantity">
                @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Category Select --}}
              <div class="form-group mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" 
                        class="form-select @error('category_id') is-invalid @enderror">
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" 
                          {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Image --}}
              <div class="form-group mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" 
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Create Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer text-center bg-white shadow-sm py-3 mt-5">
      <p class="m-0">Copyright © 2024. All Rights Reserved.
        <a href="https://www.templaterise.com/" class="text-primary" target="_blank">
          Themes By TemplateRise
        </a>
      </p>
    </div>
  </div>
</div>
@endsection
