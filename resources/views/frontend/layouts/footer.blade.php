@php
    $footerinfo= \App\Models\FooterInfo::first();
    $footerIcons= \App\Models\FooterSocial::all();
    $footerUsefulLinks= \App\Models\UsefulLink::all();
    $contactInfo= \App\Models\ContactInfo::first();
    $footerHelpes= \App\Models\FooterHelper::all();
@endphp
<footer class="footer-area">
    <div class="container">
        <div class="row footer-widgets">
            <div class="col-md-12 col-lg-3 widget">
                <div class="text-box">
                    <figure class="footer-logo">
                        <img src="{{asset($generalSetting->footer_logo)}}" alt="">
                    </figure>
                    <p>{{@$footerinfo->info}}</p>
                    <ul class="d-flex flex-wrap">
                        @foreach ($footerIcons as $icon)
                        <li><a href="{{$icon->url}}"><i class="{{$icon->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-2 offset-lg-1 widget">
                <h3 class="widget-title">Useful Link</h3>
                <ul class="nav-menu">
                    @foreach ($footerUsefulLinks as $usefulLink)
                    <li><a href="{{$usefulLink->url}}">{{$usefulLink->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Contact Info</h3>
                <ul>
                    <li>{{$contactInfo->address}}</li>
                    <li><a href="tel:{{$contactInfo->phone}}">{{$contactInfo->phone}}</a></li>
                    <li><a href="mailto:{{$contactInfo->email}}">{{$contactInfo->email}}</a></li>
                </ul>
            </div>
            @if ($footerHelpes->isNotEmpty())
            <div class="col-md-4 col-lg-3 widget">
                <h3 class="widget-title">Help</h3>
                <ul class="nav-menu">
                    @foreach ($footerHelpes as $help)
                    <li><a href="{{$help->url}}">{{$help->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>{{@$footerinfo->copy_right}}</p>
                        <p>{{@$footerinfo->power_by}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
