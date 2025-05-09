<!--================Header Menu Area =================-->
@php
    $Categories = App\Models\Category::all(); // Fixed namespace declaration issue by using `use` instead of `namespace`
@endphp
<header class="header_area">
    <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand logo_h" href="{{ route('theme.index') }}"><img src="{{ asset('assets') }}/img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
            <li class="nav-item @yield('home-active')"><a class="nav-link" href="{{ route('theme.index') }}">Home</a></li> 
            <li class="nav-item submenu dropdown @yield('category-active')">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false">Categories</a>
                @if($Categories->count() > 0)
                <ul class="dropdown-menu">
                    @foreach($Categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('theme.category', ['id' => $category->id]) }}"> {{ $category->name }} </a> 
                        </li>
                    @endforeach 
                </ul>
                @else
                <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="#">No Category Found</a></li>
                </ul>
                @endif
            </li>
            <li class="nav-item @yield('contact-active')"><a class="nav-link" href="{{ route('theme.contact') }}">Contact</a></li>
            </ul>
            
            <!-- Add new blog -->
            @if(Auth::check())
                <a class="btn btn-sm btn-primary mr-2" href="{{ route('blogs.create') }}">Add New</a> <!-- Fixed Blade syntax -->
            @endif
            <!-- End - Add new blog -->

            <ul class="nav navbar-nav navbar-right navbar-social">
                @if(!Auth::check())
                <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                @else
                <li class="nav-item dropdown submenu">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li class="nav-item"><button type="submit" class="nav-link" style="border: none; background: none;">Logout</button></li>
                        </form>
                    </ul>
                </li>
                @endif
            </ul>
        </div> 
        </div>
    </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
