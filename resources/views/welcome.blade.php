<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iwan Phillips - Developer</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/36b3b9ba0e.js" crossorigin="anonymous"></script>
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
                                <li><a href="#experience" class="mobile-nav-item">experience</a></li>
                            </ul>
            <div class="socials d-flex flex-wrap justify-content-center">
                @foreach ($socials as $s)
                <span class="m-2"><a href="{{$s->ref}}"><i class="{{$s->fa}}"></i>{{$s->name}}</a></span>
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
                <a href="#experience" class="nav-item">experience</a>
                <div class="nav-pointer">
                    <svg height="33" width="22">
                        <polygon points="22,0 22,33 0,17" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="hero-section">
            <div class="hero-container">
                <h2>hi, my name is</h2>
                <h1>Iwan Phillips</h1>
                <h2>i’m a software developer in the UK.</h2>
            </div>
            <div class="hero-social d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($socials as $s)
                <span class="m-4 d-inline-flex"><a href="{{$s->ref}}"><i class="{{$s->fa}}"></i>{{$s->name}}</a></span>
                @endforeach
            </div>
        </div>

        <div class="section about-section">
            <a name="about" class="anchor"></a>
            <h2 class="section-header">about me</h2>
            <div class="section-cont row">
                <div class="col-sm">
                    <p>
                        My name is Iwan Phillips.

                        I’m a 20 year old, software developer based in the UK.
                        I mainly work on Front-end web development, but enjoy exploring the full technology stack.
                    </p>
                </div>
                <div class="col-sm">
                    <div class="img-stack">
                        <div class="clip-border second"></div>
                        <div class="clip-border"><img src="{{URL::asset("images/me.jpg")}}" alt="Me" class="portrait">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="section project-section">
            <a name="projects" class="anchor"></a>
            <h2 class="section-header">projects</h2>
            <projects></projects>
        </div>

        <div class="section experience-section">
            <a name="experience" class="anchor"></a>
            <h2 class="section-header">experience</h2>
            <experiences></experiences>
        </div>

        <div class="section footer-section">
        </div>

    </div>

    <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</body>

</html>