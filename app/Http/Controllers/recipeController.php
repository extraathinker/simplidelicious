<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\approval;
use App\Models\Recipes;
use App\Models\Category;

class recipeController extends Controller
{
    public function newrecipe(){
        $categories = Category::all();
        $data = compact('categories');
        return view('frontend.admin.newRecipe')->with($data);
    }

    public function suggestrecipe(){
        $categories = Category::all();
        $data = compact('categories');
        return view('frontend.user.suggest')->with($data);
    }

    public function newcategory(){
        return view('frontend.admin.newcategory');
    }

    public function storeForApproval(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'category' => 'required',
                'ingredients' => 'required',
                'instructions' => 'required',
            ]
        );
        $recipe = new approval();
        $recipe->name = $request['name'];
        if (!is_null(session()->get('username'))){
            $recipe->author = session()->get('username');
        }else{
            $recipe->author = 'error';
        }
        $recipe->description = $request['description'];
        $recipe->category = $request['category'];
        if (!is_null(Category::where('name','=',$request['category'])->get())){
            $category = Category::where('name','=',$request['category'])->get();
            foreach ($category as $c){
                $c->numberofposts += 1;
                $c->update();
            };
        }
        $recipe->preptime = $request['preptime'];
        $recipe->cooktime = $request['cooktime'];
        $recipe->ingredients = $request['ingredients'];
        $recipe->instructions = $request['instructions'];
        $recipe->Date = date('d-m-y');
        $filename = time() ."-img.". $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/uploads',$filename);
        $recipe->image = $filename;
        $recipe->save();

        return view('frontend.user.thankyou');
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'category' => 'required',
                'ingredients' => 'required',
                'instructions' => 'required',
            ]
        );
        $recipe = new Recipes();
        $recipe->name = $request['name'];
        $recipe->author = session()->get('username');
        $recipe->description = $request['description'];
        $recipe->category = $request['category'];
        if (!is_null(Category::where('name','=',$request['category'])->get())){
            $category = Category::where('name','=',$request['category'])->get();
            foreach ($category as $c){
                $c->numberofposts += 1;
                $c->update();
            };
        }
        $recipe->preptime = $request['preptime'];
        $recipe->cooktime = $request['cooktime'];
        $recipe->ingredients = $request['ingredients'];
        $recipe->instructions = $request['instructions'];
        $recipe->Date = date('d-m-y');
        $filename = time() ."-img.". $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/uploads',$filename);
        $recipe->image = $filename;
        $recipe->save();
        $recipes = Recipes::all();
        $data = compact('recipes');
        return view('frontend.admin.recipedata')->with($data);
    }

    public function storecategory(Request $request){
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $category = new Category();
        $category->name = $request['name'];
        if (!Category::where("category","=",$request['name'])){
            $category->numberofposts = 0;
        }else{
            $category->numberofposts = Recipes::where("category","=",$request['name'])->count();
        }
        $category->save();
        $categories = Category::all();
        $data = compact('categories');

        return view('frontend.admin.categorydata')->with($data);

    }

    public function recipedata() {
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $recipes = Recipes::all();
                $data = compact('recipes');
                return view('frontend.admin.recipedata')->with($data);
            }else{
                return redirect('/');
            }
        }

    }

    public function approvaldata() {
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $recipes = approval::all();
                $data = compact('recipes');
                return view('frontend.admin.approvaldata')->with($data);
            }else{
                return redirect('/');
            }
        }
    }

    public function categorydata() {
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $categories = Category::all();
                $data = compact('categories');
                return view('frontend.admin.categorydata')->with($data);
            }else{
                return redirect('/');
            }
        }
    }

    public function deleterecipe($id) {
        $recipe = Recipes::find($id);
        if (!is_null(Category::where('name','=',$recipe->category)->get())){
            $category = Category::where('name','=',$recipe->category)->get();
            foreach ($category as $c){
                $c->numberofposts -= 1;
                $c->update();
            };
        }
        $recipe->delete();
        return redirect('/admin/recipedata');
    }

    public function deletecategory($id) {
        Category::find($id)->delete();
        return redirect('admin/categorydata');
    }

    public function deleteapproval($id) {
        approval::find($id)->delete();
        return redirect('admin/approvaldata');
    }

    public function approve($id) {
        $approval = approval::find($id);
        $approval->approvedstatus = 1;
        $approval->update();
        $recipe = new Recipes();
        $recipe->name = $approval->name;
        $recipe->author = $approval->author;
        $recipe->description = $approval->description;
        $recipe->category = $approval->category;
        $recipe->preptime = $approval->preptime;
        $recipe->cooktime = $approval->cooktime;
        $recipe->ingredients = $approval->ingredients;
        $recipe->instructions = $approval->instructions;
        $recipe->Date = $approval->Date;
        $recipe->save();
        return redirect('/admin/approvaldata');
    }

    public function disapprove($id) {
        $approval = approval::find($id);
        $approval->approvedstatus = 0;
        $approval->update();
        $recipee = Recipes::where("author","=",$approval->author)->where("Date","=",$approval->Date)->get();
        foreach($recipee as $recipe){
            $recipe->delete();
        };
        return redirect('/admin/approvaldata');
    }

    public function searchrecipe(Request $request){
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $search = $request['search'] ?? "";
                $category = $request['bycategory'] ?? "";
                if ($search != ""){
                    if ($category != ""){
                        if ($category == "name"){
                            $recipes = Recipes::where('name','LIKE',"%$search%")->get();
                        }elseif($category == "description"){
                            $recipes = Recipes::where('description','LIKE',"%$search%")->get();
                        }elseif($category == "category"){
                            $recipes = Recipes::where('category','LIKE',"%$search%")->get();
                        }elseif($category == "preptime"){
                            $recipes = Recipes::where('preptime','LIKE',"%$search%")->get();
                        }elseif($category == "cooktime"){
                            $recipes = Recipes::where('cooktime','LIKE',"%$search%")->get();
                        }elseif($category == "ingredients"){
                            $recipes = Recipes::where('ingredients','LIKE',"%$search%")->get();
                        }elseif($category == "instructions"){
                            $recipes = Recipes::where('instructions','LIKE',"%$search%")->get();
                        }
                    }else{
                        $recipes = Recipes::where('name','LIKE',"%$search%")->get();
                    }
                }else{
                    $recipes = Recipes::all();
                }
                $data = compact('recipes');
                return view('frontend.admin.recipedata')->with($data);
            }
        }
    }

    public function searchapproval(Request $request){
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $search = $request['search'] ?? "";
                $category = $request['bycategory'] ?? "";
                if ($search != ""){
                    if ($category != ""){
                        if ($category == "name"){
                            $recipes = approval::where('name','LIKE',"%$search%")->get();
                        }elseif($category == "description"){
                            $recipes = approval::where('description','LIKE',"%$search%")->get();
                        }elseif($category == "category"){
                            $recipes = approval::where('category','LIKE',"%$search%")->get();
                        }elseif($category == "preptime"){
                            $recipes = approval::where('preptime','LIKE',"%$search%")->get();
                        }elseif($category == "cooktime"){
                            $recipes = approval::where('cooktime','LIKE',"%$search%")->get();
                        }elseif($category == "ingredients"){
                            $recipes = approval::where('ingredients','LIKE',"%$search%")->get();
                        }elseif($category == "instructions"){
                            $recipes = approval::where('instructions','LIKE',"%$search%")->get();
                        }
                    }else{
                        $recipes = approval::where('name','LIKE',"%$search%")->get();
                    }
                }else{
                    $recipes = approval::all();
                }
                $data = compact('recipes');
                return view('frontend.admin.approvaldata')->with($data);
            }
        }
    }

    public function searchcategory(Request $request){
        if (!is_null(session()->get('user'))){
            if (session()->get('user') == 'admin'){
                $search = $request['search'] ?? "";
                if ($search != ""){
                    $categories = Category::where('name','LIKE',"%$search%")->get();
                }else{
                    $categories = Category::all();
                }
                $data = compact('categories');
                return view('frontend.admin.categorydata')->with($data);
            }
        }
    }

    public function editrecipe(Request $request){
        $recipes = Recipes::where('recipeId','=',$request['id'])->get();
        $categories = Category::all();
        $data = compact('recipes','categories');
        return view('frontend.admin.editrecipe')->with($data);
    }

    public function updaterecipe($id,Request $request) {
        $recipee = Recipes::find($id);
        $recipee->name = $request['name'];
        $recipee->description = $request['description'];
        $recipee->category = $request['category'];
        $recipee->preptime = $request['preptime'];
        $recipee->cooktime = $request['cooktime'];
        $recipee->ingredients = $request['ingredients'];
        $recipee->instructions = $request['instructions'];
        if (!is_null($request->image)){
            $recipee->image = $request['image'];
        }
        $recipee->update();
        return redirect('/admin/recipedata');
    }

    public function foodcategory(Request $request){
        $category = Category::where('id','=',$request['id'])->get()->toArray()[0];
        $recipes = Recipes::where('category','=',$category['name'])->get();
        $categories = Category::all();
        $recent = Recipes::orderBy('recipeId','DESC')->take(5)->get();
        $data = compact('recipes','categories','recent');
        return view('frontend.searches')->with($data);
    }
}
