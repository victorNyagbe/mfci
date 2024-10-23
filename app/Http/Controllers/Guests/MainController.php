<?php

namespace App\Http\Controllers\Guests;

use App\Models\Album;
use App\Models\Annex;
use App\Models\Banner;
use App\Models\Member;
use App\Models\Article;
use App\Models\Content;
use App\Models\Activity;
use App\Models\ContentFile;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Testimony;

class MainController extends Controller
{
    public function welcome(): View
    {
        return view('welcome', [
            'banners' => Banner::all(),
            'members' => Member::take(4)->get(),
            'activities' => Activity::all(),
            'articles' => Article::all(),
            'albums' => Album::all(),
            "content" => Content::first(),
            "aboutFile" => ContentFile::where('content_name', "about-image")->first(),
            'testimony' => Testimony::latest()->first()
        ]);
    }
    public function about(): View
    {
        $content = Content::first();
        return view('about', compact('content'));
    }

    public function donation(): View
    {
        $content = Content::first();
        return view('donation', compact('content'));
    }

    public function annexe(): View
    {
        $annexes = Annex::all();
        return view('annexes', compact('annexes'));
    }

    public function subscribeToNewsletter(Request $request)
    {
        $request->validate([
            "newsletter_email" => "required|email|unique:newsletters,email",
        ], [
            "newsletter_email.required" => "Votre adresse électronique est obligatoire",
            "newsletter_email.email" => "Votre adresse électronique doit être valide",
            "newsletter_email.unique" => "Cette adresse électronique est déjà abonnée",
        ]);

        Newsletter::create([
            "email" => $request->newsletter_email
        ]);

        return redirect()->back()->with('guest:success', "Abonnement éffectué avec succès");
    }

    public function testimonies()
    {
        $testimonies = Testimony::latest()->get();

        return view('testimonies', compact("testimonies"));
    }
}
