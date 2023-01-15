<?php

namespace App\Http\Controllers;

use App\Models\User_webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUser_webinarRequest;
use App\Http\Requests\UpdateUser_webinarRequest;

class UserWebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = [
            "webinar" => User_webinar::with("webinar.category")->where("user_id", $id)->get(),
        ];

        return view("user_webinar.index", $data);
    }


    public function store(Request $request)
    {
        $data = [
            "webinar_id" => $request->webinar_id,
            "user_id" => $request->user_id,
        ];

        User_webinar::create($data);

        return redirect()->route("user_webinar");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_webinar  $user_webinar
     * @return \Illuminate\Http\Response
     */
    public function show(User_webinar $user_webinar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_webinar  $user_webinar
     * @return \Illuminate\Http\Response
     */
    public function edit(User_webinar $user_webinar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_webinarRequest  $request
     * @param  \App\Models\User_webinar  $user_webinar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_webinarRequest $request, User_webinar $user_webinar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_webinar  $user_webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_webinar $user_webinar)
    {
        //
    }
}
