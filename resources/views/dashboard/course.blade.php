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
                                <h3 class="mb-2 text-color-2">Courses</h3>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <div class="d-flex align-items-center">                                
                                  <!-- Reports Button -->
                                   <a href="{{route('courseCreate')}}" class="cursor-pointer ms-4 bg-white bg-primary text-white d-flex align-items-center px-3 py-2 rounded-2 text-normal fw-bolder letter-spacing-26">
                                      <i class="fa-solid fa-plus me-3"></i>
                                      Add Course
                                   </a>
                                </div>
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
                                <th>Image</th> 
                                <th>Course Name</th>
                                <th>Category</th>
                                <th>Instructor</th>
                                <th>Price</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach($courses as $course)
                                <tr>
                                  <td><img src="{{asset('uploads/courses/'.$course->image)}}" alt="" style="width:60px;height:60px" class="img-fluid rounded-2"></td>
                                  <td>{{$course->title}}</td>
                                  <td>{{ $course->category ? $course->category->title : 'No Category' }}</td>
                                  <td>{{$course->trainer->name}}</td>
                                  <td>$ {{$course->price}}</td>
                                  <td class="">
                                   <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{route('courseDetails',$course->id)}}" class="btn btn-sm btn-info me-2"><i class="fa-solid fa-eye"></i></a>
                                    <form action="{{route('deleteCourse',$course->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                   </div>

                                  </td>
                                </tr>
                               @endforeach --}}

                              </tbody>
                          </table>
                          {{-- pagination --}}
                          <div class="my-3 w-100 d-flex justify-content-center">
                            {{-- {{ $courses->links('pagination::custome') }} --}}
                          </div>
                        </div>
                </div> 
                </div> 
           </div>
        </div>
         <!-- Footer -->
         <div class="footer text-center bg-white shadow-sm py-3 mt-5">
            <p class="m-0">Copyright © 2024. All Rights Reserved. <a href="https://www.templaterise.com/" class="text-primary" target="_blank" >Themes By TemplateRise</a></p>
        </div>
    </div>

    <!--Create  Modal -->
    {{-- <div class="modal fade" id="courseCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content rounded-0">
            <div class="modal-body p-4 position-relative">
              <button type="button" class="btn position-absolute end-1" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
              <h2 class="h5 text-color-2 py-2">Create Course</h2>
                 <form action="{{route('courseStore')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-12">
                        <label for="courseName" class="form-label text-color-2 text-normal">Course Name</label>
                        <input type="text" name="title" class="form-control" id="courseName" placeholder="e.g. Responsive Design">
                      </div>

                    <div class="col-md-6">
                      <label for="courseCategory" class="form-label text-color-2 text-normal">Course category</label>
                      <select id="courseCategory" class="form-select text-normal">
                        <option value="">Choose category</option>
                        <option value="Web Development">Web Development</option>
                        <option value="App Development">App Development</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label for="CourseThubmnail" class="form-label text-color-2 text-normal">Course Image</label>
                      <div class="file-input-container">
                        <input type="file" id="fileInput" name="image" class="file-input">
                        <label for="fileInput" class="file-label">
                          <span class="file-name">Choose image</span>
                          <span class="file-button">Browse</span>
                        </label>
                      </div>
                      
                    </div>
                   <div class="col-md-6">
                      <label for="courseTrainer" class="form-label text-color-2 text-normal">Course Trainer</label>
                      <select id="courseTrainer" name="trainer_id" class="form-select text-normal">
                        <option value="">Choose Trainer</option>
                        <option value="Web Development">T 1</option>
                        <option value="App Development">T 2</option>
                        <option value="Digital Marketing">T 3</option>
                      </select>
                    </div>
               
                    <div class="col-6">
                      <label for="coursePrice" class="form-label text-color-2 text-normal">Course Price</label>
                      <input type="number" name="price" class="form-control" id="coursePrice" placeholder="Course price">
                    </div>
                     <div class="col-12">
                        <label for="desc" class="form-label text-color-2 text-normal">Course Description</label>
                        <textarea name="desc" class="form-control" name="desc" id="desc" id="" cols="10" rows="0"></textarea>
                      </div>
                   
                    <div class="col-12 mt-5">
                      <button type="submit" class="btn bg-white bg-primary text-white d-flex align-items-center px-4 py-2 rounded-2 text-normal fw-bolder letter-spacing-26">Save Informations</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
    </div> --}}

     <!--Edit  Modal -->
     <div class="modal fade" id="courseEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded-0">
          <div class="modal-body p-4 position-relative">
            <button type="button" class="btn position-absolute end-1" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            <h2 class="h5 text-color-2 py-2">Edit Course</h2>
               <form class="row g-3">
                  <div class="col-12">
                      <label for="courseName" class="form-label text-color-2 text-normal">Course Name</label>
                      <input type="text" class="form-control" id="courseName" placeholder="e.g. Responsive Design">
                    </div>
                  <div class="col-md-6">
                    <label for="courseCategory" class="form-label text-color-2 text-normal">Course category</label>
                    <select id="courseCategory" class="form-select text-normal">
                      <option value="">Choose category</option>
                      <option value="Web Development">Web Development</option>
                      <option value="App Development">App Development</option>
                      <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="courseDificulties" class="form-label text-color-2 text-normal">Course Dificulties</label>
                    <select id="courseDificulties" class="form-select text-normal">
                      <option value="">Choose dificulties</option>
                      <option value="Beginners">Beginners</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Advanced">Advanced</option>
                      <option value="Expert">Expert</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label for="courseLesson" class="form-label text-color-2 text-normal">Total Lesson</label>
                    <input type="text" class="form-control" id="courseLesson" placeholder="Total lesson">
                  </div>
                  <div class="col-6">
                    <label for="CourseThubmnail" class="form-label text-color-2 text-normal">Course thumbnail</label>
                    <div class="file-input-container">
                      <input type="file" id="fileInput" class="file-input">
                      <label for="fileInput" class="file-label">
                        <span class="file-name">Choose file</span>
                        <span class="file-button">Browse</span>
                      </label>
                    </div>
                    
                  </div>
                  <div class="col-12">
                    <label for="CourseDescription" class="form-label text-color-2 text-normal">Course Description</label>
                    <div class="editor"></div>
                  </div>
                  <div class="col-12 mt-100">
                    <label for="courseStatus" class="form-label text-color-2 text-normal">Status</label>
                    <div class="status-container">
                      <label class="custom-radio">
                        <input type="radio" name="status" value="active" checked>
                        <span class="radio-circle"></span>
                        <span class="radio-label">Active</span>
                      </label>
                      <label class="custom-radio">
                        <input type="radio" name="status" value="pending">
                        <span class="radio-circle"></span>
                        <span class="radio-label">Pending</span>
                      </label>
                      <label class="custom-radio">
                        <input type="radio" name="status" value="rejected">
                        <span class="radio-circle"></span>
                        <span class="radio-label">Rejected</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="coursePrice" class="form-label text-color-2 text-normal">Course Price</label>
                    <input type="number" class="form-control" id="coursePrice" placeholder="Course price">
                  </div>
                  <div class="col-6">
                    <label for="deadLine" class="form-label text-color-2 text-normal">Deadline</label>
                    <div class="custom-date-input position-relative">
                      <input type="date" placeholder="mm/dd/yyyy" class="form-control custom-input" />
                      <span class="calendar-icon">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-12 mt-5">
                    <button type="submit" class="btn bg-white bg-primary text-white d-flex align-items-center px-4 py-2 rounded-2 text-normal fw-bolder letter-spacing-26">Update Informations</button>
                  </div>
                </form>
          </div>
        </div>
      </div>
  </div>

  @endsection