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
      {{-- display message success --}}
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-lg-center  flex-column flex-md-row flex-lg-row mt-3">
            <div class="flex-grow-1">
              <h3 class="mb-2 text-color-2">Add Category</h3>
            </div>
          </div><!-- end card header -->
        </div>
        <!--end col-->
      </div>
      <div class="mt-4 d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-12">
          <div class="card-body bg-white p-3">
            <form action="{{route('addCategory')}}" method="POST">
              @csrf
              <div class="d-flex flex-col align-items-center">
                <input type="text" name="category" class="form-control" @error('category') is-invalid @enderror placeholder="Category Name" />
              </div>
               @error('category')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-2">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="footer text-center bg-white shadow-sm py-3 mt-5">
      <p class="m-0">Copyright © 2024. All Rights Reserved. <a href="https://www.templaterise.com/" class="text-primary" target="_blank">Themes By TemplateRise</a></p>
    </div>
  </div>

  



  @endsection