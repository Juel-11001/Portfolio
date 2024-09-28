@extends('frontend.pages.layouts.master-blog')
@section('portfolio_head_title')
Blog Details
@endsection
@section('portfolio_link_head_title')
Blog Details
@endsection
<!-- Portfolio-Area-Start -->
@section('blog_content')
<section class="blog-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="head-title">{{$blog->title}}</h2>
                <div class="blog-meta">
                    <div class="single-meta">
                        <div class="meta-title">Published</div>
                        <h4 class="meta-value">{{date('d M, Y',strtotime($blog->created_at))}}</h4>
                    </div>
                    <div class="single-meta">
                        <div class="meta-title">Category</div>
                        <h4 class="meta-value"><a href="javascript:void(0)">{{$blog->getCategory->name}}</a></h4>
                    </div>
                    {{-- <div class="single-meta">
                        <div class="meta-title">Comments</div>
                        <h4 class="meta-value">258 Comments</h4>
                    </div> --}}
                </div>
                <figure class="image-block">
                    <img src="{{asset($blog->image)}}" class="img-fix" alt="">
                </figure>
                <div class="description">
                    {!! $blog->description !!}
                </div>
                <div class="single-navigation">
                    @if($proviusBlog)
                    <a href="{{route('blog-details', $proviusBlog->id)}}" class="nav-link"><span class="icon"><i
                                class="fal fa-angle-left"></i></span><span class="text">{{$proviusBlog->title}}</span></a>
                    @endif
                    @if ($nextBlog)
                    <a href="{{route('blog-details', $nextBlog->id)}}" class="nav-link"><span class="text">{{$nextBlog->title}}</span><span
                            class="icon"><i class="fal fa-angle-right"></i></span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- <!-- Quote-Area-Start -->
@section('quote_content')
<h3 class="title">Your Journey Today</h3>
<div class="desc">
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate rem
        maiores, neque at officiis laudantium.</p>
</div>
<a href="#" class="button-orange mouse-dir">Get Started <span
        class="dir-part"></span></a>
@endsection
<!-- Quote-Area-End --> --}}

