<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeFood;
use App\Http\Requests\StoreTypeFoodPost;

class TypeFoodController extends Controller
{

    public function __construct() {
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $typefood = TypeFood::all();
        $typefood = TypeFood::paginate(3);


        return view('typefood.index', [ 
            'typefoods' => $typefood
         ]);

        // $tf1 = new TypeFood();
        // $tf1->create(['name' => 'แกงจืด']);

        // return 'Add new success';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typefood.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeFoodPost $request)
    {
        $typefoods = new TypeFood();
        $typefoods->name = $request->name;
        $typefoods->save();

        return redirect()->action('TypeFoodController@index');
    }

    //User for learn
    public function insert()
    {
        $tf1 = new TypeFood();
        // $tf1->name = 'แกงจืด';
        // $tf1->save();

        $tf1->create(['name' => 'แกงจืด']);

        return 'Add new success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typefoods = TypeFood::find($id);

        return view('typefood.show', [ 
            'typefoods' => $typefoods 
        ]);

        // $items = TypeFood::where('id', '=', '9')->get();
        // return $items;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typefoods = TypeFood::find($id);
        return view('typefood.edit', [
            'typefoods' => $typefoods
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeFoodPost $request, $id)
    {
        $typefoods = TypeFood::find($id);
        $typefoods->name = $request->name;
        $typefoods->save();

        // $typefoods->update($request->all());
        return redirect()->action('TypeFoodController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //ใช้เพื่อการเรียน delete 
    public function delete($id)
    {
        //$typefood = TypeFood::find($id);
        //$typefood->delete();
        
        TypeFood::destroy($id);
        
        return back();
    }

}
