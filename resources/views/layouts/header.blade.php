<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="{{url('/')}}">ICProject</a>

        <ul class="pure-menu-list">
            <li class="pure-menu-item">
                <a href="{{url('/')}}" class="pure-menu-link">Home
                    @if (Auth::check())
                    &nbsp;({{ Auth::user()->name }})
                    @endif
                </a>
            </li>
            <li class="pure-menu-item">
                <a href="{{url('/about')}}" class="pure-menu-link">About</a>
            </li>
            @if (Auth::guest())
            <li class="pure-menu-item">
                <a href="{{ url('/login') }}" class="pure-menu-link">Login</a>
            </li>
            <li class="pure-menu-item">
                <a href="{{ url('/register') }}" class="pure-menu-link">Register</a>
            </li>
            @else
                @if(Auth::user()->user_type == '1')
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" class="pure-menu-link">Settings</a>
                    <ul class="pure-menu-children">
                        <li class="pure-menu-item">
                            <a href="{{ url('/city')}}" class="pure-menu-link">City</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{ url('/factor')}}" class="pure-menu-link">Factors</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{ url('/segment')}}" class="pure-menu-link">Segments</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{ url('/indicator')}}" class="pure-menu-link">Indicators</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{ url('/datapoint')}}" class="pure-menu-link">Data</a>
                        </li>
                        <li class="pure-menu-item">
                            <a href="{{ url('/importExport')}}" class="pure-menu-link">Data Import</a>
                        </li>
                         <li class="pure-menu-item">
                            <a href="{{ url('/datapoint.xls')}}" class="pure-menu-link">Data Sample</a>
                        </li>
                    </ul>
                </li>
                <li class="pure-menu-item">
                    <a href="{{ url('/usermanage')}}" class="pure-menu-link">Users</a>
                </li>
                @endif
            <li class="pure-menu-item">
                <a href="{{ url('/createchart')}}" class="pure-menu-link">Create chart</a>
            </li>
            <li class="pure-menu-item">
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="pure-menu-link">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif
        </ul>
    </div>
</div>