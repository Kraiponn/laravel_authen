@extends('layouts.app') 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-10">
			<div class="jumbotron">
                <h3>Type Food Detail</h3>
				<h4>ID  :: {{ $typefoods->id }}</h4>
                <h4>Name:: {{ $typefoods->name }}</h4>
			</div>
		</div>
	</div>
</div>
@endsection