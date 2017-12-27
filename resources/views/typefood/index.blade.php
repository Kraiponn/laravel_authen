@extends('layouts.app') 

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-10 col-md-offset-1">
			<a href="{{ url('/typefood/create') }}" class="btn btn-danger">Add New</a>
			<br>
			<div class="card">		
				<div class="card-header bg-primary"  style="padding:5px">
					<h4>TypeFood Data View</h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>#Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($typefoods as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>{{ $item->name }}</td>
								<td>
									<a href="{{ url('/typefood/show/'.$item->id) }}">View</a>
									<a href="{{ url('/typefood/'.$item->id.'/edit') }}">Edit</a>
									<a href="{{ url('/typefood/delete/'.$item->id) }}">Delete</a>
								</td>
							</tr>	
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="card-footer text-muted">
					{!! $typefoods->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection