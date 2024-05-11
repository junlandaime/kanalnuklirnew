{{-- @dd($posts->first()->category->where('id', '!=', 5)->first()) --}}
@extends('front.layouts.front')

@section('title')
    <title>News - KanalNuklir</title>
@endsection

@section('content')
    <!-- BEGIN BOTTOM ABOUT BLOCK -->

    <!-- END BOTTOM ABOUT BLOCK -->
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li class="active">News</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-3 col-sm-3 sidebar2">

                    @include('front.layouts.leftsidebar')


                </div>
                <!-- END CONTENT -->
                <div class="col-md-9 col-sm-9">
                    <h1 class="font-bold text-[40px] leading-[60px]">News
                        {{ request()->routeIs('front.category') ? ' : ' . $category->name : '' }}</h1>
                    <div class="content-page">
                        <!-- BEGIN CAROUSEL -->
                        <div class="front-carousel margin-bottom-20">

                            <div class="carousel-inner">
                                <div
                                    class="flex flex-col rounded-t-[12px] rounded-b-[24px] bg-white w-full overflow-hidden">
                                    <a href="{{ route('front.news_details', $posts->first()) }}"
                                        class=" w-full h-[300px] shrink-0 rounded-[10px] overflow-hidden">
                                        <img src="{{ Storage::url($posts->first()->image) }}"
                                            class="w-full h-full object-contain" alt="{{ $posts->first()->title }}">
                                    </a>
                                </div>

                                <h2 class="font-semibold text-[25px] leading-[35px] "><a
                                        href="{{ route('front.news_details', $posts->first()) }}">{{ $posts->first()->title }}</a>
                                </h2>
                                <p>{{ $posts->first()->excerpt }}</p>

                                <hr class="h-px my-8 bg-gray-300 border-0">
                            </div>

                            <!-- BEGIN INFO BLOCK -->


                            @forelse ($posts->skip(1) as $post)
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <!-- BEGIN CAROUSEL -->
                                        <div class="front-carousel">
                                            <div class="carousel slide" id="myCarousel">

                                                <!-- Carousel items -->
                                                <div
                                                    class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300">
                                                    <a href="{{ route('front.news_details', $post) }}"
                                                        class="thumbnail w-full h-[100px] shrink-0 rounded-[10px] overflow-hidden">
                                                        <img src="{{ Storage::url($post->image) }}" class="w-full h-full "
                                                            alt="thumbnail">
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- END CAROUSEL -->
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h2 class="font-semibold text-[20px] leading-[30px]"><a
                                                href="{{ route('front.news_details', $post) }}">{{ $post->title }}</a>
                                        </h2>

                                        <p>{{ $post->excerpt }}</p>

                                    </div>
                                </div>
                                <hr class="h-px my-8 bg-gray-300 border-0">
                            @empty
                            @endforelse


                        </div>
                    </div>


                </div>
                <!-- BEGIN SIDEBAR & CONTENT -->
            </div>
        </div>
    @endsection
