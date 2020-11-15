@extends('layouts.app')

@section('title', 'Routine')

@section('stylesheets')
    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-0 header-title mb-4">
                                Routine View for <strong>{{ $teacher_detail->user->firstname." ".$teacher_detail->user->lastname }}</strong>
                            </div>

                            <a class="btn btn-danger float-right" href="{{ route('teacher_search') }}">Back</a>

                            <form action="{{ route('teacher_wise_print') }}" method="post">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{  $teacher_detail->id }}">
                                <input type="hidden" name="y_session_id" value="{{  $y_session_id }}">
                                <button type="submit" class="btn btn-primary">
                                    Download as PDF
                                </button>
                            </form>



                            <br>
                            <br>

                            @if (Session::has('message'))
                                <div class="alert-dismissable alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button>
                                    {{ Session('message') }}
                                </div>
                            @endif
                            @if (Session::has('delete-message'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button>
                                    {{ Session('delete-message') }}
                                </div>
                            @endif


                                <table class="table table-striped table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tbody>
                                    @foreach($slots as $slot)
                                    <tr>
                                        <th class="p-0" style="overflow: hidden">
                                            <span class="px-3 py-2 d-block border-bottom">Day/Time </span>
                                        </th>

                                        @php $count = 0; @endphp
                                        @foreach($day_wise_slots as $key => $timeslot)
                                            @php
                                                $diff = intval((strtotime($timeslot->time_slot->to) - strtotime($timeslot->time_slot->from))/3600);
                                            @endphp

                                            @php $flag = 0; $colspan = ''; @endphp
                                                @if ($slot->id == $timeslot->day_id)
                                                    @php $flag = 1; $count++; @endphp
                                                @else @php $flag = 0; @endphp
                                            @endif

                                            @if($diff > 2 && $count < 4)
                                                @php $colspan = 2; @endphp
                                            @endif

                                            @if($flag == 1)
                                                <th colspan="{{ $colspan }}" class="p-0 text-center" style="overflow: hidden">
                                                    <span class="px-3 py-2 d-block">{{ date('g:i a', strtotime($timeslot->time_slot->from)).'-'.date('g:i a', strtotime($timeslot->time_slot->to)) }}</span>
                                                </th>
                                            @endif

                                        @endforeach

                                    </tr>

                                    <tr>
                                        <td>
                                            {{ $slot->day_title }}
                                        </td>
                                        @foreach($day_wise_slots as $timeslot)

                                            @php $flag = 0 @endphp

                                            @if ($slot->id == $timeslot->day_id)
                                                @php $flag = 1 @endphp
                                            @else @php $flag = 0 @endphp
                                            @endif

                                            @if($flag == 1)
                                                <td class="text-center font-weight-bold" colspan="{{ $colspan }}">
                                                   @foreach($slot->routine as $routine)
                                                        @php($section_name = "")
                                                        @if($routine->section_id)
                                                            @foreach($routine->batch->student->section_student as $section_student)
                                                                @if($section_student->section->id == $routine->section_id)
                                                                    @php($section_name = "-".$section_student->section->section_name)
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                       @if($timeslot->day->id == $routine->day_id && $timeslot->time_slot->id == $routine->time_slot_id &&  $routine->yearly_session_id == $y_session_id)
                                                            {{ $routine->course->course_code }}-{{ $routine->course->course_type == '0' ? '(T)': '(L)' }} <br>
                                                            {{ $routine->course->course_name }} <br>
                                                            {{ $routine->room->building.'-'.$routine->room->room_no }} <br>
                                                            {{ $routine->batch->department->department_name."-".$routine->batch->batch_no."-".$routine->batch->shift->slug.$section_name }}
                                                       @endif
                                                   @endforeach
                                                </td>
                                            @endif

                                        @endforeach
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->

    </div>
    <!-- page wrapper end -->
@endsection


@push('script')

    <script>
        let forms = document.querySelectorAll('.form');
        forms.forEach((form)=>{
            $(form).on('submit', function(e) {
                e.preventDefault();
                let alertBox = e.target.querySelector('.alert_box');
                let data = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: '{{route("routine_create")}}',
                    data: data,
                    dataType: "json",
                    success: function(data) {
                        if(data.type == 'error'){
                            alertBox.innerHTML = `<div class="alert-dismissable alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x
                                    </button><strong>${data.text}</strong></div>`;
                        }else{
                            alert(data.text);
                            location.reload();
                        }
                    }
                });
            });
        })
    </script>

@endpush

