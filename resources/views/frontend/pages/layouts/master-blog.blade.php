@extends('frontend.layouts.master')
@section('content')
<header class="site-header parallax-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-sm-7">
                <h2 class="title">@yield('portfolio_head_title')</h2>
            </div>
            <div class="col-sm-5">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li>@yield('portfolio_link_head_title')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Portfolio-Area-Start -->

    @yield('blog_content')

<!-- Portfolio-Area-End -->
<!-- Quote-Area-Start -->
{{-- <section class="quote-area section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="quote-box">

                    <div class="row ">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="quote-content">
                                @yield('quote_content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Quote-Area-End -->
@endSection
