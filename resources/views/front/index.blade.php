@extends('front.layouts.front')

@section('title')
    <title>KanalNuklir - Website Nuklir</title>
@endsection

@section('content')
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators carousel-indicators-frontend">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-eight">
                    <div class="container">
                        <div class="carousel-position-three text-uppercase text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v5"
                                data-animation="animated fadeInDown">
                                Visit Our Epicentrum <br />
                                <span class="carousel-title-normal">ITB</span>
                            </h2>
                            <p class="carousel-subtitle-v5 border-top-bottom margin-bottom-30"
                                data-animation="animated fadeInDown">This is what you were looking for?</p>
                            <a class="carousel-btn-green" href="https://www.itb.ac.id/" target="_blank"
                                data-animation="animated fadeInUp">See More
                                Details!</a>
                        </div>
                    </div>
                </div>

                <!-- Second slide -->
                <div class="item carousel-item-nine">
                    <div class="container">
                        <div class="carousel-position-six">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                More more Informations?
                            </h2>
                            <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                                find what you were looking for
                            </p>
                            <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                                I hope you get what you are looking for.<br />
                                Keep looking and don't give up.
                            </p>
                            <a class="carousel-btn-green" href="{{ route('front.news') }}"
                                data-animation="animated fadeInUp">See More!</a>
                        </div>
                    </div>
                </div>

                <!-- Third slide -->
                <div class="item carousel-item-ten active">
                    <div class="container">
                        <div class="carousel-position-six">
                            <h2 class="animate-delay carousel-title-v6 text-uppercase" data-animation="animated fadeInDown">
                                Kanal Nuklir
                            </h2>
                            <p class="carousel-subtitle-v6 text-uppercase" data-animation="animated fadeInDown">
                                For Adding Your Nuclear reference
                            </p>
                            <p class="carousel-subtitle-v7 margin-bottom-30" data-animation="animated fadeInDown">
                                Explore this Website.<br />
                                Swipe for More Informations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop carousel-control-frontend"
                href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop carousel-control-frontend"
                href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
        <div class="container xl:px-[160px]">
            <!-- BEGIN NEW POSTS-->
            <div class="row recent-work margin-bottom-40">
                <div class="col-md-3">
                    <h2 class="font-bold text-[40px] leading-[60px]"><a href="{{ route('front.news') }}">Recent
                            Informations</a></h2>
                    <p class="text-[#475466] text-lg leading-[34px]">Swipe For More Informations</p>
                </div>
                <div class="col-md-9">
                    <div class="owl-carousel owl-carousel3">
                        @forelse ($posts as $post)
                            <div class="recent-work-item">
                                <em>
                                    <img src="{{ Storage::url($post->image) }}" alt="Amazing Project"
                                        class="img-responsive rounded-2xl object-cover w-[120px] h-[140px]">
                                    {{-- <a href="portfolio-item.html"><i class="fa fa-link"></i></a> --}}
                                    <a href="{{ Storage::url($post->image) }}" class="fancybox-button"
                                        title="{{ $post->title }}" data-rel="fancybox-button"></i></a>
                                </em>
                                <a class="recent-work-description" href="{{ route('front.news_details', $post) }}">
                                    <strong>{{ $post->title }}</strong>
                                    <b>{{ $post->category->name }}</b>
                                </a>
                            </div>
                        @empty
                            <p>Belum ada Data Postingan</p>
                        @endforelse


                    </div>
                </div>
            </div>
            <!-- END NEW POSTS-->



            <!-- BEGIN STEPS -->
            <div class="row margin-bottom-40 front-steps-wrapper front-steps-count-3">
                <div class="col-md-4 col-sm-4 front-step-col">
                    <div class="front-step front-step1">
                        <h2><a href="{{ route('front.about_roadmap') }}">Roadmap Profile</a></h2>
                        <p></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 front-step-col">
                    <div class="front-step front-step2">
                        <h2><a href="{{ route('front.about_roadmap') }}">Roadmap Profile Nuclear Physics</a></h2>
                        <p>Contoh Aplikasi Ilmu dan Rekayasa
                            Nuklir (Energi)</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 front-step-col">
                    <div class="front-step front-step3">
                        <h2><a href="{{ route('front.about_roadmap') }}">Roadmap Profile Biophysics</a></h2>
                        <p>Contoh Aplikasi Ilmu dan Rekayasa
                            Nuklir (Energi)</p>
                    </div>
                </div>
            </div>
            <!-- END STEPS -->

            <!-- BEGIN NEW POSTS-->
            <div class="row recent-work margin-bottom-40">

                <div class="col-md-12">
                    <h2 class="font-semibold text-[30px] leading-[40px]">Blogs Categories
                    </h2>
                    <p class="text-[#475466] text-lg leading-[34px]">Swipe For More Blog Categories</p>
                    <div class="owl-carousel owl-carousel4">
                        @forelse ($categoriesBlog as $blog)
                            @foreach ($blog->child as $child)
                                <div class="recent-work-item">

                                    <a class="recent-work-description font-bold tex-[30px]"
                                        href="{{ route('front.category', $child) }}">
                                        {{ $child->name }}
                                        {{-- <b>{{ $blog }}</b> --}}
                                    </a>
                                </div>
                            @endforeach
                        @empty
                            <p>Belum ada Data Kategori Blog</p>
                        @endforelse


                    </div>
                </div>
            </div>
            <!-- END NEW POSTS-->
        </div>
    </div>
@endsection
