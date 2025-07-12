<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Todo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
            </li> 
            @auth    
            <li class="nav-item">
                <a class="nav-link {{ Request::is('todo*') ? 'active' : '' }}" href="/todo">Lists</a>
            </li>
            @endauth  
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth    
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Hai, {{ auth()->user()->name }}!</a>
                <ul class="dropdown-menu">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                    </form>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-right"></i> Login</a>
            </li>
            @endauth
        </ul>
        </div>
    </div>
</nav>
