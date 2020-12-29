
<h4  class="headline">
    <span
        id="comment_qty">@if($commentsQty == 0) No @else{{$commentsQty}}@endif</span>
    Comment<span id="letterS">@if($commentsQty != 1)s @endif</span></h4>
    <ol>
        <!-- Single Comment Area -->
        <div id="new_comment">
        </div>
        @forelse($comments as $comment)

            <li class="single_comment_area" id="">
                    <div class="comment-wrapper d-flex">
                        <!-- Comment Meta -->
                        <div class="comment-author">
                            <img src="img/blog-img/9.jpg" alt="">
                        </div>
                        <!-- Comment Content -->
                        <div class="comment-content">
                            <span class="comment-date">{{ \Illuminate\Support\Carbon::parse($comment->created_at)->format('M d, Y (H:i)')}}</span>
                            <h5>{{$comment->user_name}}</h5>
                            <p>{{ $comment->body }}</p>



                            <div
                                id="likes_modal{{$comment->id}}"
                                data-animation="true"
                                data-delay="1000"
                                style="max-width: 100px; border: none; box-shadow: none"
                                role="alert" aria-live="assertive" aria-atomic="true" class="toast fade hide" data-autohide="true">
                                <i class="far fa-heart" style="color: red"></i><span class="toast-body"></span>
                            </div>

                            <a href="#"id="like" data-type="comment" data-comment_id="{{ $comment->id }}">Like</a>
                            <a class="active reply" id="reply"  data-id="{{ $comment->id }}" href="#">Reply</a>
                            <div style="display: none" id="hidden{{$comment->id}}">
                                <textarea class="textarea" data-textId="{{$comment->id}}"  name="body" id="body{{$comment->id}}" cols="60" rows="10"></textarea>
                                <p>
                                    <a href="#" class="active save"
                                       id="save{{ $comment->id }}"
                                       data-toCommId="{{ $comment->id }}"
                                       data-slug="{{$slug}}"
                                       data-newsId="{{ $id }}"
                                       data-id="{{$comment->id}}"
                                    >Send</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <div id="reply_block{{$comment->id}}">
                </div>
                    @foreach($replies as $reply)
                        @if($reply->to_comment_id == $comment->id)
                        <ol class="children" id="reply_block{{$comment->id}}">
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="img/blog-img/10.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <span class="comment-date">
                                            {{\Illuminate\Support\Carbon::parse($reply->created_at)->format('M d, Y (H:i)')}}
                                        </span>
                                        <h5>{{ $reply->name }}</h5>
                                        <p>{{ $reply->body }}</p>

                                        <div
                                            id="likes_modal{{$reply->id}}"
                                            data-animation="true"
                                            data-delay="1000"
                                            style="max-width: 100px; border: none; box-shadow: none"
                                            role="alert" aria-live="assertive" aria-atomic="true" class="toast fade hide" data-autohide="true">
                                            <i class="far fa-heart" style="color: red"></i><span class="toast-body"></span>
                                        </div>
                                        <a id="like" data-type="reply" data-reply_id="{{$reply->id}}" href="#">Like</a>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    @endif
                    @endforeach
            </li>
        @empty
            {{'комментариев нет'}}
        @endforelse
    </ol>
    {{$comments->links()}}


