@extends('layouts.app') 
@section('content')
<div class="row">
	<div class="col-md-3">
        <img src="{{ asset('images/accord.jpg') }}" 
         class="img-thumbnail img-responsive" >
        <br>
        <button class="btn btn-primary">Click Me</button>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-3"></div>
</div>
@endsection