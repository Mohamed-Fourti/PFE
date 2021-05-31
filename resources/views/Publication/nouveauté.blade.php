@extends('layouts.app')

@section('content')
<section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                  <div class="blog-details mt-30">
                      <div class="thum">
                      <img src="{{ getImage($Publication) }}" alt="" style="width:100%">
                      </div>
                      <div class="cont">
                          <h3>{{ $Publication->title }}</h3>
                          <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ $Publication->created_at }}</a></li>
                               <li><a href="#"><i class="fa "></i></a></li>
                           </ul>
                           
                           {!! $Publication->body !!}
                           
                           <ul class="share">
                               <li class="title">Share :</li>
                               <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                           <div class="blog-comment pt-45">
                               <div class="title pb-15">
                                   <h3>Comment (3)</h3>
                               </div>  <!-- title -->
                               <ul>
                                   <li>
                                       <div class="comment">
                                           <div class="comment-author">
                                                <div class="author-thum">
                                                    <img src="images/review/r-1.jpg" alt="Reviews">
                                                </div>
                                                <div class="comment-name">
                                                    <h6>Bobby Aktar</h6>
                                                    <span>April 03, 2019</span>
                                                </div>
                                            </div>
                                            <div class="comment-description pt-20">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                            </div>
                                            <div class="comment-replay">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div> <!-- comment -->
                                        <ul class="replay">
                                           <li>
                                               <div class="comment">
                                                   <div class="comment-author">
                                                        <div class="author-thum">
                                                            <img src="images/review/r-2.jpg" alt="Reviews">
                                                        </div>
                                                        <div class="comment-name">
                                                            <h6>Humayun Ahmed</h6>
                                                            <span>April 03, 2019</span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-description pt-20">
                                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                                    </div>
                                                    <div class="comment-replay">
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div> <!-- comment -->
                                           </li>
                                       </ul>
                                   </li>
                                   <li>
                                       <div class="comment">
                                           <div class="comment-author">
                                                <div class="author-thum">
                                                    <img src="images/review/r-3.jpg" alt="Reviews">
                                                </div>
                                                <div class="comment-name">
                                                    <h6>Bobby Aktar</h6>
                                                    <span>April 03, 2019</span>
                                                </div>
                                            </div>
                                            <div class="comment-description pt-20">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                            </div>
                                            <div class="comment-replay">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div> <!-- comment -->
                                   </li>
                               </ul>
                               <div class="title pt-45 pb-25">
                                   <h3>Leave a comment</h3>
                               </div> <!-- title -->
                               <div class="comment-form">
                                   <form action="#">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-singel">
                                                   <input type="text" placeholder="Name">
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-singel">
                                                   <input type="email" placeholder="email">
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-singel">
                                                   <textarea placeholder="Comment"></textarea>
                                               </div> <!-- form singel -->
                                           </div>
                                           <div class="col-md-12">
                                               <div class="form-singel">
                                                   <button class="main-btn">Submit</button>
                                               </div> <!-- form singel -->
                                           </div>
                                       </div> <!-- row -->
                                   </form>
                               </div>  <!-- comment-form -->
                           </div> <!-- blog comment -->
                      </div> <!-- cont -->
                  </div> <!-- blog details -->
              </div>
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    @endsection
