<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iwan Phillips - Developer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="{{URL::asset('js/fa/fa.js')}}"></script>
    <script>
        window.Laravel = { csrfToken:'{{ csrf_token() }}' }
    </script>
</head>

<body>
    <div id="app">
        <div class="mobilenav-cont">
            <div class="mobilenav">
                <div class="hamburger-cont">
                </div>
            </div>
            <div class="menu-wrap">
                <input type="checkbox" class="toggler" id="toggler">
                <div class="hamburger">
                    <div></div>
                </div>
                <div class="menu">
                    <div>
                        <div>
                            <ul>
                                <li><a href="#about" class="mobile-nav-item">about me</a></li>
                                <li><a href="#projects" class="mobile-nav-item">projects</a></li>
                                <li><a href="#education" class="mobile-nav-item">education</a></li>
                                <li><a href="#experience" class="mobile-nav-item">experience</a></li>
                            </ul>
                            <div class="socials d-flex flex-wrap justify-content-center">
                                @foreach ($socials as $s)
                                <span class="m-2"><a href="{{$s->ref}}"><i class="{{$s->fa}}"></i>
                                        {{$s->name}}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidenav">
            <div class="links">
                <a href="#about" class="nav-item">about me</a>
                <a href="#projects" class="nav-item">projects</a>
                <a href="#education" class="nav-item">education</a>
                <a href="#experience" class="nav-item">experience</a>
                <div class="nav-pointer">
                    <svg height="33" width="22">
                        <polygon points="22,0 22,33 0,17" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="hero-section shadow">
            <div class="hero-opacity">

            <div class="hero-container">
                <h2>Hi, my name is</h2>
                <h1>Iwan Phillips</h1>
                <h2>I’m a software developer in the UK.</h2>
            </div>
            <div class="hero-social d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($socials as $s)
                <span class="m-4 d-inline-flex"><a href="{{$s->ref}}"><i class="{{$s->fa}}"></i> {{$s->name}}</a></span>
                @endforeach
            </div>
            <div class="hero-cta m-1 justify-content-center">
                <a href="/cv">
                    <div class="btn btn-primary m-1">View Résumé</div>
                </a>
            </div>
            </div>
        </div>

        <div class="section about-section shadow">
            <a name="about" class="anchor"></a>
            <h2 class="section-header">about me</h2>
            <div class="section-cont row">
                <div class="col-sm m-1">
                    <div class="img-stack">
                        <div class="clip-border second"></div>
                        <div class="clip-border"><img src="{{URL::asset("images/me.webp")}}" width="190" height="190"
                                alt="Me" class="portrait">
                        </div>
                    </div>
                </div>
                <div class="col-sm m-1 my-3">
                    <p>
                        My name is Iwan Phillips.

                        I am a 21 year old, software developer based in the UK.
                        I enjoy working on projects involving a complete technology stack.
                        Take a look at my past projects below.
                    </p>
                    <p class="d-none d-sm-inline">
                        Aside from programming, I'm an avid snowboarder and try to get on the mountain as much as I can.
                    </p>
                </div>
            </div>
            <div class="my-4 mx-sm-5">
                <h5 class="text-center">my skills</h5>
                <div class="row m-1 justify-content-center">
                    @foreach ($skills as $s)
                    <span class="badge badge-pill badge-secondary p-2 m-1">{{ $s->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="my-4 mx-sm-5">
                <div class="row m-1 justify-content-center">
                    <a href="/cv">
                        <div class="btn btn-primary m-1">View Résumé</div>
                    </a>
                </div>
            </div>
        </div>

        <div class="section project-section shadow">
            <a name="projects" class="anchor"></a>
            <h2 class="section-header">projects</h2>
            <projects></projects>
        </div>

        <div class="section education-section shadow">
            <a name="education" class="anchor"></a>
            <h2 class="section-header">education</h2>
            <div class="section-cont p-4">

                <h4>Software Engineering (BSc) at Swansea University</h4>
                <h5>Final Classification: First class (1st)</h5>
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

        <div class="section experience-section shadow">
            <a name="experience" class="anchor"></a>
            <h2 class="section-header">experience</h2>
            <experiences></experiences>
        </div>

        <div class="section footer-section">
            <div class="section-cont">
                <div class="d-flex flex-wrap">
                    <div class="flex-column flex-shrink-1">
                        <h4>Iwan Phillips</h4>
                        <h5>Software Developer</h5>
                        <hr>
                        @foreach ($socials as $s)
                        <span class="d-flex flex-row m-2"><a href="{{$s->ref}}"><i class="{{$s->fa}}"></i>
                                {{$s->name}}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</body>

</html>
