@extends('frontend.layouts.base')
@section('main-container')
    <div class="container-fluid bg-dark text-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 mt-2"><a href="{{url('/')}}" class="text-white"><i class="bi bi-house"></i></a></div>
				<div class="col-lg-3">
					<p class="p-1 mt-1 d-none">Hi User</p>
				</div>
				<div class="col-lg-6">
					<ul class="nav">
						<li class="nav-item p-2 mx-3 text-uppercase">
                            @foreach ($categories as $category)
                            <a href="/category/{{$category->id}}" class="text-decoration-none text-white p-2">
                            {{$category->name}}
                            </a>
                            @endforeach
                        </li>
					</ul>
				</div>
                <div class="col-lg-2">
                    @if (!is_null(session()->get('user')))
                        @if (session()->get('user') == 'admin')
                            <p class="p-1 mt-1"><a class="text-decoration-none text-white" href="/admin/recipedata"><i class="bi bi-person"></i> Profile</a></p>
                        @endif
                    @endif
                </div>
			</div>
		</div>
	</div>
    <!-- main content -->
    <div class="container-fluid p-2 bg-secondary">
    	<div class="container p-2">
    		<div class="row">
    			<div class="col-lg-8 border rounded bg-white">
                    @foreach ($recipes as $recipe)
                        <h1 class="fw-lighter text-uppercase p-3">{{$recipe->name}}</h1>
                        <div class="row p-3">
                            <div class="col-lg-3 px-2"><i class="bi bi-tags-fill"></i><span class="mx-3">{{$recipe->category}}</span></div>
                            <div class="col-lg-3 px-2"><i class="bi bi-person"></i><span class="mx-3">{{$recipe->author}}</span></div>
                            <div class="col-lg-4 px-2"><i class="bi bi-calendar-day"></i><span class="mx-3">{{$recipe->Date}}</span></div>
                            <div class="col-lg-2 px-2"></div>
                        </div>
                        <p class="p-3 fst-italic">{{$recipe->description}}</p>
                        <img src="{{asset('storage/uploads/'.$recipe->image)}}" class="img-fluid p-3">
                        <div class="row px-3">
                            <div class="col-lg-4">
                                <p>Prep time : <span>{{$recipe->preptime}}</span> </p>
                            </div>
                            <div class="col-lg-4">
                                <p>Cook time : <span>{{$recipe->cooktime}}</span> </p>
                            </div>
                            <div class="col-lg-4">
                                <p>Total time : <span>{{$recipe->cooktime}}</span> </p>
                            </div>
                        </div>
                        <h3 class="px-3">Ingredients :</h3>
                        <p class="px-4 fst-italic">{{$recipe->ingredients}}</p>
                        <h3 class="px-3">Instructions :</h3>
                        <p class="px-4 fw-lighter">{{$recipe->instructions}}</p>
                    @endforeach
                </div>
                @include('frontend.layouts.sidebar')

            </div>
        </div>
    </div>
    <!-- main content end -->
@endsection
