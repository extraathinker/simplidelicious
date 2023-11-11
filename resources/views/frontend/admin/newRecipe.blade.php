@extends('frontend.layouts.base')
@section('main-container')

<div class="container-fluid mb-3">
    <div class="container">
        <div class="bg-warning-subtle" style="max-width: 700px; margin:auto;">
            <h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">Enter Recipe</h1>
        </div>
        <form class="form-group p-4 bg-warning-subtle" style="max-width:700px; margin:auto;" method="post" action="/storerecipe" enctype="multipart/form-data">
            @csrf
            <x-inputform label="Title of the recipe :" name="name" type="text"/>
            <span class="text-danger">
                @error('name')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Description :</label>
            <textarea name="description" class="form-control"></textarea>
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

            <x-inputform label="prep time :" name="preptime" type="text"/>

            <x-inputform label="cook time :" name="cooktime" type="text"/>

            <label class="form-label">Ingredients :</label>
            <textarea name="ingredients" class="form-control"></textarea>
            <span class="text-danger">
                @error('ingredients')
                    {{$message}}.<br>
                @enderror
            </span>

            <label class="form-label">Instructions :</label>
            <textarea class="form-control" name="instructions"></textarea>
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
