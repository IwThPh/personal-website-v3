<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iwan Phillips - Developer</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,600" rel="stylesheet">
    <link href="{{ asset('css/cv.css') }}" rel="stylesheet">
    <script defer src="{{URL::asset('js/fa/fa.js')}}"></script>
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
            <div class="p-1"></div>
            <div class="m-1">
                <h5>Personal Statement</h5>
                <hr>
                <div class="row">
                    <div class="col">
                        <p class="text-justify">
                            Hard-working software engineer, looking to work on innovative technologies. I am ambitious
                            to implement novel ideas and to take advantage of the opportunity to express creativity in
                            new designs and techniques. I have already taken it upon myself to pro-actively research and
                            learn about multiple development languages and tools. I am currently trying to improve on my
                            skill set to develop my adaptability.</p>
                    </div>
                    <div class="col">
                        <h6 class="text-center">Skills / Technologies</h6>
                        <div class="row m-1 justify-content-center">
                            @foreach ($skills->take(25) as $s)
                            <span class="badge badge-pill badge-secondary m-1">{{ $s->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-1">
                <div class="d-flex justify-content-between align-items-end">
                    <h5>Featured Projects</h5>
                    <div>All projects can be viewed at <a href="https://www.iwanphillips.dev/">iwanphillips.dev</a>
                    </div>
                </div>
                <hr>
                @foreach ($projects as $chunk)
                <div class="row">
                    @foreach ($chunk as $p)
                    <div class="col">
                        <h6 class="text-truncate">{{$p->name}}</h6>
                        <hr>
                        <p>{!!$p->brief!!}</p>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="m-1 mt-2">
                <h5>Education</h5>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6>Software Engineering (BSc) at Swansea University</h6>
                        <span style="font-size: 1em;">Current Performance: First class (1st). (July 13th Final
                            Classification)</span>
                        <div class="mt-4"></div>
                        <h5>Experience</h5>
                        <hr>
                        @foreach ($experience->take(2) as $e)
                        <h6>{{$e->name}}</h6>
                        {{$e->location}}, {{$e->start_at}} to {{$e->end_at ?? "Present"}}
                        <p>{!!$e->desc!!} </p>
                        @endforeach
                    </div>
                    <div class="col">
                        <p><b>Modules undertaken:</b></p>
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
        </div>
    </div>
</body>

</html>
