@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">


                    <div class="row">

                        <div class="col-sm-6">
                            @include('home.checkout')
                        </div>

                        <div class="col-sm-6">
                            @include('home.absence')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @include('home.checkin')

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
