@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">Settings</h2>
                <div class="my-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                        </li>
                    </ul>



                        <div class="row mt-5 align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <img src="{{ Storage::disk('uploads')->url($profile->image) }}" alt="фото не выбрано" class="avatar-img rounded-circle" />
{{--                                    <img src="{{asset($profile->image)}}" alt="" class="avatar-img rounded-circle" />--}}

                                    <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label style="margin-top: 10px;" class="btn btn-primary" for="inputId">выбрать фото</label>
                                        <input id="inputId" type="file" name="image" style="position: fixed; top: -100em">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
{{--                            <div class="col">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <h4 class="mb-1">{{ $user->name }}</h4>--}}
{{--                                        <p class="small mb-3"><span class="badge badge-dark">{{$profile->city_of_origin}}</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mb-4">--}}
{{--                                    <div class="col-md-7">--}}
{{--                                        <p class="text-muted">--}}
{{--                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at,--}}
{{--                                            pretium blandit sapien.--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>--}}
{{--                                        <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>--}}
{{--                                        <p class="small mb-0 text-muted">(537) 315-1481</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <form action="{{route('account.update')}}" method="POST">
                                @csrf
                                <hr class="my-4" />
                                <div class="form-group">
                                    <label for="firstname">ФИО</label>
                                    <input type="text" id="firstname" class="form-control" value="{{$user->name}}" name="name" placeholder="" />
                                </div>
                                @error('name')
                                @foreach($errors->get('name') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror
                                <div class="form-group">
                                    <label for="inputEmail4">Адрес электронной почты</label>
                                    <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$user->email}}" placeholder="" />
                                </div>
                                @error('email')
                                @foreach($errors->get('email') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror
                                <div class="form-group">
                                    <label for="ciy">Город</label>
                                    <input value="{{$profile->city_of_origin}}" type="text" class="form-control" id="city" name="city_of_origin" placeholder="" />
                                </div>
                                @error('city_of_origin')
                                @foreach($errors->get('city_of_origin') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror
                                <div class="form-group">
                                    <label for="day_of_birth">Дата рождения</label>
                                    <input value="{{$profile->day_of_birth}}" type="date" class="form-control" name="day_of_birth" max="{{ $currentDate }}" id="day_of_birth" placeholder="" />
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </form>
                        </div>



                        <hr class="my-4" />
                    <form action="{{route('password.update')}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword4">текущий пароль</label>
                                    <input type="password" class="form-control" id="inputPassword5" name="current_password" value="{{old('current_password')}}" />
                                </div>
                                @error('current_password')
                                @foreach($errors->get('current_password') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror
                                <div class="form-group">
                                    <label for="inputPassword5">новый пароль</label>
                                    <input type="password" class="form-control" id="inputPassword5" name="new_password" />
                                </div>
                                @error('new_password')
                                @foreach($errors->get('new_password') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror
                                <div class="form-group">
                                    <label for="inputPassword6">введите новый пароль повторно</label>
                                    <input type="password" class="form-control" id="inputPassword6" name="new_password_confirmation" />
                                </div>
                                @error('new_password_confirmation')
                                @foreach($errors->get('new_password_confirmation') as $error)
                                    <div class = "alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @enderror



                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Требования к паролю</p>
                                <p class="small text-muted mb-2">Чтобы создать пароль нужно следовать следующим правилам:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Минимум 8 символов</li>
                                    <li>Новый пароль не может быть таким же как текущий</li>
                                </ul>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@stop
