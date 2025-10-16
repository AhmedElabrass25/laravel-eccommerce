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
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center  flex-column flex-md-row flex-lg-row mt-3">
                            <div class="flex-grow-1">
                                <h3 class="mb-2 text-color-2">Courses Details</h3>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <div class="mt-4">
                  <div class="row g-4">
                    <!-- Main Content -->
                    <div class="col-lg-8">
                      <div class="card shadow-sm border-0">
                        <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h1 class="text-size-26 mb-0 font-weight-600 ">{{ $course->title }}</h1>
                                <div class="d-flex gap-3">
                                    <button class="btn btn-light"><i class="fas fa-share"></i></button>
                                    <button class="btn btn-light"><i class="fas fa-bookmark"></i></button>
                                </div>
                            </div>
                            <div class="text-muted">Prof. {{ $course->trainer->name }}</div>
                            <div class="badge bg-primary mt-2">{{ $course->category->title }}</div>
                        </div>
        
                    
                        {{-- display course image --}}
                        <div class="mb-5">
                            <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="Course Image" class="img-fluid rounded">
                        </div>
        
                        <!-- About Course -->
                        {{-- <div class="mb-5">
                            <h3 class="text-size-18">About this course</h3>
                            <p class="text-muted text-size-15">Learn web design in 1 hour with 25+ simple-to-use rules and guidelines — tons of amazing web design resources included!</p>
                        </div> --}}
        
                        <!-- Description -->
                        <div class="mb-5">
                            <h3 class="text-size-18">Description</h3>
                            <p class="text-muted text-size-15">{{$course->description}}.</p>
                        </div>
        
                        <!-- Course Features -->
                         <div>
                          <h3 class="text-size-18 mb-3">This Course Includes</h3>
                          <div class="row g-3 course-features mb-5 text-size-15">
                            <div class="col-md-6">
                                <div><i class="fas fa-clock"></i> 1.3 Hours on-demand video</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-question-circle"></i> 35 Quizes</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-pencil-alt"></i> 7 Design Exercise</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-book"></i> Lectures: 19</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-video"></i> vide48 Articlesо</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-closed-captioning"></i> Captions: Yes</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-download"></i> 120 Download Resources</div>
                            </div>
                            <div class="col-md-6">
                                <div><i class="fas fa-globe"></i> Language English</div>
                            </div>
                        </div>
                         </div>
                      
        
                        <!-- Instructor -->
                        <div class="mb-5">
                            <h3 class="text-size-18">Instructor</h3>
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <img src="./assets/images/avatar-1.jpg" alt="Brooklyn Simmons" class="instructor-avatar">
                                <div>
                                    <h5 class="mb-0 text-size-15">Brooklyn Simmons</h5>
                                    <div class="text-muted mb-0 text-size-14">Web Instructor</div>
                                    <div class="rating-stars text-size-14">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="text-muted ms-2">4.9 (12k)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                      <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="faq-item active">
                                <div class="faq-question">
                                    <div>
                                      <h4 class="mb-1 text-size-16">The Courses Program</h4>
                                      <div class="text-muted text-size-14">2/5 | 4.4 min</div>
                                    </div>
                                </div>
                                <div class="faq-answer">
                                  <div class="lesson-list">
                                    <div class="lesson-item completed">
                                        <div class="d-flex">
                                            <div>
                                              <i class="fas fa-check-circle check-circle me-2"></i>
                                            </div>
                                            <div>
                                              <div><p class="m-0">1. Welcome to this course</p></div>
                                              <div class="text-muted">2.4 min</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lesson-item completed">
                                      <div class="d-flex">
                                        <div>
                                          <i class="fas fa-check-circle check-circle me-2"></i>
                                        </div>
                                        <div>
                                          <div><p class="m-0">1. Watch before you start</p></div>
                                          <div class="text-muted">4.4 min</div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="lesson-item">
                                      <div class="d-flex">
                                        <div>
                                          <i class="fas fa-check-circle check-circle me-2"></i>
                                        </div>
                                        <div>
                                          <div><p class="m-0">1. Basic development theory</p></div>
                                          <div class="text-muted">5.4 min</div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="lesson-item">
                                      <div class="d-flex">
                                        <div>
                                          <i class="fas fa-check-circle check-circle me-2"></i>
                                        </div>
                                        <div>
                                          <div><p class="m-0">1. Basic front-end fundamentals</p></div>
                                          <div class="text-muted">3.4 min</div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="lesson-item">
                                      <div class="d-flex">
                                        <div>
                                          <i class="fas fa-check-circle check-circle me-2"></i>
                                        </div>
                                        <div>
                                          <div><p class="m-0">1. What is front-end development?</p></div>
                                          <div class="text-muted">10.4 min</div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="faq-item">
                              <div class="faq-question">
                                  <div>
                                    <h4 class="mb-1 text-size-16">Web Design for Web Developers</h4>
                                    <div class="text-muted text-size-14">0/5 | 4.4 min</div>
                                  </div>
                              </div>
                              <div class="faq-answer">
                                <div class="lesson-list">
                                  <div class="lesson-item">
                                      <div class="d-flex">
                                          <div>
                                            <i class="fas fa-check-circle check-circle me-2"></i>
                                          </div>
                                          <div>
                                            <div><p class="m-0">1. Welcome to this course</p></div>
                                            <div class="text-muted">2.4 min</div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Watch before you start</p></div>
                                        <div class="text-muted">4.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Basic development theory</p></div>
                                        <div class="text-muted">5.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Basic front-end fundamentals</p></div>
                                        <div class="text-muted">3.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. What is front-end development?</p></div>
                                        <div class="text-muted">10.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              </div>
                            </div>
                            <div class="faq-item">
                              <div class="faq-question">
                                  <div>
                                    <h4 class="mb-1 text-size-16">Build Beautiful Websites!</h4>
                                    <div class="text-muted text-size-14">0/5 | 4.4 min</div>
                                  </div>
                              </div>
                              <div class="faq-answer">
                                <div class="lesson-list">
                                  <div class="lesson-item">
                                      <div class="d-flex">
                                          <div>
                                            <i class="fas fa-check-circle check-circle me-2"></i>
                                          </div>
                                          <div>
                                            <div><p class="m-0">1. Welcome to this course</p></div>
                                            <div class="text-muted">2.4 min</div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Watch before you start</p></div>
                                        <div class="text-muted">4.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Basic development theory</p></div>
                                        <div class="text-muted">5.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Basic front-end fundamentals</p></div>
                                        <div class="text-muted">3.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. What is front-end development?</p></div>
                                        <div class="text-muted">10.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              </div>
                            </div>
                            <div class="faq-item">
                              <div class="faq-question">
                                  <div>
                                    <h4 class="mb-1 text-size-16">Final Project</h4>
                                    <div class="text-muted text-size-14">0/5 | 4.4 min</div>
                                  </div>
                              </div>
                              <div class="faq-answer">
                                <div class="lesson-list">
                                  <div class="lesson-item">
                                      <div class="d-flex">
                                          <div>
                                            <i class="fas fa-check-circle check-circle me-2"></i>
                                          </div>
                                          <div>
                                            <div><p class="m-0">1. Welcome to this course</p></div>
                                            <div class="text-muted">2.4 min</div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Watch before you start</p></div>
                                        <div class="text-muted">4.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="lesson-item">
                                    <div class="d-flex">
                                      <div>
                                        <i class="fas fa-check-circle check-circle me-2"></i>
                                      </div>
                                      <div>
                                        <div><p class="m-0">1. Basic development theory</p></div>
                                        <div class="text-muted">5.4 min</div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              </div>
                            </div>
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

     <!-- Scripts -->
@endsection