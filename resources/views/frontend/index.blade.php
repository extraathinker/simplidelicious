@extends('frontend.layouts.base')
@section('main-container')
    <div class="container-fluid bg-dark text-white px-3">
        <div class="container">
			<div class="row">
				<div class="col-lg-1 mt-2"><a href="{{url('/')}}" class="text-white"><i class="bi bi-house"></i></a></div>
                <div class="col-lg-2">
                    @if (!is_null(session()->get('user')))
                        @if (session()->get('user') == 'admin')
                            <p class="p-1 mt-1">Hi Admin</p>
                        @elseif (session()->get('user') == 'normal')
                            <p class="p-1 mt-1">Hi User</p>
                        @endif
                    @else
                        <p class="p-1 mt-1">Guest</p>
                    @endif
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
    <div class="container-fluid p-2">
    	<div class="container p-2">
    		<div class="row">
    			<div class="col-lg-8 border rounded bg-white">
                    @foreach ($recipes as $recipe)
                        <div class="row p-1 border-bottom">
                            <div class="col-lg-4">
                                <img src="{{asset('storage/uploads/'.$recipe->image)}}" class="img-fluid object-fit-cover p-2">
                            </div>
                            <div class="col-lg-8">
                                <h6 class="p-2"><a class="text-dark text-decoration-none fs-4" href="/single/{{$recipe->recipeId}}">{{$recipe->name}}</a></h6>
                                <div class="row p-2">
                                    <div class="col-lg-4"><i class="bi bi-tags-fill"></i><span class="m-1">{{$recipe->category}}</span></div>
                                    <div class="col-lg-4"><i class="bi bi-person"></i><span class="m-1">{{$recipe->author}}</span></div>
                                    <div class="col-lg-4"><i class="bi bi-calendar-day"></i><span class="m-1">{{$recipe->Date}}</span></div>
                                </div>
                                <p class="text-truncate p-2">{{$recipe->description}}</p>
                            </div>
                        </div>
                    @endforeach

    				<nav>
					    <ul class="pagination justify-content-center p-3">
					        <li class="page-item">
					            <a class="page-link" href="#" aria-label="Previous">
					                <span aria-hidden="true">&laquo;</span>
					            </a>
					        </li>
						    <li class="page-item"><a class="page-link" href="#">1</a></li>
						    <li class="page-item"><a class="page-link" href="#">2</a></li>
						    <li class="page-item"><a class="page-link" href="#">3</a></li>
						    <li class="page-item">
					            <a class="page-link" href="#" aria-label="Next">
					                <span aria-hidden="true">&raquo;</span>
					            </a>
					        </li>
					    </ul>
					</nav>

    			</div>

    			@include('frontend.layouts.sidebar')

    		</div>
    	</div>
    </div>

    <!-- main content end -->
@endsection
