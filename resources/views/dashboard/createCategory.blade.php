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
        <h4 class="mb-0">Add Category</h4>
      </div>
      {{-- display message success --}}
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card shadow-lg border-0 w-100" style="max-width: 500px;">

          <div class="card-body p-4">
            <form action="{{ route('admin.storeCategory') }}" method="POST">
              @csrf
              {{-- Name --}}
              <div class="form-group mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter category name">
                {{-- Error message --}}
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Create</button>
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