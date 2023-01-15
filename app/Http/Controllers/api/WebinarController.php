<?php

namespace App\Http\Controllers\api;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebinarController extends Controller
{
    public function index()
    {
        $data = Webinar::all();
        return response()->json([$data], 200);
    }
}
