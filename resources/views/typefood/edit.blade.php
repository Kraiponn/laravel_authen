@extends('layouts.app') 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
            <div class="card">		
                <div class="card-header bg-primary"  style="padding:2px">
                    แก้ไขประเภทอาหาร
                </div>
                <div class="card-body">
                    
                    @if (count($errors) > 0)
                       <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {!! Form::model($typefoods, array('url' => 'typefood/'.$typefoods->id, 'method' => 'PUT')) !!}
                        {{ Form::token() }}
                        {{--  {{ csrf_field() }}  --}}

                        <div class="col-xs-4">
                            <div class="form-group">
                                <?= Form::label('name', 'FoodType') ?>
                                <?= Form::text('name', null, [ 'class' => 'form-control' ]) ?>
                            </div>
                        </div>
                        
                        <div class="col-sm-10">
                            <div class="form-group">
                                <?= Form::submit('บันทึก', [ 'class' => 'btn btn-primary' ]) ?>
                            </div>
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
		</div>
	</div>
</div>
@endsection