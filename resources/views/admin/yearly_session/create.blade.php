@extends('layouts.app')

@section('title', 'Yearly Session')

@section('stylesheets')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <!-- page wrapper start -->
    <!-- page-title-box -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <!-- end row -->
            <div class="row">
                <div class="col-xl-6 offset-xl-3">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('error'))
                                <div class="alert-dismissable alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button>
                                    {{ Session('error') }}
                                </div>
                            @endif
                            <div class="mt-0 header-title mb-4">
                                Yearly Session - Create
                                <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary float-right">Yearly Session List</a>
                            </div>
                            {!! Form::open(['route' =>'students.store'])!!}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('Batch') !!}
                                        {{--                                        {!! Form::select('batch_id', $batches, null ,['class'=> 'form-control']) !!}--}}
{{--                                        <select name="batch_id" id="" class="form-control">--}}
{{--                                            @foreach($batches as $batch)--}}
{{--                                                <option value={{ $batch->id }} > {{ $batch->department->department_name. '-' . $batch->batch_no. '-' . $batch->shift->slug}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}

                                        {!! Form::select('year', $batches, null ,['class'=> 'form-control']) !!}


                                        @if ($errors->has('batch_id'))
                                            <span class="help-block">
                                            {!! $errors->first('batch_id') !!}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary'] ) !!}

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->
@endsection



