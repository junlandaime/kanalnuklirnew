{{-- @dd($posts->first()->category->where('id', '!=', 5)->first()) --}}
@extends('front.layouts.front')

@section('title')
    <title>About - KanalNuklir</title>
@endsection

@section('content')
    <!-- BEGIN BOTTOM ABOUT BLOCK -->

    <!-- END BOTTOM ABOUT BLOCK -->
    <div class="main">
        <div class="container xl:px-[160px]">
            <ul class="breadcrumb">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('front.about') }}">About</a></li>
                <li class="active">Contact</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->

                <div class="col-md-3 col-sm-3 sidebar3">
                    @include('front.layouts.leftsidebar')
                </div>
                <!-- END CONTENT -->
                <div class="col-md-5 col-sm-5">
                    <h1 class="font-bold text-[40px] leading-[60px]">Our Contact</h1>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Alamat Kami:</h3>
                                <p>
                                <p class="MsoNormal">Graduate Program on Nuclear Science and Engineering</p>
                                <p class="MsoNormal">Faculty of Mathematics and Natural Sciences</p>
                                <p class="MsoNormal">Institut Teknologi Bandung</p>
                                <p class="MsoNormal">Ganesha 10 Bandung 40132, INDONESIA</p>
                                <p class="MsoNormal">Tel. +62-22-250-0834; Fax. +62-22-250-6452</p>
                                <p class="MsoNormal">Email : psidik@fi.itb.ac.id</p>
                                <p class="MsoNormal"><br></p>
                                <p class="MsoNormal"><br></p>
                                <p class="MsoNormal"><br></p>
                                <p class="MsoNormal">Sidik Permana, Dr.Eng, M.Eng, S.Si(B.Sc)</p>
                                <p class="MsoNormal">Associate Prof. (In Nuclear Science and Engineering)</p>
                                <p class="MsoNormal">Head of Nuclear Science and Engineering Dept.</p>
                                <p class="MsoNormal">Head of Magister on Physics Teaching</p>
                                <p class="MsoNormal">Physics Dept.</p>
                                <div><br></div>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Kami:</h3>
                                <p>psidik@fi.itb.ac.id</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telepon Kami:</h3>
                                <p>+62-22-250-0834</p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- BEGIN SIDEBAR & CONTENT -->
                <div class="col-md-4 col-sm-4">
                    <style type="text/css" media="screen">
                        iframe {
                            width: 100%;
                            min-height: 400px;
                        }
                    </style>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d829.6969627884902!2d107.61029112921874!3d-6.890467197920249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e65016963ae1%3A0xda91aac0811d2503!2sFakultas%20Matematika%20dan%20Ilmu%20Pengetahuan%20Alam%20ITB!5e0!3m2!1sid!2sid!4v1646733295387!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </div>
        </div>
    @endsection
