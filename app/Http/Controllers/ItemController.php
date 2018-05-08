<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Catagory;
use Carbon\Carbon;
use Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();

        return view('admin.item.create', compact('catagories'));
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
            'catagory'  => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png',
            'price'     => 'required',
        ]);

        $image  = $request->image;
       
        if (isset($image)) {
            $slug       = str_slug($image);
            $currDate   = Carbon::now()->toDateString();
            $imgname    = $slug.'-'.$currDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('upload/items')) {
                mkdir('upload/items', 0777, true);
            }
            $image->move('upload/items', $imgname);

            }else{

                $imgname = 'defaut.jpg';

            }

            Item::create([
                'title'         => request('title'),
                'sub_title'     => request('sub_title'),
                'catagory_id'   => request('catagory'),
                'price'         => request('price'),
                'image'         => $imgname

            ]);

            Session::flash('success', 'Item Successfully Created');

            return redirect()->route('item.index');


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
        $item       = Item::find($id);
        $catagories   = Catagory::all();
        return view('admin.item.edit', compact('item', 'catagories'));
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
            'catagory'  => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png',
            'price'     => 'required',
        ]);

        $item = Item::find($id);
        $newImage  = $request->image;
       
        if (isset($newImage)) {

            if (file_exists('upload/items/'.$item->image)) {
                unlink('upload/items/'.$item->image);
            }

            $slug       = str_slug($newImage);
            $currDate   = Carbon::now()->toDateString();
            $imgname    = $slug.'-'.$currDate.'-'.uniqid().'.'.$newImage->getClientOriginalExtension();
            if (!file_exists('upload/items')) {
                mkdir('upload/items', 0777, true);
            }
            $newImage->move('upload/items', $imgname);

            }else{

                $imgname = $item->image;

            }

            $item->title        = request('title');
            $item->sub_title    = request('sub_title');
            $item->catagory_id  = request('catagory');
            $item->price        = request('price');
            $item->image        = $imgname;
            $item->save();


            Session::flash('success', 'Item Successfully Created');

            return redirect()->route('item.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (file_exists('upload/items/'. $item->image)) {
            unlink('upload/items/'.$item->image);
        }
        $item->delete();
        Session::flash('success', 'Item successfully Deleted');
        return redirect()->route('item.index');

    }
}
