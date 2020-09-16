@extends('layouts.app')

@section('title', 'Student')

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
                                Assign Lab Section for <strong>{{ $student->batch->department->department_name ."-". $student->batch->batch_no ."-".$student->batch->shift->slug  }}</strong>
                                Total Students - <strong>{{ $student->number_of_student }}</strong>
                                <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary float-right">Student List</a>
                                    <div>
                                        Theory Section wise students <br>
                                        @foreach($student->section_student as $section_student)
                                                @if($section_student->section_type == 'theory')
                                                {{ $section_student->section->section_name }} : <span class="px-3 bg-danger text-light">{{ $section_student->students }}</span>
                                                @endif
                                            </strong>
                                        @endforeach
                                    </div>
                                <br>

                            {!! Form::open(['route' =>'lab_section_store']) !!}
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" name="total_students" value="{{ $student->number_of_student }}">

                            <div class="row">
                                <div class="form-group">
                                    @foreach($sections as $section)
                                        @if(count($student->section_student) != 0)
                                            @foreach($student->section_student as $section_student)
                                                @if($section->id == $section_student->section_id)
                                                    @php $flag = 1; @endphp
                                                    @break
                                                @else
                                                    @php $flag = 0; @endphp
                                                @endif
                                            @endforeach
                                        @else
                                            @php $flag = -1; @endphp
                                        @endif
                                        @if($flag == 1)
                                            <input type="checkbox" class="section" id="{{ $section->slug }}" name="student_section[{{ $section->id }}][section]" checked value={{ $section->id }}>
                                            <label for="{{ $section->slug }}">{{ $section->section_name }}</label>
                                            <input data-student="#{{ $section->slug }}" value="{{ $section_student->students }}"  max="{{ $student->number_of_student }}" type="number" name="student_section[{{ $section->id }}][student]" class="form-control-sm student">
                                            <br>
                                        @else
                                            <input type="checkbox" class="section" id="{{ $section->slug }}" name="student_section[{{ $section->id }}][section]" value={{ $section->id }}>
                                            <label for="{{ $section->slug }}">{{ $section->section_name }}</label>
                                            <input data-student="#{{ $section->slug }}"  type="number" name="student_section[{{ $section->id }}][student]" class="form-control-sm student" disabled>
                                            <br>
                                        @endif
                                    @endforeach

                                    @if ($errors->has('students'))
                                        <span class="help-block">
                                        {!! $errors->first('students') !!}

                                        </span>
                                    @endif
                                </div>
                            </div>


                            {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary'] ) !!}

                            {!! Form::close() !!}

                        </div>



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


@push('script')
    <script>
        let sections = document.querySelectorAll('.section');
        sections.forEach((e) => {
            e.addEventListener('input', event=>{

                if(event.target.checked == true){
                    //console.log(event.target.id);
                    document.querySelector( `[data-student="#${event.target.id}"]`).removeAttribute('disabled','false');
                }else{
                    document.querySelector( `[data-student="#${event.target.id}"]`).setAttribute('disabled','true');
                }
            })
        })
    </script>
@endpush



