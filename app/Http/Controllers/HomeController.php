<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $recipes = Recipes::paginate(15)->shuffle();
        $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
        $data = compact('recipes','recent','categories');
        return view('frontend.index')->with($data);
    }

    public function search(Request $request){
        $search = $request['search'] ?? "";
        if ($search != ""){
            $categories = Category::all();
            $recipes = Recipes::where('name','LIKE',"%$search%")->get();
            $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
            $data = compact('recipes','recent','categories');
            return view('frontend.searches')->with($data);
        }else{
            return redirect('/');
        }
    }

    public function singlepost(Request $request){
        $recipes = Recipes::where('recipeId','=',$request['id'])->get();
        $categories = Category::all();
        $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
        $data = compact('recipes','recent','categories');
        return view('frontend.singlepost')->with($data);
    }
}
