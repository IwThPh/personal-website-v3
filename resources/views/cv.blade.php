<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Iwan Phillips - Developer</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,600" rel="stylesheet">
	<link href="{{ asset('css/cv.css') }}" rel="stylesheet">
	<script defer src="{{ asset('js/fa/fa.js')}}"></script>
</head>

<body>
	<div class="page">
		<div class="subpage">
			<div class="heading row px-2">
				<div class="flex-column p-4 bg-primary rounded align-items-center">
					<h1 class="display-3">Iwan Phillips</h1>
					<h2>Software Developer</h2>
				</div>
				<div class="d-flex flex-grow-1 flex-column justify-content-center">
					@foreach ($socials as $s)
					<span class="ml-2 h6 text-right"><a href="{{$s->ref}}">
							{{$s->name}} <i class="{{$s->fa}}"></i></a></span>
					@endforeach
				</div>
			</div>
			<div class="m-1 mt-5">
				<div class="d-flex justify-content-between">
					<h5>Personal Statement</h5>
					<h5>Skills / Technologies</h5>
				</div>
				<hr />
				<div class="row">
					<div class="col">
						<p class="text-left">
							Hard-working software developer, with a passion for working on novel projects
							while exploring the unique problems yet to be solved. Ambitious to continue growing, learning,
							and sharing my passion for upcoming technologies in the field. Confident to push the brief
							to implement novel ideas, exploring new angles to provide a better user experience.
							Taking a pro-active stance on researching and learning about multiple development languages and
							tools in order to gain a wider understanding. Aspirations on developing my skill set to
							become an established software architect.
						</p>
					</div>
					<div class="col d-flex align-items-center">
						<div class="d-flex justify-content-end align-items-center flex-wrap">
							@foreach ($skills as $s)
							<span class="badge badge-pill badge-secondary m-1 p-2 text-white">{{ $s->name }}</span>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="subpage">
			<div class="m-1 ">
				<div class="d-flex justify-content-between align-items-end">
					<h5>Notable Projects</h5>
				</div>
				<hr>
				@foreach ($projects as $chunk)
				<div class="row">
					@foreach ($chunk as $p)
					<div class="col mt-3">
						<h6 class="text-truncate">{{$p->name}}</h6>
						<hr>
						<p>{!!$p->brief!!}</p>
					</div>
					@endforeach
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="page">
		<div class="subpage">
			<div class="m-1">
				<h5>Experience</h5>
				<hr>
				@foreach ($experience->take(2) as $e)
				<h6>{{$e->name}}</h6>
				{{$e->location}}, {{$e->start_at}} to {{$e->end_at ?? "Present"}}
				<p>{!!$e->desc!!} </p>
				@endforeach
			</div>
		</div>
		<div class="subpage">
			<div class="m-1 ">
				<h5>Education</h5>
				<hr />
				<h6 class="mt-3">Software Engineering (BSc) at Swansea University </h6>
				<span>Graduated: First class (1st) with Honours.</span>
				<p class="mt-3 font-weight-bold">
					Modules undertaken:
				</p>
				<table class="table">
					<tbody>
						<tr>
							<td scope="row">Year 1</td>
							<td>
								<p>
									Programming 1 & 2, Professional Issues 1 & 2, Concepts of Computer Science 1
									& 2, Modelling Computing Systems 1 & 2.
								</p>
							</td>
						</tr>
						<tr>
							<td scope="row">Year 2</td>
							<td>
								<p>
									Declarative Programming, Concurrency, Software Engineering 1 & 2, Database
									Systems, Web Services, Computer Graphics, Algorithms.
								</p>
							</td>
						</tr>
						<tr>
							<td scope="row">Year 3</td>
							<td>
								<p>
									Software Testing, Software Management, Writing Mobile Apps, Web Application
									Development, User Experience, and Advanced Object Oriented Programming.
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>
