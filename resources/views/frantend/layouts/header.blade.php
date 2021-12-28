<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Articles !</div>
        <div class="masthead-heading text-uppercase">it's time to Reading</div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('post.index')}}"><img src='' alt="..." /></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @if(auth()->user())
                <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">New &#x1F4D6;</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Welcome ,&#x1F60A;{{ auth()->user()->name}}</a></li>
                <li class=" nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{route('post.create')}}" class=" dropdown-item input1">Create Blog &#x270D;</a>
                        <a class="dropdown-item input1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ route('login') }}" class="input1">Log in</a>
                            <a href="{{ route('register') }}" class="input1">Register</a>
                        </div>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
