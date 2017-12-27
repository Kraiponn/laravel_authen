@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">เพิ่มเมนูอาหาร</div>
				<div class="panel-body">

					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $item)
							    <li>{{ $item }}</li>
							@endforeach
						</ul>
					</div>
                    @endif 
                    {!! Form::open(array('url' => 'food', 'files' => true)) !!} 
                    {{ csrf_field() }}

					<div class="row">
						<div class="col-xs-8">
							<div class="form-group">
                                {{ Form::label('name', 'ชื่อเมนูอาหาร') }} 
                                {{ Form::text('name', null, [ 'class' => 'form-control']) }}
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">
                                {{ Form::label('price', 'ราคา') }} 
                                {{ Form::text('price', null, [ 'class' => 'form-control']) }}
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
                                {{ Form::label('typefood_id', 'ประเภทอาหาร') }} 
                                {!! Form::select('typefood_id', App\TypeFood::pluck('name', 'id'), null,
								[ 'class' => 'form-control', 'placeholder' => '--Select--']) !!}
							</div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-grooup">
                                {{ Form::label('image', 'Image') }} 
                                {{ Form::file('image', null, [ 'class' => 'form-control']) }}
                            </div>
                        </div>
					</div>

					<div class="row">
						<div class="col-xs-10">
							<div class="form-group">
								{{ Form::submit('บันทึก', ['class'=>'btn btn-primary']) }}
							</div>
						</div>
					</div>


					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')

	@if (session()->has('status'))
		<script>
			// alert('Status complete');
			swal('Complete', 
				'<?php echo session()->get('status') ?>', 
				'success');
		</script>
	@endif

@endsection