{{-- @dd($posts->first()->author->person->name) --}}
@extends('front.layouts.front')

@section('title')
    <title>{{ request()->routeIs('front.category') ? $category->name : '' }} Blogs - KanalNuklir
    </title>
@endsection

@section('content')
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li class="active">Blogs</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1 class="font-bold text-[30px] leading-[50px]">Blogs Page
                    </h1>
                    <p class="font-semibold text-[20px] text-slate-500 leading-[30px]">
                        {{ request()->routeIs('front.category') ? 'Category : ' . $category->name : '' }}
                        {{ request()->routeIs('front.author') ? 'Penulis : ' . $author->name : '' }}

                    </p>
                    <div class="content-page">
                        <div class="row">
                            <!-- BEGIN LEFT SIDEBAR -->
                            <div class="col-md-9 col-sm-9 blog-posts">
                                @forelse ($posts as $post)
                                    <div class="row mt-6">
                                        <div class="col-md-4 col-sm-4">
                                            <!-- BEGIN CAROUSEL -->
                                            <div class="front-carousel">
                                                <div
                                                    class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300">
                                                    <a href="{{ route('front.blog_details', $post) }}"
                                                        class="thumbnail w-full h-[150px] shrink-0 rounded-[10px] overflow-hidden">
                                                        <img src="{{ Storage::url($post->image) }}" class="w-full h-full "
                                                            alt="thumbnail">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- END CAROUSEL -->
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <h2 class="font-semibold text-[30px] leading-[40px]"><a
                                                    href="{{ route('front.blog_details', $post) }}">{{ $post->title }}</a>
                                            </h2>
                                            <ul class="blog-info">
                                                <li><i class="fa fa-calendar"></i>
                                                    {{ $post->created_at->diffForHumans() }}</li>
                                                <li><i class="fa fa-user"></i> {{ $post->author->name }}</li>
                                                {{-- <li><i class="fa fa-comments"></i> 5</li> --}}
                                                <li><i class="fa fa-tags"></i> {{ $post->category->name }}</li>
                                            </ul>
                                            <p>{{ $post->excerpt }}</p>
                                            <a href="{{ route('front.blog_details', $post) }}" class="more">Read
                                                more <i class="icon-angle-right"></i></a>
                                        </div>
                                    </div>
                                @empty
                                    <p class="mt-10 font-normal text-[20px]">Belum Ada Postingan</p>
                                @endforelse


                                <hr class="blog-post-sep">
                                <ul class="pagination">
                                    <li><a href="javascript:;">Prev</a></li>
                                    <li><a href="javascript:;">1</a></li>
                                    <li><a href="javascript:;">2</a></li>
                                    <li class="active"><a href="javascript:;">3</a></li>
                                    <li><a href="javascript:;">4</a></li>
                                    <li><a href="javascript:;">5</a></li>
                                    <li><a href="javascript:;">Next</a></li>
                                </ul>
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
