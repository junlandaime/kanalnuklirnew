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
                <li class="active">Lecturer</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-3 col-sm-3 sidebar3">
                    @include('front.layouts.leftsidebar')
                </div>
                <!-- END CONTENT -->
                <div class="col-md-7 col-sm-7">
                    <h1 class="font-bold text-[40px] leading-[60px]">Our Lecturer</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <p>
                                <p class="MsoNormal">Graduate Program in Nuclear Science and Engineering has a total of 19
                                    lecturer members
                                    (members of Nuclear Physics and Biophysics research group of ITB) which 7 members are
                                    qualified doctoral supervisors.</p>
                                <p class="MsoNormal"><br></p>

                                <ol>
                                    <li>Prof. Dr. Eng. Zaki Su’ud (ITB, Tokyo Institute of Technology, Japan)</li>
                                    <li>Prof. Idam Arief (ITB, Tasmania University, Australia)</li>
                                    <li>Prof. Abdul Waris, M. Eng, Ph.D (ITB, Tokyo Institute of Technology, Japan)</li>
                                    <li>Associate Prof. Dr. Rizal Kurniadi (ITB, Indonesia)</li>
                                    <li>Associate Prof. Dr. Eng. Khairul Basar (ITB, Ibaraki University, Japan)</li>
                                    <li>Associate Prof. Dr. Siti Nurul Khatimah (ITB, Tasmania University, Australia)</li>
                                    <li>Associate Prof. Dr. Widayani (ITB, Manchester University, UK</li>
                                    <li>Associate Prof. Dr. rer. nat. Sparisoma Viridi (ITB, Dortmund University, Germany)
                                    </li>
                                    <li>Associate Prof. Dr. Eng. Sidik Permana, M. Eng. (ITB, Tokyo Institute of Technology,
                                        Japan)</li>
                                    <li>Dr. Novitrian, MS (ITB, Indonesia)
                                    </li>
                                    <li>Dr. rer. nat. Freddy Haryanto (ITB, Tubingen University, Germany)</li>
                                    <li>Dr. Rena Widita (ITB, UNSW, Australia)</li>
                                    <li>Syeilendra Pramuditya, S.Si, M.Si, M.Eng, Ph.D (ITB, Tokyo Institute of Technology,
                                        Japan)</li>
                                    <li>Dr. Eng. Dwi Irwanto, S.Si, M.Si, M.Eng, Ph.D (ITB, Tokyo Institute of Technology,
                                        Japan)</li>
                                    <li>Dr. Triati Dwi K. W., S.Si, M.Eng (ITB, Osaka University, Japan)</li>
                                    <li>Dr. Eng. Asril Pramutadi, S.Si, M.Eng (ITB, Tokyo Institute of Technology, Japan)
                                    </li>
                                    <li>Dr. Eng. Nur Asiah, S.Si, M.Eng (ITB, Kyushu University, Japan)</li>
                                    <li>Galih Restu, S.Si, M.Si (ITB)</li>
                                    <li>Fauzia, S.Si, M.Si (ITB)</li>
                                    <p class="MsoNormal"><br></p>
                                    Other Lecturers : Partial or Guest lecture from Practitioners, Industries,
                                    Government, Regulator and international collaboration.
                                    <p class="MsoNormal"><br></p>
                                    <p class="MsoNormal"><br></p>
                                    <a href="{{ route('front.people') }}"><button class="btn btn-primary"
                                            type="submit">Selengkapnya</button></a>

                                </ol>
                                <div><br></div>
                                </p>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- BEGIN SIDEBAR & CONTENT -->


            </div>
        </div>
    @endsection
