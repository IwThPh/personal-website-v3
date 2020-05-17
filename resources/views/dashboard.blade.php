@extends('layouts.app')

@section('content')
<div id='dashboard' class="container section d-flex flex-row shadow-sm">
    @include('dashboard.dashnav')
    <div class="view-section flex-column">
        <router-view></router-view>
    </div>
</div>
<script type="text/javascript" src="{{URL::asset('js/dashboard.js')}}"></script>
@endsection
