<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = Request::input('search');
        $site = Site::where('url', $searchQuery)->first();
        $user = Auth::user();

        if ($site) {
            $reviews = Review::where('site_id', $site->id)->orderBy('created_at', 'desc')->get();
            redirect('/review');
            return Inertia::render('review', [
                'search' => $site,
                'user' => $user,
                'review' => $reviews,
                'all_users' => User::all(),
                'site' => Site::all()
            ]);
        } else {
            return Inertia::render('index', [
                'sites' => Site::all(),
                'review' => Review::all(),
                'search' => 'none',
                'user' => $user
            ]);
        }
    }

    public function store(\Illuminate\Http\Request $request)
    {
        Review::create([
            'site_id' => $request->site_id,
            'user_id' => $request->user_id,
            'grade' => $request->grade,
            'text' => $request->text,
        ]);

        $url = $request->url;
        $site = Site::where('url', $url)->first();
        $reviews = Review::where('site_id', $site->id)->orderBy('created_at', 'desc')->get();

        $user = $request->user();

        redirect('/');

        return redirect("/search?search={$url}")->with([
            'search' => $site,
            'user' => $user,
            'review' => $reviews,
            'all_users' => User::all(),
            'all_review' => Review::all(),
        ]);
    }
}
