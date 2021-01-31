@extends('layouts.admin')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('categories')}}"><i class="fa fa-home"></i>Домой</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Админ панель</li>
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
{{--                        <div class="post-content">--}}
                            <h1>Админ панель</h1>
                        @if(session('success'))<p class="alert alert-success">{{session('success')}}</p>@endif
                        <ul>
                            <li><a class="post-title" href="{{route('parser')}}">Парсинг новостей</a></li>
                            <li><a href="{{route('admin.categories')}}">Редактировать новости</a></li>
                            <li><a href="{{url('admin/users')}}">Редактироваь пользователей</a></li>
                        </ul>

{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->
@stop


