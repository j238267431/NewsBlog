@extends('layouts.main')
@section('content')

    <section class="blog-content-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">
                            <!-- Featured Post Area -->
                            <div class="col-12">
                                <div class="featured-post-area mb-50">
                                    <!-- Thumbnail -->
                                    <div class="post-thumbnail mb-30">
                                        <a href="#"><img src="{{asset('img/blog-img/12.jpg')}}" alt=""></a>
                                    </div>
                                    <!-- Featured Post Content -->
                                    <div class="featured-post-content">
                                        <p class="post-date">MAY 7, 2018 / lifestyle</p>
                                        <a href="#" class="post-title">
                                            <h2>A Closer Look At Our Front Porch Items From Lowe’s</h2>
                                        </a>
                                        <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                    </div>
                                    <!-- Post Meta -->
                                    <div class="post-meta d-flex align-items-center justify-content-between">
                                        <!-- Author Comments -->
                                        <div class="author-comments">
                                            <a href="#"><span>by</span> Colorlib</a>
                                            <a href="#">03 <span>Comments</span></a>
                                        </div>
                                        <!-- Social Info -->
                                        <div class="social-info">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->

                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post mb-50">
                                        <!-- Thumbnail -->
                                        <div class="post-thumbnail">
                                            <a href="">
                                                <img src="" alt="someImg">
                                            </a>
                                        </div>
                                        <!-- Content -->
                                        <div class="post-content">
                                            <p class="post-date">MAY 10, 2018 / life</p>
                                            <a href="" class="post-title">
                                                <h4>{{ 'title' }}</h4>
                                            </a>
                                            <p class="post-excerpt">{{ 'description' }}.</p>
                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>

                    <!-- Pager -->
                    <ol class="nikki-pager">
                        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
                        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                    </ol>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>{{ $user->name }}</h6>
                            </div>
                            <!-- Thumbnail -->
                            <div class="about-thumbnail">
{{--                                <img src="{{asset('img/blog-img/about-me.jpg')}}" alt="">--}}

                                <img src=" {{ Storage::disk('uploads')->url($profile->image) }}" alt="">

                            </div>
                            <!-- Content -->
                            <div class="widget-content text-center">
                                <img src="{{asset('img/core-img/signature.png')}}" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ipsum adipisicing</p>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                @if($idProfileIsSet)
                                    <h6><a href="{{ route('profile.edit', $user->id_profile ) }}">edit profile</a></h6>
                                @else
                                    <h6><a href="{{ route('profile.create') }}">create profile</a></h6>
                                @endif
                            </div>
                            <!-- Widget Social Info -->
                            <div class="widget-social-info text-center">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Latest Posts</h6>
                            </div>

                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{ asset('img/blog-img/lp1.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>10 Books to Read This Summer If You Want to Improve Yourself</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>
                                </div>
                            </div>

                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{ asset('img/blog-img/lp2.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>Why I Decided to Give up My Favorite Foods and Go Vegan</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>
                                </div>
                            </div>

                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{ asset('img/blog-img/lp3.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>The 10 Most Instagrammable Spots in San Diego</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>
                                </div>
                            </div>

                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{ asset('img/blog-img/lp4.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>5 Things to Know About Dating a Bisexual</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>
                                </div>
                            </div>

                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex">
                                <div class="post-thumb">
                                    <img src="{{ asset('img/blog-img/lp5.jpg')}}" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="#" class="post-title">
                                        <h6>How to Take Critical Feedback at Work (Like a Boss)</h6>
                                    </a>
                                    <a href="#" class="post-author"><span>by</span> Colorlib</a>
                                </div>
                            </div>

                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Adds -->
                            <a href="#"><img src="{{ asset('img/blog-img/add.png')}}" alt=""></a>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Newsletter</h6>
                            </div>
                            <!-- Content -->
                            <div class="newsletter-content">
                                <p>Subscribe our newsletter for get notification about new updates, information discount, etc.</p>
                                <form action="#" method="post">
                                    <input type="email" name="email" class="form-control" placeholder="Your email">
                                    <button><i class="fa fa-send"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area mb-30">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>popular tags</h6>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <li><a href="#">LifeStyle</a></li>
                                <li><a href="#">Sport</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">Yoga</a></li>
                                <li><a href="#">Health Food</a></li>
                                <li><a href="#">Summer Holiday</a></li>
                                <li><a href="#">Supper Food</a></li>
                                <li><a href="#">Life</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
