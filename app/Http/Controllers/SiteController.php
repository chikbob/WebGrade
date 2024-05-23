<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = Auth::user();
        return Inertia::render('index', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }

    public function login()
    {
        $user = Auth::user();
        return Inertia::render('login', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }

    public function register()
    {
        $user = Auth::user();
        return Inertia::render('register', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }

    public function help()
    {
        $user = Auth::user();
        return Inertia::render('help', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }

    public function about()
    {
        $user = Auth::user();
        return Inertia::render('about', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }

    public function contacts()
    {
        $user = Auth::user();
        return Inertia::render('contacts', [
            'sites' => Site::all(),
            'user' => $user,
            'review' => Review::all()
        ]);
    }
}
