@extends('layouts.master')
@section('title', 'Adres Yönetimi')
@section('head')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="auto-complete.js"></script>


@endsection
@section('content')
    <h1 class="page-header">Adres Yönetimi</h1>

    <form method="post" action="{{ route('address.kaydet', $entry->id) }}">
        {{ csrf_field() }}

        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
            </button>
        </div>
        <h3 class="sub-header">
            Kişi {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
        </h3>

        @include('layouts.partials.alert')
        @include('layouts.partials.errors')



        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Adres giriniz</h2>
                </div>
                <div class="panel-body">
                    <input id="autocomplete" placeholder="Adres giriniz" onFocus="geolocate()" type="text" class="form-control">
                    <div id="address">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Street address</label>
                                <input class="form-control" id="street_number" disabled="true">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Route</label>
                                <input class="form-control" id="route" disabled="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">City</label>
                                <input class="form-control field" id="locality" disabled="true">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">State</label>
                                <input class="form-control" id="administrative_area_level_1" disabled="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Zip code</label>
                                <input class="form-control" id="postal_code" disabled="true">
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Country</label>
                                <input class="form-control" id="country" disabled="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZpVAii_d6n9DH7wmX6bPRZ5PKza7hcqg&callback=initAutocomplete&libraries=places&v=weekly"
        defer
    ></script>
@endsection
