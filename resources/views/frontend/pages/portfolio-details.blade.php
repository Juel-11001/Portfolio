@extends('frontend.pages.layouts.master-blog')
@section('portfolio_head_title')
    Blog
@endsection
@section('portfolio_link_head_title')
    Blog
@endsection
<!-- Portfolio-Area-Start -->
@section('blog_content')
<section class="portfolio-details section-padding" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{$portfolio->title}}</h2>
                <figure class="image-block">
                    <img src="{{asset($portfolio->image)}}" alt="">
                </figure>
                <div class="portflio-info">
                    <div class="single-info">
                        <h4 class="title">Client</h4>
                        <p>{{$portfolio->client}}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Date</h4>
                        <p>{{date('d M, Y',strtotime($portfolio->created_at))}}</p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Website</h4>
                        <p><a href="{{$portfolio->website_url}}" target="_blank">{{$portfolio->website_url}}</a></p>
                    </div>
                    <div class="single-info">
                        <h4 class="title">Category</h4>
                        <p>{{$portfolio->category->name}}</p>
                    </div>
                </div>
                <div class="description">
                    <p>{!!$portfolio->description!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- Portfolio-Area-End -->

<!-- Quote-Area-Start -->
@section('quote_content')
<h3 class="title">Start Journey Today</h3>
<div class="desc">
    <p>Earum quos animi numquam excepturi eveniet explicabo repellendus rem
        esse.
        Quae quasi
        odio enim.</p>
</div>
<a href="#" class="button-orange mouse-dir">Get Started <span
        class="dir-part"></span></a>
@endsection
<!-- Quote-Area-End -->

