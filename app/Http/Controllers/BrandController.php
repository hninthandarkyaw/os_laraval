<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Item;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $brands = Brand::all();
       // dd($items);
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands =Brand::all();
        $subcategories =Subcategory::all();
        return view('backend.brands.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            "name" => 'required',
            "photo" => 'required'
             ]);
          $imageName = time().'.'.$request->
        photo->extension();
        $request->photo->move(public_path('backend/image'),$imageName);
        $path = 'backend/image/'.$imageName;
        //data insert
        $brand = new brand;
       // $brand->codeno = $request->codeno;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
         //redirect
           return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.brands.detail',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
          $brands =Brand::all();
       // $subcategories =Subcategory::all();
        return view('backend.brands.edit',compact('brands','brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
         $request->validate([
            
            "name" => 'required',
            "photo" => 'sometimes',
            "oldphoto" => 'required',
             ]);
          //if include file,uplode file
         if($request->hasFile('photo')){
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('backend/image'),$imageName);
            $path='backend/image/'.$imageName;

         }else{
            $path = $request->oldphoto;
         }
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
        //Data insert
        //redirect
         return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink($brand->photo);
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
