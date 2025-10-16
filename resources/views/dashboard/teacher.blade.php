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
              <h3 class="mb-2 text-size-26 text-color-2">Teacher</h3>
            </div>
          </div><!-- end card header -->
        </div>
        <!--end col-->
      </div>
      <div class="mt-4">
        <div class="card shadow-sm border-0">
          <div class="card-body p-0">
            <div class="table-responsive table-rounded-top">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Row 1 -->
                  {{-- @foreach($trainers as $trainer)
                  <tr>
             
            <td>{{$trainer->name}}</td>
            <td>{{$trainer->email}}</td>
            <td>
              {{ optional($trainer->trainer)->specialization ?? '-' }}
            </td>
            <td class="text-center">
              <form action="{{route('deleteTrainer',$trainer->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>
            </td>
            </tr>
            @endforeach --}}

            </tbody>
            </table>
            {{-- pagination --}}
            <div class="my-3 w-100 d-flex justify-content-center">
              {{-- {{ $trainers->links('pagination::custome') }} --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="footer text-center bg-white shadow-sm py-3 mt-5">
    <p class="m-0">Copyright © 2024. All Rights Reserved. <a href="https://www.templaterise.com/" class="text-primary" target="_blank">Themes By TemplateRise</a></p>
  </div>
</div>

<!-- Scripts -->
@endsection