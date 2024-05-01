<!-- BEGIN STYLE CUSTOMIZER -->
{{-- <div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
            <li class="color-red current color-default" data-style="red"></li>
            <li class="color-blue" data-style="blue"></li>
            <li class="color-green" data-style="green"></li>
            <li class="color-orange" data-style="orange"></li>
            <li class="color-gray" data-style="gray"></li>
            <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
    </div>
</div> --}}
<!-- END BEGIN STYLE CUSTOMIZER -->

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container xl:px-[160px]">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+62-22-250-0834</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>admin@kanalnuklir.id</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="{{ route('dashboard') }}">Log In</a></li>
                    <li><a href="{{ route('teacher.verify') }}">Dosen</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
    <div class="container xl:px-[160px]">
        <a class="site-logo" href="{{ route('front.index') }}"><img
                src="{{ asset('assets/corporate/img/logos/logo-corp-blue.png') }}" alt="Metronic FrontEnd"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>

                <li class="{{ request()->routeIs('front.index') ? 'active' : '' }}"><a
                        href="{{ route('front.index') }}">Home</a>
                </li>
                <li class="{{ request()->routeIs('front.news*') ? 'active' : '' }}"><a
                        href="{{ route('front.news') }}">News</a></li>
                <li class="{{ request()->routeIs('front.people*') ? 'active' : '' }}"><a
                        href="{{ route('front.people') }}">People</a></li>
                <li class="{{ request()->routeIs('front.course*') ? 'active' : '' }}"><a
                        href="{{ route('front.course') }}">Mata Kuliah</a></li>
                <li class="{{ request()->routeIs('front.blog*') ? 'active' : '' }}">
                    <a href="{{ route('front.blog') }}">Blog</a>
                </li>
                <li class="{{ request()->routeIs('front.about*') ? 'active' : '' }}">
                    <a href="{{ route('front.about') }}">About</a>
                </li>


                <!-- BEGIN TOP SEARCH -->
                {{-- <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </li> --}}
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
