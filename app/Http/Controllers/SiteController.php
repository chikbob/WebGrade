<?php

namespace App\Http\Controllers;

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
            'user' => $user
        ]);
    }
}
