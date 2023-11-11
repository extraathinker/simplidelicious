                <div class="col-lg-4">
                    @if (!is_null(session()->get('user')))
                        @if (session()->get('user') == 'normal')
                            <div class="border rounded bg-white mb-4">
                                <h3 class=" text-uppercase p-3">Get Featured :</h3>
                                <a href="/suggestrecipe" class="btn btn-primary text-uppercase fw-lighter m-3 form-control" style="max-width:380px;">Suggest Recipes</a>
                            </div>
                        @endif
                    @endif

    				<div class="border rounded bg-white">
    					<h3 class=" text-uppercase p-3">Search :</h3>
    					<form class="d-flex p-3" role="search" method="get" action="/search">
					        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
					        <button class="btn btn-outline-success" type="submit">Search</button>
					    </form>
    			    </div>

    			    <div class="border rounded mt-4 bg-white">
    			    	<h3 class=" text-uppercase p-3">Recent Posts :</h3>

                        @foreach($recent as $recipe)
                            <div class="row p-1 border-bottom">
                                <div class="col-lg-5">
                                    <img src="{{asset('storage/uploads/'.$recipe->image)}}" class="img-fluid object-fit-cover p-2">
                                </div>
                                <div class="col-lg-7">
                                    <h6 class="p-1">{{$recipe->name}}</h6>
                                    <div class="row p-1">
                                        <div class="col-lg-4"><i class="bi bi-tags-fill"></i><span class="m-1">{{$recipe->category}}</span></div>
                                        <div class="col-lg-6"><i class="bi bi-person"></i><span class="m-1">{{$recipe->author}}</span></div>

                                    </div>
                                    <a class="btn btn-primary m-2 float-end">Read More</a>
                                </div>
                            </div>
                        @endforeach

    				</div>

    			</div>
