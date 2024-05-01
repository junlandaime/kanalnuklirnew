@extends('front.layouts.front')

@section('title')
    <title>People - KanalNuklir</title>
@endsection

@section('css')
@endsection

@section('content')
    <!-- BEGIN BOTTOM ABOUT BLOCK -->

    <!-- END BOTTOM ABOUT BLOCK -->
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li class="active">People</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <div class="col-md-12 col-sm-12">
                    <h1 class="font-bold text-[18px] leading-[30px]">KK Nuklir dan Biofisika</h1>
                    <div class="content-page">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">

                                @include('front.layouts.leftsidebar')
                            </div>
                            <!-- BEGIN CONTENT -->
                            <div class="col-md-9 col-sm-6">
                                <h1 class="font-bold text-[40px] leading-[60px]">Our People </h1>
                                <p>Graduate Program in Nuclear Science and Engineering has a total of 19 lecturer members
                                    (members of
                                    Nuclear Physics and Biophysics research group of ITB) which 7 members are qualified
                                    doctoral
                                    supervisors.
                                </p>
                                <div class="content-page mt-10">
                                    <div class="filter-v1">
                                        <h1 class="font-base text-[15px] leading-[30px]">Subject/Areas Expertise</h1>
                                        <ul class="mix-filter">
                                            <li data-filter="all" class="filter active">All</li>
                                            @foreach ($subjects as $subject)
                                                <li data-filter="{{ $subject->slug }}" class="filter">{{ $subject->name }}
                                                </li>
                                            @endforeach
                                            {{-- <li data-filter="category_2" class="filter">Web Development</li>
                                            <li data-filter="category_3" class="filter">Photography</li>
                                            <li data-filter="category_3 category_1" class="filter">Wordpress and Logo</li> --}}
                                        </ul>
                                        <div class="row mix-grid thumbnails">

                                            @forelse ($people as $person)
                                                <div class="col-md-3 col-sm-4 mix 
                                                @foreach ($person->subjects as $subject)
                                                    {{ $subject->slug }} @endforeach
                                                mix_all"
                                                    style="display: block; opacity: 1; ">
                                                    <div class="mix-inner ">
                                                        <img alt="" src="{{ Storage::url($person->foto) }}"
                                                            class="img-responsive rounded-2xl object-cover w-[160px] h-[200px]">
                                                        <div class="mix-details">
                                                            <a href="{{ route('front.people_details', $person) }}">
                                                                <h4>{{ $person->prename }} {{ $person->name }},
                                                                    {{ $person->postname }}
                                                                </h4>
                                                            </a>
                                                            <a data-rel="fancybox-button"
                                                                title="{{ $person->prename }} {{ $person->name }}, {{ $person->postname }}"
                                                                href="{{ Storage::url($person->foto) }}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Belum ada Data Dosen</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- BEGIN SIDEBAR & CONTENT -->
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/jquery-mixitup/jquery.mixitup.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/pages/scripts/portfolio.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            Portfolio.init();
        });
    </script>
@endsection
