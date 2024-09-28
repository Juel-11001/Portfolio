@extends('frontend.pages.layouts.master-blog')
@section('portfolio_head_title')
    Blog
@endsection
@section('portfolio_link_head_title')
    Blog
@endsection
<!-- Portfolio-Area-Start -->
@section('blog_content')
<section class="blog-area section-padding">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-md-6">
                <div class="single-blog text-center">
                    <figure class="blog-image ">
                        <img src="{{asset($blog->image)}}" alt="">
                    </figure>
                    <div class="blog-content">
                        <h3 class="title"><a href="{{route('blog-details', $blog->id)}}">{{$blog->title}}</a></h3>
                        <div class="desc">
                            <p>{!!$blog->description!!}</p>
                        </div>
                        <a href="{{route('blog-details', $blog->id)}}" class="button-primary-trans mouse-dir">Read More <span
                                class="dir-part"></span> <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">

                <nav class="navigation pagination">
                    <div class="nav-links d-flex justify-content-center">
                        {{$blogs->links()}}
                    </div>
                </nav>
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

