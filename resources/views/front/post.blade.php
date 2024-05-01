{{-- @dd($post) --}}
@extends('front.layouts.front')

@section('title')
    <title>Postingan {{ $post->title }} - KanalNuklir</title>
@endsection

@section('content')
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('front.blog') }}">Blog Page</a></li>
                <li class="active">{{ $post->title }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1 class="font-bold text-[40px] leading-[60px]">{{ $post->title }}</h1>
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-item">
                                <div class="blog-item-img">
                                    <!-- BEGIN CAROUSEL -->
                                    <div class="front-carousel">
                                        <div id="myCarousel" class="carousel slide">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="{{ Storage::url($post->image) }}" alt="">
                                                </div>

                                            </div>
                                            <!-- Carousel nav -->

                                        </div>
                                    </div>
                                    <!-- END CAROUSEL -->
                                </div>
                                <h2 class="font-semibold tex-2xl"><a href="#">{{ $post->category->name }}</a></h2>
                                <p class="mt-5">{!! $post->body !!}
                                <ul class="blog-info">
                                    <li><i class="fa fa-user"></i> By {{ $post->author->name }}</li>
                                    <li><i class="fa fa-calendar"></i> {{ $post->created_at->format('d/m/y') }}</li>
                                    {{-- <li><i class="fa fa-comments"></i> 17</li>
                                    <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li> --}}
                                </ul>

                                {{-- <h2>Comments</h2>
                                <div class="comments">
                                    <div class="media">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="assets/pages/img/people/img1-small.jpg" alt=""
                                                class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Media heading <span>5 hours ago / <a
                                                        href="javascript:;">Reply</a></span></h4>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                                cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                                amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                                dui. </p>
                                            <!-- Nested media object -->
                                            <div class="media">
                                                <a href="javascript:;" class="pull-left">
                                                    <img src="assets/pages/img/people/img2-small.jpg" alt=""
                                                        class="media-object">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Media heading <span>17 hours ago / <a
                                                                href="javascript:;">Reply</a></span></h4>
                                                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
                                                        tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                                        fermentum massa justo sit amet risus. Etiam porta sem malesuada
                                                        magna mollis euismod. Donec sed odio dui. </p>
                                                </div>
                                            </div>
                                            <!--end media-->
                                            <div class="media">
                                                <a href="javascript:;" class="pull-left">
                                                    <img src="assets/pages/img/people/img3-small.jpg" alt=""
                                                        class="media-object">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Media heading <span>2 days ago / <a
                                                                href="javascript:;">Reply</a></span></h4>
                                                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus,
                                                        tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                                        fermentum massa justo sit amet risus. Etiam porta sem malesuada
                                                        magna mollis euismod. Donec sed odio dui. </p>
                                                </div>
                                            </div>
                                            <!--end media-->
                                        </div>
                                    </div>
                                    <!--end media-->
                                    <div class="media">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="assets/pages/img/people/img4-small.jpg" alt=""
                                                class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Media heading <span>July 25,2013 / <a
                                                        href="javascript:;">Reply</a></span></h4>
                                            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac
                                                cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
                                                amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio
                                                dui. </p>
                                        </div>
                                    </div>
                                    <!--end media-->
                                </div>

                                <div class="post-comment padding-top-40">
                                    <h3>Leave a Comment</h3>
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Email <span class="color-red">*</span></label>
                                            <input class="form-control" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" rows="8"></textarea>
                                        </div>
                                        <p><button class="btn btn-primary" type="submit">Post a Comment</button></p>
                                    </form>
                                </div> --}}
                            </div>
                            <!-- END LEFT SIDEBAR -->

                            <!-- BEGIN RIGHT SIDEBAR -->
                            @include('front.layouts.rightsidebar')
                            <!-- END RIGHT SIDEBAR -->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>
@endsection
