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

    public function destroy($id)
    {
        User_webinar::destroy($id);

        return redirect()->route("user_webinar");
    }
}
