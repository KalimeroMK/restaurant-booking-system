<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagory;
use Session;

class CatagoryController extends Controller
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
        $catagories = Catagory::all();
        return view('admin.catagory.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catagory.create');
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
            'name'  => 'required'
        ]);

        $slug = str_slug(request('name'));


        Catagory::create([

            'name'  => request('name'),
            'slug'  => $slug

        ]);

        Session::flash('success', 'Catagory successfully created');

        return redirect()->route('catagory.index');


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
        $catagory = Catagory::find($id);
        return view('admin.catagory.edit', compact('catagory'));
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
            'name'  => 'required'
        ]);

        $slug = str_slug(request('name'));

        $catagory = Catagory::find($id);
        $catagory->name = request('name');
        $catagory->slug = $slug;
        $catagory->save();

        Session::flash('success', 'Catagory Successfully Updated');

        return redirect()->route('catagory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catagory = Catagory::find($id);
        $catagory->delete();

        Session::flash('success', 'Catagory Successfully Deleted');

        return redirect()->route('catagory.index');
    }
}
