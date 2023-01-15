<?php

namespace App\Http\Controllers;

use App\Models\User_webinar;
use App\Models\Webinar;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(Request $request)
    {


        $category = Category::all();

        if (!Auth::user()->is_admin) {
            $user_webinar = User_webinar::where("user_id", Auth::user()->id)->pluck('webinar_id');
            $webinar = Webinar::with("category")
            ->whereNotIn('id',$user_webinar)
            ->where("status", true)
            ->search($request->search)
            ->category($request->category)
            ->inRandomOrder()
            ->paginate(9);
            $data = [
                "webinar" => $webinar,
                "category" => $category
            ];
        }else{
            $webinar = Webinar::with("category")->where("status", true)
            ->search($request->search)
            ->category($request->category)
            ->inRandomOrder()->paginate(9);
            $data = [
                "webinar" => $webinar,
                "category" => $category,
            ];
        }

        return view("welcome", $data);
    }

    public function show($id)
    {
        $data = Webinar::find($id);
        return view("webinar.detail", ["data" => $data]);
    }
}
