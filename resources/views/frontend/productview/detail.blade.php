@extends('frontend.layouts.app')

@section('content')

{{-- <h1>Welcome to product detail</h1> --}}
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>{{ $product->name }}</h2>
                    <span>
                        Home /
                        <a href="{{ route('product.detail', $product->id) }}">
                            The product in detail
                        </a>
                    </span>
                </div><!-- .heading-content -->
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #heading -->

<div id="product-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>{{ $product->name }} Detail</h2>
                    <img src="{{ asset('frontend/images/under-heading.png') }}" alt="Just an underline">
                </div><!-- .heading-section -->
            </div><!-- .col-md-12 -->
        </div><!-- .row -->

        <div id="single-blog" class="page-section first-section">
            <div class="container">
                <div class="row">
                    <div class="product-item col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="image">
                                    <div class="image-post">
                                        <img src="{{ asset('/storage/uploads/'. $product->product_img) }}" alt="{{ $product->name }}" width="100%">
                                    </div><!-- .image-post -->
                                </div><!-- .image -->

                                <div class="product-content">
                                    <div class="product-title">
                                        <h3>{{ $product->name }}</h3>
                                        <span class="subtitle">
                                            &#8358;{{ $product->price }}
                                        </span>
                                    </div><!-- .product-title -->
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div><!-- .product-content -->

                                <!-- Comment system -->
                                <div class="divide-line">
                                    <img src="{{ asset('frontend/images/div-line.png') }}" alt="Just a line divider">
                                </div><!-- .divide-line -->
                                <div class="comments-title">
                                    <div class="comment-section">
                                        <h4>4 comments</h4>
                                    </div><!-- .comment-section -->
                                </div><!-- .comments-title -->

                                <div class="all-comments">
                                    <!-- logic comes in here -->
                                    @forelse ($comments as $comment)
                                    <div class="view-comments">

                                        <div class="comments">
                                            <div class="author-thumb">
                                                <img src="{{ asset('frontend/images/author-comment1.jpg') }}" alt="Image of the customer commenting">
                                            </div><!-- .author-thumb -->
                                            <div class="comment-body">
                                                <h6>{{ $comment->user->name }}</h6>
                                                <span class="date">
                                                    {{ $comment->created_at }}
                                                </span>
                                                <a class="btn btn-warning" onclick="rplyComment( `{{ $comment->id }}` )" style="color: #fff; padding-bottom: 32px;">
                                                    Reply
                                                </a>
                                                <p>
                                                    {{ $comment->body }}
                                                </p>
                                            </div><!-- .comment-body -->
                                        </div><!-- .comments hidden-xs  -->

                                    </div><!-- .view-comments -->


                                    @foreach ($commentreplies as $commentreply)
                                    @if ($commentreply->comment_id == $comment->id)

                                    <div class="replyed-form">
                                        <div class="comments replyed">
                                            <div class="author-thumb">
                                                <img src="{{ asset('frontend/images/author-comment2.jpg') }}" alt="customer reply to a comment">
                                            </div><!-- .author-thumb -->
                                            <div class="comment-body">
                                                <h6>
                                                    {{ $commentreply->user->name }}
                                                </h6>
                                                <span class="date">
                                                    {{ $commentreply->created_at }}
                                                </span>
                                                {{-- <a href="" class="hidden-xs">
                                                    Reply
                                                </a> --}}
                                                <p>
                                                    {{ $commentreply->body }}
                                                </p>
                                            </div><!-- .comment-body -->
                                        </div><!-- .comments replyed -->
                                    </div><!-- .replyed-form -->

                                    @endif

                                    @endforeach

                                    @empty
                                    <p>None</p>
                                    @endforelse
                                    <!-- end of logic -->

                                </div><!-- .all-comments -->

                                <div class="divide-line">
                                    <img src="{{ asset('frontend/images/div-line.png') }}" alt="Just a line divider">
                                </div><!-- .divide-line -->
                                <div class="leave-comment">
                                    <div class="leave-one">
                                        <h4>
                                            Leave a comment
                                        </h4>
                                    </div><!-- .leave-one -->
                                </div><!-- .leave-comment -->
                                <div class="leave-form">

                                    <form method="POST" action="{{ route('comment.store') }}" class="leave-comment">
                                        @csrf

                                        <div class="row">
                                            <div class="text col-md-4 form-group">
                                                <textarea class="form-control" name="body" cols="30" placeholder="Comment here..."></textarea>
                                            </div><!-- .text col-md-4 -->
                                        </div>
                                        <!-- .row -->

                                        <div class="row">
                                            <div class="text col-md-4 form-group">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            </div><!-- .text col-md-4 -->
                                        </div>
                                        <!-- .row -->

                                        <div class="send">
                                            <button type="submit">
                                                Send
                                            </button>
                                        </div><!-- .send -->
                                    </form>

                                </div><!-- .leave-form -->

                            </div><!-- .col-md-8 -->



                            <div class="col-md-3 col-md-offset-1">
                                <div class="side-bar">
                                    <div class="news-letters">

                                        {{-- <form method="POST" action="{{ route('product.addToCart') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $product->id }}" name="product_id">

                                            <input type="hidden" value="{{ $product->name }}" name="name">

                                            <input type="hidden" value="{{ $product->price }}" name="price">

                                            <input type="hidden" value="{{ $product->product_img }}" name="product_img">

                                            <input type="hidden" value="1" name="qty">

                                            <input type="submit" class="btn btn-warning" value="Buy Now" style="color: #fff; padding: 15px; width: 100%; font-size: 1.6rem;">

                                        </form> --}}

                                        <a href="{{ route('product.addToCart', $product->id) }}" class="btn btn-warning" style="color: #fff; padding: 15px; width: 100%; font-size: 1.6rem;">
                                            Buy Now
                                        </a>

                                    </div><!-- .news-letters -->
                                </div><!-- .side-bar -->
                            </div><!-- .col-md-3 col-md-offset-1 -->



                        </div><!-- .row -->
                    </div><!-- .product-item .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- #single-blog .page-section -->

    </div><!-- .container -->
</div><!-- #product-post -->

<!-- Comment Reply Modal -->
<div id="commentReplyFmModal" class="modal "  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="commentReplyFmModalLabel">
                    Reply to comment
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div><!-- .modal-header -->

            <div class="modal-body">
                <form method="POST" action="{{ route('commentreply.store') }}">
                    @csrf

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="reply_commentId" name="comment_id">
                    </div>
                    <div class="form-group">
                        <label for="reply_body">
                            Enter your reply
                        </label>
                        <textarea name="body" id="body" cols="30" >Write here...</textarea>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-warning" value="Reply">
                    </div><!-- .modal-footer -->
                </form>
            </div><!-- .modal-body -->

        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- Close Comment Reply Modal -->

@endsection
