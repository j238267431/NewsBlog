@extends('layouts.main')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('categories')}}"><i class="fa fa-home"></i>Домой</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categories.show', $slug) }}">{{ $slug }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Новость</li>
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
                                <p class="post-date"> {{ $oneNews->pubDate }}</p>
                                <h2 class="post-title">{{ $oneNews->title }}</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <a href="#"><span>by</span> Colorlib</a>
                                    <a href="#">03 <span>Comments</span></a>
                                </div>
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img src="img/blog-img/8.jpg" alt="">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="single-blog-post mb-50">
                                        <!-- Thumbnail -->
                                        <div class="post-thumbnail">
                                                <img src="{{asset('img/blog-img/'.$id.'.jpg')}}" alt="">
                                        </div>
                                        <!-- Content -->
                                        <div class="post-content">
                                            <p class="post-excerpt">{{ $oneNews->description }}.</p>
                                        </div>
                                    </div>
                                </div>

                                <blockquote class="shortcodes">
                                    <div class="blockquote-icon">
                                        <img src="img/core-img/quote.png" alt="">
                                    </div>
                                    <div class="blockquote-text">
                                        <h5>That’s not to say you’ll have the exact same thing if you stop by: the restaurant’s menus change constantly, based on seasonal ingredients.</h5>
                                        <h6>Ollie Schneider - <span>CEO Colorlib</span></h6>
                                    </div>
                                </blockquote>


                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <img class="mb-30" src="img/blog-img/4.jpg" alt="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img class="mb-30" src="img/blog-img/3.jpg" alt="">
                                    </div>
                                </div>

                                <!-- List -->

                                <!-- Post Tags & Share -->
                                <div class="post-tags-share">
                                    <!-- Tags -->
                                    <ol class="popular-tags d-flex flex-wrap">
                                        <li><a href="#">HealthFood</a></li>
                                        <li><a href="#">Yoga</a></li>
                                        <li><a href="#">Life Style</a></li>
                                    </ol>
                                </div>

                                <!-- Related Post Area -->
                                <div class="related-posts clearfix">
                                    <!-- Headline -->
                                    <h4 class="headline">related posts</h4>

                                    <div class="row">

                                        <!-- Single Blog Post -->
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="#"><img src="img/blog-img/1.jpg" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">MAY 17, 2018 / lifestyle</p>
                                                    <a href="#" class="post-title">
                                                        <h4>A Closer Look At Our Front Porch Items From Lowe’s</h4>
                                                    </a>
                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Single Blog Post -->
                                        <div class="col-12 col-lg-6">
                                            <div class="single-blog-post mb-50">
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <a href="#"><img src="img/blog-img/4.jpg" alt=""></a>
                                                </div>
                                                <!-- Content -->
                                                <div class="post-content">
                                                    <p class="post-date">MAY 25, 2018 / Fashion</p>
                                                    <a href="#" class="post-title">
                                                        <h4>5 Things to Know About Dating a Bisexual</h4>
                                                    </a>
                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Comment Area Start -->
                                <div class="comment_area clearfix" id="comments_wrap" data-slug="{{$slug}}" data-newsid = {{ $id }}>
                                    @include('comments')
                                </div>
                                <!-- Leave A Comment -->
                                <div class="leave-comment-area clearfix">
                                    <div class="comment-form">
                                        <h4 class="headline">Оставьте комментарий</h4>
                                        <!-- Comment Form -->
                                        <div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                        </div>
                                        <div class="alert alert-success print-success-msg" style="display:none">
                                            <ul>комментарий успешно добавлен</ul>
                                        </div>
                                        <form action=""  method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="name"
                                                            id="contact-name"
                                                            placeholder="Name"
                                                            value="@if(isset($user)){{ $user->name }}@else{{old('name')}}@endif">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="contact-email" name="email" placeholder="Email"
                                                           value="@if(isset($user)){{ $user->email }}
                                                               @else {{ old('email') }}
                                                           @endif">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea
                                                            class="form-control"
                                                            name="body"
                                                            id="body"
                                                            cols="30"
                                                            rows="10"
                                                            placeholder="Comment">{{ old('body') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button data-slug="{{$slug}}" data-newsid="{{$id}}" id="leave_a_comment" type="submit" class="btn nikki-btn">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
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
@push('js')
<script type="text/javascript" charset="UTF-8">


    $(document).ready(function(){
        $(document).on('click', '.pagination a', function (){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var slug = $('#comments_wrap')[0].dataset.slug
            var id = $('#comments_wrap')[0].dataset.newsid
            fetch_data(page, slug, id);
        });
        function fetch_data(page, slug, id)
        {
            $.ajax({
                url: "/pagination/ajax?page="+page,
                data: {slug:slug,id:id},
                success:function (data)
                {
                    $('#comments_wrap').html(data);
                },
                error:function (msg)
                {
                    console.log(msg);

                }
            })
        }

    })

</script>


<script>
    $('#comments_wrap').on('click', function (){
        let idComm = event.toElement.dataset.id
        if(event.toElement.id == 'reply'){
            event.preventDefault()
            $(`#hidden${idComm}`).css('display', 'block')
            // $(`#save${idComm}`).css('display', 'inline-block')
        }
        if(event.toElement.id == `save${idComm}`){
            // let toCommentId = event.toElement.dataset.id
            event.preventDefault()
            $(`#hidden${idComm}`).css('display', 'none')
            // $(`#save${idComm}`).css('display', 'none')
            var slug = this.dataset.slug
            var newsId = this.dataset.newsid
            var body = $(`#body${idComm}`).val()
            $.ajax({
                url: '{{ route('replies') }}',
                type: "GET",
                data: {body:body,slug:slug,newsId:newsId,commentId:idComm},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    let str = `
                            <ol class="children" id="">
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="img/blog-img/10.jpg" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <span class="comment-date">${data['createdAt']}</span>
                                            <h5>${data['body']}</h5>
                                            <p></p>
                                        <div
                                            id="likes_modal${data['replyId']}"
                                            data-animation="true"
                                            data-delay="1000"
                                            style="max-width: 100px; border: none; box-shadow: none"
                                            role="alert" aria-live="assertive" aria-atomic="true" class="toast fade hide" data-autohide="true">
                                            <i class="far fa-heart" style="color: red"></i><span class="toast-body"></span>
                                        </div>
                                            <a
                                                id="like"
                                                data-type="reply"
                                                data-reply_id="${data['replyId']}"  href="#">Like
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ol>`
                    $(`#reply_block${idComm}`).prepend(str);
                    $(`#body${idComm}`).val("");
                },
                error: function (msg) {

                    console.log(msg);

                }
            })

        }
    })
</script>

{{--comment leave block--}}
<script>
    $(document).ready(function(){
        $(document).on('click','#leave_a_comment', function (){
            event.preventDefault()
            console.log(1);
            let body = $('#body').val()
            let newsId = $('#leave_a_comment')[0].dataset.newsid
            let author = $('#contact-name').val()
            let slug = $('#leave_a_comment')[0].dataset.slug
            let email = $('#contact-email').val()
            let commentId = null
            $.ajax({
                url: '{{ route('comments.store') }}',
                type: "POST",
                data: {body:body,slug:slug,newsId:newsId,commentId:commentId},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data){
                    let str = `
                <li class="single_comment_area" id="">
                    <div class="comment-wrapper d-flex">
                        <div class="comment-author">
                            <img src="img/blog-img/9.jpg" alt="">
                        </div>
                        <div class="comment-content">
                            <span class="comment-date">${data['createdAt']}</span>
                            <h5>${data['userName']}</h5>
                            <p>${data['body']}</p>
                            <div
                                id="likes_modal${data['id']}"
                                data-animation="true"
                                data-delay="1000"
                                style="max-width: 100px; border: none; box-shadow: none"
                                role="alert" aria-live="assertive" aria-atomic="true" class="toast fade hide" data-autohide="true">
                                <i class="far fa-heart" style="color: red"></i><span class="toast-body"></span>
                            </div>
                            <a id="like" data-type="comment" data-comment_id="${data['id']}" href="#">Like</a>
                            <a class="active reply" id="reply"  data-id="${data['id']}" href="#">Reply</a>
                            <div style="display: none" id="hidden${data['id']}">
                                <textarea class="textarea" data-textId="${data['id']}"  name="body" id="body${data['id']}" cols="60" rows="10"></textarea>
                                <p>
                                    <a href="#" class="active save"
                                       id="save${data['id']}"
                                       data-toCommId="${data['commentId']}"
                                       data-slug="${data['slug']}"
                                       data-newsId="${data['newsid']}"
                                       data-id="${data['id']}"
                                    >Send</a>
                            </div>
                            </p>
                        </div>
                    </div>
                <div id="reply_block${data['id']}">
                </div>
`
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','none');
                    $(".print-success-msg").css('display','block');

                    setTimeout(function (){
                        $(".print-success-msg").css('display','none');
                    },1000)

                    $(`#new_comment`).prepend(str)
                    $(`#body${data['id']}`).val("");
                    $('#body').val("");
                    let commentQty =  0;
                    if($('#comment_qty')[0].innerText == 'NO '){
                        commentQty = 1;
                        $('#letterS')[0].innerText = '';
                    } else {
                        commentQty = +$('#comment_qty')[0].innerText + 1;
                        $('#letterS')[0].innerText = 'S';
                    }
                    // if($('#comment_qty')[0].innerText == 1){
                    //
                    // }

                    $('#comment_qty')[0].innerText = commentQty
                },
                error: function(msg){
                    $(".print-error-msg").find("ul").html('');
                    $(".print-error-msg").css('display','block');
                    $.each( msg.responseJSON.errors, function( key, value ) {
                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });

                }
            })
        })
    })
</script>

<script>
    $('#comments_wrap').on('click', function (){
        if(event.toElement.id == 'like') {
            event.preventDefault()
            var commentId = event.toElement.dataset.comment_id
            var type = event.toElement.dataset.type
            var replyId = event.toElement.dataset.reply_id

            $.ajax({
                url: 'http://laravel.local/likes',
                type: "GET",
                data: {commentId: commentId, replyId: replyId, type: type},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                        //открыть модальное окно с id="myModal"
                    $(`#likes_modal${commentId}`).children('span').text(data['likesQty'])
                    $(`#likes_modal${commentId}`).toast('show')
                    $(`#likes_modal${replyId}`).children('span').text(data['likesQty'])
                    $(`#likes_modal${replyId}`).toast('show')


                },
                error: function (msg) {
                    console.log(msg)
                }

            })
        }
    })
</script>
@endpush

