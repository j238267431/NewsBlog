@extends('layouts.main')
@section('content')
    <section class="blog-content-area section-padding-100">
        <div class="container">
            @if(session('adminError'))
                <div class="alert alert-danger">
                    {{session('adminError')}}
                </div>
            @endif
        <div class="single-post-details-area">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <div class="row">
                            <div id="all_news_wrap">
                                <h1 class="post-title text-center mb-50">Все новости</h1>
                                @include('allNews')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Blog Sidebar Area -->
            </div>
        </div>
    </section>
@stop




