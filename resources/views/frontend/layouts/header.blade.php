<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simply Delicious</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>
<body style="background-image: url('{{url("frontend/images/2.jpg")}}');">
	<!-- header start -->
	<div class="container-fluid p-2" style="background-image: url('{{url("frontend/images/3.jpg")}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 ">
					<h1 class="text-uppercase p-2">
						<a href="/" class="text-decoration-none text-white fw-lighter"><span class="text-dark display-4">S</span>imply <span class="text-dark display-4">D</span>elicious</a>
					</h1>
				</div>
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
                    @if (!is_null(session()->get('user')))
                        <h5 class="text-end p-3 mt-3 text-uppercase fw-lighter"><a href="/destroysession" class="text-black">Logout</a></h5>
                    @else
                        <h5 class="text-end p-3 mt-3 text-uppercase fw-lighter"><a href="/login" class="text-black">Login</a>/<a href="/signup" class="text-black">SignUp</a></h5>
                    @endif
			    </div>
		    </div>
		</div>
	</div>

    <!-- header end -->
