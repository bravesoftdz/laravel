@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card card-map">
        <div class="header">
            <h4 class="title">Google Maps</h4>
        </div>
        <div class="map">
            <div id="map"></div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $().ready(function(){
        demo.initGoogleMaps();
    });
</script>
@endsection