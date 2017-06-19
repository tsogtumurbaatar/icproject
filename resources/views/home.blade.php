@extends('layouts.app')

@section('content')

<div id="contact" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="container question" style="margin-top: 10px;">
                <div class="col-md-2"></div>
                <div class="col-md-8">

                <br><br><br><br>
                    <div class="row">

                        <div class="col-md-5">
                            <a href="{{ url('/settings')}}" class="btn btn-primary btn-block">Settings</a>                    
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <a href="{{ url('/createchart')}}" class="btn btn-primary btn-block">Create Charts</a>
                        </div>
                    </div>


                </div>

                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
</div>

@endsection

