@extends('layouts.app')

@section('content')

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">
            Welcome to the innovation Cities Program
        </h1>
        <h3>
           @if (session('status'))
           <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </h3>
</div>
</div>

<div class="content-wrapper">
    <div class="content">
        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    <i class="fa fa-pencil-square-o"></i>
                    Create 
                </h3>
                <p>
                    The Innovation Cities™ Program provides powerful tools for implementing your ideas in cities, business and organizations. All 2thinknow innovation services are designed to help create your innovation.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-list"></i>
                    Compare 
                </h3>
                <p>
                    Start to compare city locations for innovation potential in general with the Index classifications. Select cities and indicators from the Comparative City Data-set.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-th-large"></i>
                    Share the Innovation with us!
                </h3>
                <p>
                    For local city professionals we offer bronze, silver and platinum city packages, which are very detailed and include analysis, data and/or analyst support on a chosen single city.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    Innovation Services
                </h3>
                <p>
                    To compare, measure and create innovation use our innovation service products. These include City Benchmarking Data, the Innovation Course, analyst reports and other innovation enablers.
                </p>
            </div>
        </div>
    </div>

    @endsection