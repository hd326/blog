<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Laravel Blog</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : ""}}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('blog') ? "active" : ""}}"><a href="/blog">Blog</a></li>
                <li class="{{ Request::is('about') ? "active" : ""}}"><a href="/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active" : ""}}"><a href="/contact">Contact</a></li>
                {{-- <li class="{{ Request::is('posts' || 'posts/*') ? 'active' : "" }}"></li> --}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        <li><a href="{{ route('tags.index') }}">Tags</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @else

                <li><a href="{{ route('login') }}">Login</a></li>
                
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>