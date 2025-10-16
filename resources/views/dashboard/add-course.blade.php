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
              <h3 class="mb-2 text-color-2">Add Course</h3>
            </div>
          </div><!-- end card header -->
        </div>
        <!--end col-->
      </div>
      <div class="mt-4 d-flex align-items-center justify-content-center">
        <div class="col-md-6 col-12">
          <div class="card-body bg-white p-3">
            <h2 class="h5 text-color-2 py-2">Create Course</h2>
            <form action="{{route('courseStore')}}" method="POST" enctype="multipart/form-data" class="row g-3">
              @csrf
              <div class="col-12">
                <label for="courseName" class="form-label text-color-2 text-normal">Course Name</label>
                <input type="text" name="title" value="{{old('title')}}" @error('title') is-invalid @enderror class="form-control" id="courseName" placeholder="e.g. Responsive Design">
                @error('title')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="courseCategory" class="form-label text-color-2 text-normal">Course category</label>
                <select id="courseCategory" @error('category') is-invalid @enderror name="category" class="form-select text-normal">
                  <option value="">Choose category</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-6">
                <label for="CourseThubmnail" class="form-label text-color-2 text-normal">Course Image</label>
                <div class="file-input-container">
                  <input type="file" id="fileInput" @error('image') is-invalid @enderror name="image" class="file-input">
                  <label for="fileInput" class="file-label">
                    <span class="file-name">Choose image</span>
                  </label>
                  @error('image')
                  <div class="invalid-feedback d-block">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

              </div>
              <div class="col-md-6">
                <label for="courseTrainer" class="form-label text-color-2 text-normal">Course Trainer</label>
                <select id="courseTrainer" @error('trainer') is-invalid @enderror name="trainer" class="form-select text-normal">
                  <option value="">Choose Trainer</option>
                  @foreach ($trainers as $trainer)
                  <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                  @endforeach
                </select>
                @error('trainer')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-6">
                <label for="coursePrice" class="form-label text-color-2 text-normal">Course Price</label>
                <input type="number" @error('price') is-invalid @enderror value="{{old('price')}}" name="price" class="form-control" id="coursePrice" placeholder="Course price">
                @error('price')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="desc" class="form-label text-color-2 text-normal">Course Description</label>
                <textarea name="desc" class="form-control" @error('desc') is-invalid @enderror name="desc" id="desc" id="" cols="10" rows="0">{{old('desc')}}</textarea>
                @error('desc')
                <div class="invalid-feedback d-block">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-12 mt-5">
                <button type="submit" class="btn bg-white bg-primary text-white d-flex align-items-center px-4 py-2 rounded-2 text-normal fw-bolder letter-spacing-26">Save Informations</button>
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