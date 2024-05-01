{{-- @dd($post->category->where('id', '!=', 5) --}}
@extends('front.layouts.front')

@section('title')
    <title>News - {{ $post->title }} - KanalNuklir</title>
@endsection

@section('content')
    <!-- BEGIN BOTTOM ABOUT BLOCK -->

    <!-- END BOTTOM ABOUT BLOCK -->
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="javascript:;">News</a></li>
                <li class="active">{{ $post->title }}</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-3 col-sm-3 sidebar2">

                    @include('front.layouts.leftsidebar')


                </div>
                <!-- END CONTENT -->
                <div class="col-md-9 col-sm-9">
                    <h1 class="font-bold text-[40px] leading-[60px]">News</h1>
                    <div class="content-page">
                        <!-- BEGIN CAROUSEL -->
                        <div class="front-carousel margin-bottom-20">

                            <div class="carousel-inner">
                                <div
                                    class="flex flex-col rounded-t-[12px] rounded-b-[24px] bg-white w-full overflow-hidden">
                                    <a href="" class=" w-full shrink-0 rounded-[10px] overflow-hidden">
                                        <img src="{{ Storage::url($post->image) }}" class="w-full h-full " alt="thumbnail">
                                    </a>
                                </div>

                                <h2 class="font-semibold text-[25px] leading-[35px] "><a
                                        href="">{{ $post->title }}</a>
                                </h2>
                                <p>{!! $post->body !!}</p>

                                <hr class="h-px my-8 bg-gray-300 border-0">

                                <p class="text-slate-500">written by {{ $post->author->name }}</p>
                                <p class="text-slate-500 -mt-5">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- BEGIN SIDEBAR & CONTENT -->
            </div>
        </div>
    @endsection
