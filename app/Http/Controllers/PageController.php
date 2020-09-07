<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Item;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function mainfun($value='')
    {
        $items=Item::take(6)->orderBy('id','desc')->get();
        $brands=Brand::all();
       $categories=Category::all();
        //dd($items);
     return view('main',compact('items','brands','categories'));
    }
    public function brandfun($id)
    {
        $brand=Brand::find($id);
     return view('brand',compact('brand'));
    }
     public function itemdetailfun($id)
    {
        $items = Item::find($id);
        
     return view('itemdetail',compact('items'));
    }
     public function promotionfun($value='')
    {
       $items = Item::where('discount','>',0)->get(); 
     return view('promotion',compact('items'));
    }
    public function registerfun($value='')
    {
      
     return view('register');
    }
    public function shoppingcartfun($value='')
    {
        
     return view('shoppingcart');
    }
    public function subcategoryfun($id)
    {
       $sub_category = Subcategory::find($id);
    $subcategories = Subcategory::all();  
    return view('subcategory',compact('subcategories','sub_category'));
    }
    public function loginfun($value='')
    {
        
     return view('login');
    }
}
