<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function index()
    {
        $webinar = Webinar::with("category")->where("status", true)->inRandomOrder()->paginate(9);

        $data = [
            "webinar" => $webinar,
        ];

        return view("welcome", $data);
    }
    
}
