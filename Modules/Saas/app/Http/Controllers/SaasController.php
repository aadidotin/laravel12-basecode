<?php

namespace Modules\Saas\Http\Controllers;

use Modules\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Saas::Dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Saas::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('Saas::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('Saas::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}
