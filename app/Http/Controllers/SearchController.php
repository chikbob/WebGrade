<?php

namespace App\Http\Controllers;

use App\Models\Site;
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
            // Если сайт найден, возвращаем информацию о нем
            return Inertia::render('index', [
                'search' => $site,
                'sites' => Site::all(),
                'user' => $user
            ]);
        } else {
            return Inertia::render('index', [
                'sites' => Site::all(),
                'search' => 'none',
                'user' => $user
            ]);
        }
    }
}