@extends('layouts.app')
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-11 col-md-offset-1">
             <div class="panel panel-default">               
                 <div class="panel-heading">เมนูอาหาร จำนวน {{ $count }} รายการ</div>              
                 <div class="panel-body">
                    <a href="{{ url('/food/create') }}" class="btn btn-primary">เพิ่มข้อมูล</a>
                    <a href="{{ url('/food/pdf-report/9') }}" class="btn btn-success">Report</a>
                    
                    <br>
                    <table class="table tablebordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>TypeFood</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                <td>
                                    <a href="{{ asset('images/'.$item->image) }}" data-lity>
                                      <img src="{{ asset('images_resize/'.$item->image) }}" width="50" height="50" alt="">
                                    </a>
                                </td>
                                <td>{{ $item->typefood->name }}</td>
                                <td>
                                    {{--  <a href="{{ url('food') }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>  --}}
                                    <a href="{{ url('food/'.$item->id.'/edit') }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    {!! Form::open(array('url'=>'food/'.$item->id, 'method'=>'delete')) !!}

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach                       
                        </tbody>
                    </table>
                    
                    {!! $foods->render() !!}
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection