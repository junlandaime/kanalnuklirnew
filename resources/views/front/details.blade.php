@extends('front.layouts.front')

@section('title')
    <title>People - KanalNuklir</title>
@endsection

@section('content')
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('front.people') }}">Peole</a></li>
                <li class="active">{{ $person->name }}</li>
            </ul>
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1 class="font-bold text-[18px] leading-[30px]">KK Nuklir dan Biofisika</h1>
                    <div class="content-page">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                @include('front.layouts.leftsidebar')
                            </div>
                            <div class="col-md-9 col-sm-9 blog-posts">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <!-- BEGIN CAROUSEL -->
                                        <div class="front-carousel">
                                            <div class="carousel slide" id="myCarousel">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner">
                                                    <div class="item active">
                                                        <img class="rounded-2xl object-cover w-[160px] h-[200px]"
                                                            alt="" src="{{ Storage::url($person->foto) }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- END CAROUSEL -->
                                    </div>
                                    <div class="col-md-7 col-sm-7">
                                        <h2 class="font-semibold text-[25px] leading-[35px]">{{ $person->prename }}
                                            {{ $person->name }},
                                            {{ $person->postname }}</h2>

                                        {{-- <p class="mt-8">Graduate Program in Nuclear Science and Engineering has a total of
                                            19 lecturer members (members of Nuclear Physics and Biophysics research group of
                                            ITB) which 7 members are qualified doctoral supervisors.</p> --}}
                                        <ul class="list-unstyled margin-bottom-20 mt-10">
                                            <li> Kelompok Keahlian : KK Fisika Nuklir dan
                                                Biofisika</li>
                                            <li> Sekolah/Fakultas : Fakultas Matematika dan
                                                Ilmu Pengetahuan Alam</li>
                                            <li> {{ $person->email }}</li>

                                            <li> Jabatan Fungsional : {{ $person->jabatan }}
                                            </li>
                                            <hr>
                                            <br>
                                            <li> Subject/Areas :
                                                @foreach ($person->subjects as $item)
                                                    <span
                                                        class="text-base w-fit py-2 px-3 rounded-full bg-green-500 text-white font-bold m-3">
                                                        {{ $item->name }}
                                                    </span>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <!-- TABS -->
                                <div class="col-md-12 tab-style-1 mt-10">
                                    <ul class="nav nav-tabs">
                                        <li class="active font-bold text-2xl"><a href="#tab-1" data-toggle="tab">Bio</a>
                                        </li>
                                        <li class="font-bold text-2xl"><a href="#tab-2" data-toggle="tab">Project</a>
                                        </li>
                                        <li class="font-bold text-2xl"><a href="#tab-3" data-toggle="tab">Publikasi</a>
                                        </li>
                                        <li class="font-bold text-2xl"><a href="#tab-4" data-toggle="tab">HKI</a></li>
                                        <li class="font-bold text-2xl"><a href="#tab-5" data-toggle="tab">Tulisan</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane row fade in active px-4" id="tab-1">
                                            <p class="margin-bottom-10">
                                                {{-- <h1 class="font-extrabold text-5xl">Bio</h1> --}}
                                            <h2 class="font-bold text-xl">
                                                Education
                                            </h2>
                                            <ul class="list-unstyled margin-bottom-20">
                                                <li><i class="fa fa-check"></i> {{ $person->s1 }}</li>
                                                <li><i class="fa fa-check"></i> {{ $person->s2 }} </li>
                                                <li><i class="fa fa-check"></i> {{ $person->s3 }}</li>
                                            </ul>
                                            </p>

                                        </div>
                                        <div class="tab-pane row fade" id="tab-2">
                                            {!! $person->project !!}
                                        </div>
                                        <div class="tab-pane fade" id="tab-3">
                                            {!! $person->publication !!}
                                        </div>
                                        <div class="tab-pane fade" id="tab-4">
                                            {!! $person->hki !!}
                                        </div>
                                        <div class="tab-pane fade" id="tab-5">
                                            @forelse ($person->user->post as $post)
                                                <ul>
                                                    <li><a
                                                            href="{{ route('front.blog_details', $post) }}">{{ $post->title }}</a>
                                                    </li>
                                                </ul>
                                            @empty
                                                <p></p>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                                <!-- END TABS -->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT -->
                </div>
            </div>
        </div>
    @endsection
