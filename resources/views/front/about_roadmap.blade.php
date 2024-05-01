{{-- @dd($posts->first()->category->where('id', '!=', 5)->first()) --}}
@extends('front.layouts.front')

@section('title')
    <title>Lecturer - About - KanalNuklir</title>
@endsection

@section('content')
    <!-- BEGIN BOTTOM ABOUT BLOCK -->

    <!-- END BOTTOM ABOUT BLOCK -->
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('front.about') }}">About</a></li>
                <li class="active">Roadmap</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-3 col-sm-3 sidebar3">
                    @include('front.layouts.leftsidebar')
                </div>
                <!-- END CONTENT -->
                <div class="col-md-9 col-sm-9">
                    <h1 class="font-bold text-[40px] leading-[60px]">Roadmap Profile</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex w-full flex-wrap justify-center px-4 xl:mx-auto xl:w-10/12">
                                <div class="mb-12 p-4">
                                    <div class="overflow-hidden rounded-md shadow-md">
                                        <img src="{{ asset('assets/pages/img/roadmap/slide1.png') }}"
                                            alt="Roadmap Profile Nuclear Physics" width="w-full" />
                                    </div>
                                    <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">Roadmap Profile Nuclear Physics
                                    </h3>
                                    <p class="text-base font-medium text-secondary"></p>
                                </div>
                                <div class="mb-12 p-4">
                                    <div class="overflow-hidden rounded-md shadow-md">
                                        <img src="{{ asset('assets/pages/img/roadmap/slide2.png') }}"
                                            alt="Contoh Aplikasi Ilmu dan Rekayasa Nuklir (Energi)" width="w-full" />
                                    </div>
                                    <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">Contoh Aplikasi Ilmu dan Rekayasa
                                        Nuklir (Energi)</h3>
                                    <p class="text-base font-medium text-secondary"></p>
                                </div>
                                <div class="mb-12 p-4">
                                    <div class="overflow-hidden rounded-md shadow-md">
                                        <img src="{{ asset('assets/pages/img/roadmap/slide3.png') }}"
                                            alt="Roadmap Profile Biophysics" width="w-full" />
                                    </div>
                                    <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">Roadmap Profile Biophysics</h3>
                                    <p class="text-base font-medium text-secondary"></p>
                                </div>
                                <div class="mb-12 p-4">
                                    <div class="overflow-hidden rounded-md shadow-md">
                                        <img src="{{ asset('assets/pages/img/roadmap/slide4.png') }}"
                                            alt="Contoh Aplikasi Ilmu dan Rekayasa Nuklir (Energi)" width="w-full" />
                                    </div>
                                    <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">Contoh Aplikasi Ilmu dan Rekayasa
                                        Nuklir (Energi)

                                    </h3>
                                    <p class="text-base font-medium text-secondary"></p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- BEGIN SIDEBAR & CONTENT -->


            </div>
        </div>
    @endsection
