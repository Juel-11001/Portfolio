<section class="portfolio-area section-padding-top" id="portfolio-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{$portfolioTitle->title}}</h3>
                    <div class="desc">
                        <p>{{$portfolioTitle->sub_title}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="filter-menu">
                    <li class="active" data-filter="*">All Projects</li>
                    @foreach ($categories as $category)
                    <li data-filter=".{{$category->slug}}">{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="portfolio-wrapper">
            <div class="row portfolios">
                @foreach ($portfolioItems as $item)
                <div data-wow-delay="0.3s" class="col-md-6 col-lg-4 filter-item branding {{$item->category->slug}}">
                    <div class="single-portfolio">
                        <figure class="portfolio-image">
                            <img src="{{asset($item->image)}}" alt="">
                        </figure>
                        <div class="portfolio-content">
                            <a href="{{asset($item->image)}}" data-lity class="icon"><i
                                    class="fas fa-plus"></i></a>
                            <h4 class="title"><a href="{{route('portfolio-details', $item->id)}}">{{Str::limit($item->title, 13)}}</a></h4>
                            <div class="desc">
                                <p>{!!strip_tags(Str::limit($item->description, 46, '...'))!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
