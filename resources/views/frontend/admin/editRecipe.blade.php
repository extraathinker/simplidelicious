@extends('frontend.layouts.base')
@section('main-container')

<div class="container-fluid mb-3">
    <div class="container">
        <div class="bg-warning-subtle" style="max-width: 700px; margin:auto;">
            <h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">Edit Recipe</h1>
        </div>
        <form class="form-group p-4 bg-warning-subtle" style="max-width:700px; margin:auto;" method="post" action="/admin/updaterecipe" enctype="multipart/form-data">
            @csrf
            <label class="form-label">Title of the Recipe</label>
            <input type="text" name="name" class="form-control" value="{{$recipe->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control">{{$recipe->description}}</textarea>
            <span class="text-danger">
                @error('description')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Category :</label>
            <select name="category" class="form-select">
                <option disabled selected class="form-control">Select category</option>
                @foreach ($categories as $category)
                    <option class="form-control">{{$category->name}}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('category')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Prep Time :</label>
            <input type="text" name="preptime" class="form-control" value="{{$recipe->preptime}}">

            <label class="form-label">Cook Time :</label>
            <input type="text" name="cooktime" class="form-control" value="{{$recipe->cooktime}}">

            <label class="form-label">Ingredients :</label>
            <textarea name="ingredients" class="form-control"></textarea>
            <span class="text-danger">
                @error('ingredients')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Instructions :</label>
            <textarea class="form-control" name="instructions">{{$recipe->instructions}}</textarea>
            <span class="text-danger">
                @error('instructions')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Image :</label>
            <input type="file" class="form-control" name="image">

            <input type="submit" class="form-control my-4 text-uppercase fw-bold">
        </form>
    </div>
</div>

@endsection
