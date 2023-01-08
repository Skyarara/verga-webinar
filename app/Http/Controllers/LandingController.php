<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $webinar = Webinar::with("category")->where("status", true)
        ->search($request->search)
        ->category($request->category)
        ->inRandomOrder()->paginate(9);

        $category = Category::all();

        $data = [
            "webinar" => $webinar,
            "category" => $category,
        ];

        return view("welcome", $data);
    }

    public function show($id)
    {
        $data = Webinar::find($id);
        return view("webinar.detail", ["data" => $data]);
    }
}
