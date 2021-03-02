<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $availableDishes = Dish::where('available',true)->orderBy('name','desc')->paginate(12);
        
        return view('dishes.index',['availableDishes'=>$availableDishes]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Dish::class);
        return view('dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->authorize('create', Dish::class);
        $this->validate($request, [
            'name' => 'required',
            'ingredients' => 'required',
            'cover_image' => 'required|image',
            'cost' => 'required',
        ]);

        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('cover_image')->storeAs('cover images', $filenametostore , 'public');
        }
        
        //create dish
        $dish = new Dish;
        $dish->name = $request->name;
        $dish->ingredients = $request->ingredients;
        $dish->cover_image = $filenametostore;
        $dish->cost = $request->cost;
        $dish->save();
        
        return redirect()->route('dishes.index')->with('success','Dish Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        // $dish = Dish::Find($id);
        
        if($dish->isAvailable($dish)){
            return view('dishes.show',['dish'=>$dish]);
        }else{
            if($this->authorize('view', $dish)){
                return view('dishes.show',['dish'=>$dish]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        // $dish = Dish::Find($id);

        // $this->authorize('update',$dish);

        return view('dishes.edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $this->validate($request, [
            'name' => 'required',
            'ingredients' => 'required',
            'cover_image' => 'nullable'
        ]);

        
        //Update dish
        // $dish = Dish::find($id);

        // $this->authorize('update',$dish);

        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('cover_image')->storeAs('cover images', $filenametostore, 's3');
        }

        $dish->name = $request->input('name');
        $dish->ingredients = $request->input('ingredients');  
        
        if($request->hasFile('cover_image')){
            //delete first image
            Storage::disk('public')->delete('cover images/'.$dish->cover_image); 

            $dish->cover_image = $filenametostore;  

        }        
        $dish->save();
        
        return redirect()->route('dishes.show',$dish)->with('success','Dish Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        // $dish = Dish::Find($id);

        // $this->authorize('delete',$dish);

        Storage::disk('public')->delete('cover images/'.$dish->cover_image);
        
        $dish->delete();

        return redirect()->route('dishes.index')->with('success','Dish Deleted');
    }
}
