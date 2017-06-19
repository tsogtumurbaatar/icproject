@extends('layouts.app')

@section('content')
<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="#" class="nav-menu-button">Menu</a>

        <div class="nav-inner">
            <div class="pure-menu">
                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="{{ url('/city')}}" class="pure-menu-link">City</a></li>
                    <li class="pure-menu-item"><a href="{{ url('/factor')}}" class="pure-menu-link">Factors</a></li>
                    <li class="pure-menu-item"><a href="{{ url('/segment')}}" class="pure-menu-link">Segments</a></li>
                    <li class="pure-menu-item"><a href="{{ url('/indicator')}}" class="pure-menu-link">Indicators</a></li>
                    <li class="pure-menu-item"><a href="{{ url('/datapoint')}}" class="pure-menu-link">Data</a></li>
                    <li class="pure-menu-item"><a href="{{ url('/importExport')}}" class="pure-menu-link">Data Import</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="main" class="pure-u-1">
        <div class="email-content">
            <div class="email-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1 class="email-content-title">Hello from Toronto</h1>
                    <p class="email-content-subtitle">
                        From <a>Tilo Mitra</a> at <span>3:56pm, April 3, 2012</span>
                    </p>
                </div>

                <div class="email-content-controls pure-u-1-2">
                    <button class="secondary-button pure-button">Reply</button>
                    <button class="secondary-button pure-button">Forward</button>
                    <button class="secondary-button pure-button">Move to</button>
                </div>
            </div>

            <div class="email-content-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Regards,<br>
                    Tilo
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

