<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ route('adminka.index') }}">@lang('admin/main.dashboard')</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-panel"></i>
                        <p>Stats</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-settings"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="dropdown localization">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p>@lang('admin/main.'.$locale)</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu localization-menu">
                        @foreach(config('app.locals') as $key)
                            <li><a href="{{ route('admin.locale', $key) }}">@lang('admin/main.'.$key)</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        @lang('admin/main.exit')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>