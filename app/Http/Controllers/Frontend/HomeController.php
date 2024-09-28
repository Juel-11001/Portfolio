<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Category;
use App\Models\ContactSectionSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSection;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $hero=Hero::first();
        $typerTitles=TyperTitle::all();
        $services=Service::all();
        $about=About::first();
        $portfolioTitle=PortfolioSectionSetting::first();
        $categories=Category::all();
        $portfolioItems=PortfolioItem::all();
        $skill=SkillSectionSetting::first();
        $skillItems=SkillItem::all();
        $experience=Experience::first();
        $feedbackSection=FeedbackSection::first();
        $feedbacks=Feedback::all();
        $blogs=Blog::latest()->take(5)->get();
        $blogSectionSetting=BlogSectionSetting::first();
        $contactSection=ContactSectionSetting::first();
        return view('frontend.home', compact('hero', 'typerTitles','services', 'about', 'portfolioTitle', 'categories', 'portfolioItems', 'skill', 'skillItems', 'experience', 'feedbackSection', 'feedbacks', 'blogs', 'blogSectionSetting','contactSection'));
    }
    public function portfolioDetails($id)
    {
        $portfolio=PortfolioItem::findOrFail($id);
        return view('frontend.pages.portfolio-details', compact('portfolio'));
    }
    public function blogDetails($id)
    {
        $blog=Blog::findOrFail($id);
        $proviusBlog=Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextBlog=Blog::where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('frontend.pages.blog-details', compact('blog', 'proviusBlog', 'nextBlog'));
    }
    public function blogs()
    {
        $blogs=Blog::latest()->paginate(9);
        return view('frontend.pages.blog', compact('blogs'));
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name'=>'required|max:200',
            'email'=>'required|email',
            'subject'=>'required|max:300',
            'message'=>'required|max:2000',
        ]);

        Mail::send(new ContactMail($request->all()));
        return response(['status'=>'success', 'message'=>'Thank you for contacting us. We will get back to you soon.']);
    }
}
