<header class="header-area">

    <!-- Navbar Area -->
    <div class="nikki-main-menu">

        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="nikkiNav">

                    <!-- Nav brand -->
{{--                    <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>--}}
                    <a href="{{route('categories')}}"><h3>News Blog</h3></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                @if(!Auth::user())
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                @else
                                    <li style="position: relative" class="nav-item dropdown show">
                                        <a
                                            id="navbarDropdown"
                                            href="#" role="button"
                                            v-pre
                                            onclick="event.preventDefault();
                                            let dropDown = document.getElementById('drop-down-form');
                                            if(dropDown.classList.contains('show')){
                                                dropDown.classList.remove('show')
                                            } else {
                                                dropDown.classList.add('show')
                                            }">
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div style="position: absolute" id="drop-down-form" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('account') }}">
                                                {{ __('Account') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            @if(Auth::user()->is_admin)
                                            <a class="dropdown-item" href="{{ route('admin') }}">
                                                {{ __('Admin') }}
                                            </a>
                                            @endif
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endif
                            </ul>

                            <!-- Search Form -->
                            <div class="search-form" style="position: relative">
                                <form action="#" method="get">
                                    <input id="search" type="search" name="search" class="form-control" value="{{old('search')}}" placeholder="Админ поиск новостей">
{{--                                    <button type="submit"><i class="fa fa-search"></i></button>--}}
                                </form>
                                    <div id="search_news_wrap"
                                         style="
                                         max-height: 500px;
                                         overflow: auto;
                                         display: none;
                                         top: 41px;
                                         position: absolute;
                                         width: 800px;
                                         left: -440px;
                                         box-shadow: 0 0 10px rgba(0,0,0,0.5)" class="alert alert-light">
                                    </div>
                            </div>


                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

@push('js')
    <script>
        $('#search').on('keyup', function(){
            event.preventDefault()
            let searchWord = $(this).val();
            let last = searchWord.toString().slice(-1);
            // let slug = $('.blog-posts-area')[0].dataset.slug
            while(last.match("^[a-zA-Z0-9а-яА-ЯЁё\'\"]*$") == null){
                $(this).val(searchWord.slice(0,-1));
                searchWord = $(this).val()
                last = searchWord.toString().slice(-1);

            }
            searchWord = $(this).val()
            $.ajax({
                url:'{{ route('admin.searchSimple') }}',
                type:"GET",
                data:{searchWord: searchWord},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (data){
                    $('#search_news_wrap').html(data);
                    if (searchWord != '') {
                        $('#search_news_wrap').css('display', 'block');
                    } else {
                        $('#search_news_wrap').css('display', 'none');
                    }
                },
                error: function (msg){

                }
            })
        })
    </script>
    <script>
        $(document).on('click', function(){
            if($('#search').val() != '' && (event.path[1].id == 'search_news_wrap' || event.path[0].id == 'search')){
                $('#search_news_wrap').css('display', 'block');
            } else {
                $('#search_news_wrap').css('display', 'none');
                $('#search').val('');
            }
        })
    </script>

@endpush
