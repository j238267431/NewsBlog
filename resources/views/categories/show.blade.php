@extends('layouts.main')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('categories') }}"><i class="fa fa-home"></i> Домой</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $slug }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12">

                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">
                            <div class="text-center mb-50">
                                <h2 class="post-title">{{ $oneCategory->name }}</h2>
                                <!-- Post Meta -->
                            </div>

                            <!-- Post Thumbnail -->

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->

                        <div class="col-12 col-lg-12">
                            <div data-slug="{{$slug}}" class="blog-posts-area">
                                <div id="all_news_wrap">
                                    @include('allNews')
                                </div>

                            </div>
                        </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@stop

