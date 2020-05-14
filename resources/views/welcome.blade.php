<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Iwan Phillips - Developer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body >
        <div id="app">

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
            <div class="hero-social">
                social links here.
            </div>
        </div>

        <div class="section about-section">
            <a name="about"></a>
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
            <a name="projects"></a>
            <h2 class="section-header">projects</h2>
        </div>

        <div class="section experience-section">
            <a name="experience"></a>
            <h2 class="section-header">experience</h2>
        </div>

        <div class="section footer-section"></div>
        </div>
     <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
    </body>
</html>
