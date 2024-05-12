<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SiteController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('index', [
            'sites' => Site::all()
        ]);
    }
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Site $site)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Site $site)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, Site $site)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Site $site)
//    {
//        //
//    }
}
