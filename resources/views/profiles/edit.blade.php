@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">แก้ไขข้อมูลส่วนตัวของ {{  $user->name }}</div>

                <div class="panel-body">
                    
               {!! Form::model($user,array('url' => 'profiles/'.$user->id,'method' => 'put')) !!}
                
                {{ csrf_field() }}
                
                <div class="col-xs-8">
                   <div class="form-group">
                    {{ Form::label('name', 'ชื่อ-สกุล')  }}
                    {{ Form::text('name',null,['class' => 'form-control']) }}
                   </div>
                </div>
                
                <div class="col-xs-4">
                   <div class="form-group">
                    {{ Form::label('email', 'อีเมล')  }}
                    {{ Form::text('email',null,['class' => 'form-control']) }}
                   </div>
                </div>
                
                <div class="col-xs-4">
                   <div class="form-group">
                    {{ Form::label('tel', 'โทรศัพท์')  }}
                    {{ Form::text('tel',isset($user->profiles->tel) ? $user->profiles->tel : null ,['class' => 'form-control']) }}
                   </div>
                </div>
                
               
                <div class="col-sm-10">
                    <div class="form-group">
                    {{ Form::submit('บันทึก',['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                
                
                {!! Form::close() !!}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


