<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreWebinarRequest;
use App\Http\Requests\UpdateWebinarRequest;

class WebinarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $webinar = Webinar::with("category")->paginate(5);

        return view("webinar.index", ['webinar' => $webinar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view("webinar.add", ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebinarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = $request->status ? true : false;

        $data = [
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->file('image')->store('webinar-image'),
            'date' => $request->date,
            'status' => $status,
            'cp' => $request->cp,
        ];

        Webinar::create($data);

        return redirect()->route('webinar_index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webinar = Webinar::find($id);
        $category = Category::all();
        $data = [
            "category" => $category,
            "webinar" => $webinar
        ];
        return view("webinar.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebinarRequest  $request
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = $request->status ? true : false;
        $webinar = Webinar::find($request->id);
        $data = [
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'status' => $status,
            'cp' => $request->cp
        ];

        if($request->image){
            if(file_exists(public_path("storage/$webinar->image"))){
                Storage::delete($webinar->image);
            }
            $webinar->image = $request->file('image')->store('webinar-image');
        }

        $webinar->update($data);

        return redirect()->route('webinar_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webinar  $webinar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $webinar = Webinar::find($id);

        if(file_exists(public_path("storage/$webinar->image"))){
            Storage::delete($webinar->image);
        }

        $webinar->destroy($webinar->id);

        return redirect()->route('webinar_index');
    }

    public function status($id)
    {
        $webinar = Webinar::find($id);

        $status = $webinar->status ? false : true;

        $webinar->status = $status;
        $webinar->update();

        return redirect()->route('webinar_index');
    }
}
