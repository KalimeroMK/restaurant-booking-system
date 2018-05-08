<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slide;
use Session;

class SlidesController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except('');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();

        return view('admin.slide.index')->withSlides($slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title'     => 'required',
            'sub_title' => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png' 

        ]);

        $image = $request->image;
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currDare = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currDare.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('upload/slides')) {
                mkdir('upload/slides', 0777, true);
            }

            $image->move('upload/slides', $imageName);
        }else{
            $imageName = 'defaut.jpg';
        }

        Slide::create([

            'title'     => request('title'),
            'sub_title' => request('sub_title'),
            'image'     => $imageName
        ]);

        //setsession
        Session::flash('success', 'Slide Successfully Created !');

        return redirect()->route('slide.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit')->withSlide($slide);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title'     => 'required',
            'sub_title' => 'required',
            'image'     => 'mimes:jpeg,jpg,png' 

        ]); 

        $slide = Slide::find($id);
        $newImage = $request->image;


        if (isset($newImage)) {

            if (file_exists('upload/slides/'. $slide->image)) {
                unlink('upload/slides/'. $slide->image);
            }

            $newImage = $request->image;
            $slug = str_slug($request->title);
            $currDare = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currDare.'-'.uniqid().'.'.$newImage->getClientOriginalExtension();
            if (!file_exists('upload/slides')) {
                mkdir('upload/slides', 0777, true);
            }

            $newImage->move('upload/slides', $imageName);
        }else{
            $imageName = $slide->image;
        }
       

        $slide->title      = request('title');
        $slide->sub_title  = request('sub_title');
        $slide->image      = $imageName;
        $slide->save();

        //setsession
        Session::flash('success', 'Slide Successfully Updated !');

        return redirect()->route('slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        if (file_exists('upload/slides/'. $slide->image)) {
            unlink('upload/slides'.$slide->image);
        }
        $slide->delete();
        Session::flash('success', 'Slide Successfully Deleted');
        return redirect()->route('slide.index');
    }
}
