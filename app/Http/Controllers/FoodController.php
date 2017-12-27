<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\TypeFood;
use App\Http\Requests\StoreFoodPost;
use App\Http\Requests\StoreFoodUpdatePost;
use Image;
use File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('typefood')->orderBy('id')->paginate(2);
        $count = Food::count();

        return view('food.index', [
            'foods' => $foods,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $items = TypeFood::pluck('name','id');
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodPost $request)
    {
        $foods = new Food();
        $foods->name = $request->name;
        $foods->price = $request->price;
        $foods->typefood_id = $request->typefood_id;

        if($request->hasFile('image')) {                       
            $newfilename = str_random(10). '.' . 
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path().'/images/', $newfilename);
            
            // Resize Image
            Image::make(public_path().'/images/'.$newfilename)->resize(50,50)->save(public_path().'/images_resize/'.$newfilename);
            $foods->image = $newfilename;
        }
        
        $foods->save();
        $request->session()->flash('status', 'Add new data success!!');
        return back();
        //return redirect()->action('FoodController@index');
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
        $food = Food::find($id);
        return view('food.edit', [
            'foods' => $food
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFoodUpdatePost $request, $id)
    {
        $food = Food::find($id);
        $food->name = $request->name;
        $food->price = $request->price;
        $food->typefood_id = $request->typefood_id;

        if($request->hasFile('image')) {          
            // Delete old image before update
            if($food->image != 'nopic.jpg') {      
                File::delete(public_path().'\\images\\'.$food->image);
                File::delete(public_path().'\\images_resize\\'.$food->image);
            }

            $newfilename = str_random(10). '.' . 
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path().'/images/', $newfilename);
            
            // Resize Image
            Image::make(public_path().'/images/'.$newfilename)->resize(50,50)->save(public_path().'/images_resize/'.$newfilename);
            $food->image = $newfilename;
        } else {
            $food->image = $food->image;    // Old Immage Name
        }

        $food->save();
        return redirect()->action('FoodController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        if($food->image != 'nopic.jpg') {
            File::delete(public_path().'\\images\\'.$food->image);
            File::delete(public_path().'\\images_resize\\'.$food->image);
        }

        $food->delete();
        return redirect()->action('FoodController@index');
    }

    public function download($id)
    {
        $food = Food::find($id);
        return response()->download(public_path().'/images/'.$food->image);
    }

    public function pdfreport($id)
    {
        $food = Food::all();
        // $pdf = PDF::loadView('food.foodreport', [ 'food' => $food ]);
        // return $pdf->stream();
        PDF::loadView('pdf', $food, [], [
            'format' => 'A5-L'
        ])->save($pdfFilePath);
        //return $food;
        // return 'Welcome to PDFReport on FoodController';
    }

}
