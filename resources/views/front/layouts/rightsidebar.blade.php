<!-- BEGIN RIGHT SIDEBAR -->
<div class="col-md-3 col-sm-3 blog-sidebar">
    <!-- CATEGORIES START -->
    <h2 class="no-top-space text-[20px] leading-[30px]">Categories</h2>
    <ul class="nav sidebar-categories margin-bottom-40">
        @forelse ($categories->where('id', 3) as $category)
            @foreach ($category->child as $child)
                <li><a href="{{ route('front.category', $child) }}">{{ $child->name }}
                        ({{ $child->posts->count() }})
                    </a></li>
            @endforeach
        @empty
        @endforelse
    </ul>
    <!-- CATEGORIES END -->

    <!-- BEGIN RECENT NEWS -->
    {{-- <h2>Recent News</h2>
    <div class="recent-news margin-bottom-10">
        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <img class="img-responsive" alt="" src="assets/pages/img/people/img2-large.jpg">
            </div>
            <div class="col-md-9 recent-news-inner">
                <h3><a href="javascript:;">Letiusto gnissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <img class="img-responsive" alt="" src="assets/pages/img/people/img1-large.jpg">
            </div>
            <div class="col-md-9 recent-news-inner">
                <h3><a href="javascript:;">Deiusto anissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
            </div>
        </div>
        <div class="row margin-bottom-10">
            <div class="col-md-3">
                <img class="img-responsive" alt="" src="assets/pages/img/people/img3-large.jpg">
            </div>
            <div class="col-md-9 recent-news-inner">
                <h3><a href="javascript:;">Tesiusto baissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
            </div>
        </div>
    </div> --}}
    <!-- END RECENT NEWS -->



    <!-- BEGIN BLOG TAGS -->
    {{-- <div class="blog-tags margin-bottom-20">
        <h2>Tags</h2>
        <ul>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>OS</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Metronic</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Dell</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Conquer</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>MS</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Google</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Keenthemes</a></li>
            <li><a href="javascript:;"><i class="fa fa-tags"></i>Twitter</a></li>
        </ul>
    </div> --}}
    <!-- END BLOG TAGS -->
</div>
<!-- END RIGHT SIDEBAR -->
