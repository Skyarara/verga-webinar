<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Http\Requests\StoreWebinarRequest;
use App\Http\Requests\UpdateWebinarRequest;

class WebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebinarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebinarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function show(Webinar $webinar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(Webinar $webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebinarRequest  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebinarRequest $request, Webinar $webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webinar $webinar)
    {
        //
    }
}
