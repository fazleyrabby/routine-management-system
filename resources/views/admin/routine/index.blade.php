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
                                Assign Routine
                                {{--                                <a href="{{ route('ranks.create') }}" class="btn btn-sm btn-primary float-right">Add New</a>--}}
                            </div>
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

                            {{--                            @foreach($days as $day)--}}
                            {{--                                <h3 class="text-uppercase bg-dark p-2 text-light float-left"><strong>--}}
                            {{--                                        {{ $day->day_title }}</strong>--}}
                            {{--                                </h3>--}}
                            {{--                                <table class="table table-striped table-bordered dt-responsive nowrap"--}}
                            {{--                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">--}}
                            {{--                                    <thead>--}}
                            {{--                                    <tr>--}}

                            {{--                                        <th>Batch</th>--}}
                            {{--                                        @foreach($timeslots as $timeslot)--}}
                            {{--                                        <th class="text-center">--}}
                            {{--                                            {{ date('g:i a', strtotime($timeslot->from)).'-'.date('g:i a', strtotime($timeslot->to)) }}--}}
                            {{--                                        </th>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </tr>--}}
                            {{--                                    </thead>--}}


                            {{--                                    <tbody>--}}
                            {{--                                        @foreach($sections as $section)--}}
                            {{--                                            <tr>--}}
                            {{--                                            <td>--}}
                            {{--                                                {{ $section->department_name.'-'.$section->batch_no.'-'.$section->slug }}--}}
                            {{--                                                 {{ $section->section_name ? '- '.$section->section_name : '' }}--}}
                            {{--                                            </td>--}}
                            {{--                                             @for($i=0; $i < $timeslots->count(); $i++)--}}
                            {{--                                                    <td class="text-center">--}}
                            {{--                                                        <span class="mb-2 d-block">--}}
                            {{--                                                           Course | Room | Teacher--}}
                            {{--                                                        </span>--}}
                            {{--                                                        <button id="{{ 'b'.$section->batch_id.'/s'.$section->section_id  }}" class="btn btn-primary btn-sm">Assign / Edit </button>--}}
                            {{--                                                    </td>--}}
                            {{--                                             @endfor--}}
                            {{--                                            </tr>--}}
                            {{--                                        @endforeach--}}

                            {{--                                    </tbody>--}}
                            {{--                                </table>--}}
                            {{--                            @endforeach--}}


                            {{--                            {{ $slots[0]->day_wise_slot[0]->time_slot }}--}}

                            {{--                            {{ $slots[0]->day_wise_slot[0]->time_slot->from }}--}}
                            @foreach($slots as $slot)
                                <h3 class="text-uppercase bg-dark p-2 text-light float-left">
                                    <strong>
                                        {{ $slot->day_title }}
                                    </strong>
                                </h3>
                                <table class="table table-striped table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th class="p-0" style="overflow: hidden">
                                            <span class="px-3 py-2 d-block border-bottom">Batch</span>
                                            <span class="px-3 py-2 d-block">Class Slots</span>
                                        </th>
                                        @php $flag = 0 @endphp
                                        @foreach($day_wise_slots as $timeslot)
                                            @if ($slot->id == $timeslot->day_id)
                                                @php $flag = 1 @endphp
                                                @else @php $flag = 0 @endphp
                                            @endif
                                            @if($flag == 1)
                                            <th class="p-0 text-center" style="overflow: hidden">
                                                <span class="px-3 py-2 d-block">{{ date('g:i a', strtotime($timeslot->time_slot->from)).'-'.date('g:i a', strtotime($timeslot->time_slot->to)) }}</span>
                                                <span class="bg-danger px-3 py-2 d-block text-light">{{ $timeslot->class_slot }}</span>
                                            </th>
                                            @endif
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($sections as $section)

                                        <tr>
                                            <td>
                                                {{ $section->department_name.'-'.$section->batch_no.'-'.$section->slug }}
                                                {{ $section->section_name ? '- '.$section->section_name : '' }}
                                            </td>
                                            @foreach($day_wise_slots as $timeslot)
                                                @if ($slot->id == $timeslot->day_id)
                                                    @php $flag = 1 @endphp
                                                @else @php $flag = 0 @endphp
                                                @endif

                                                @if($flag == 1)
                                                <td class="">
                                                        <span class="mb-2 d-block text-center">
                                                            @php
                                                                $day_id = $time_slot_id = $batch_id = $section_id = $room_id = $course_id = $yearly_session_id = $teacher_id = $routine_id = '' ;
                                                            @endphp

                                                            @foreach($slot->routine as $routine)

                                                                @if($timeslot->day_id == $routine->day_id && $timeslot->time_slot_id == $routine->time_slot_id && $routine->batch_id == $section->batch_id && $section->section_id == $routine->section_id && $routine->yearly_session_id == $yearly_session)
                                                                    {{ $routine->course->course_code }} {{ $routine->course->course_type == '0' ? '(T)': '(L)' }} | {{ $routine->room->building.'-'.$routine->room->room_no }} | {{ $routine->teacher->user->firstname.' '.$routine->teacher->user->lastname }}
                                                                    @php
                                                                        $routine_id = $routine->id;
                                                                        $day_id = $routine->day_id;
                                                                        $time_slot_id = $routine->time_slot_id;
                                                                        $batch_id = $routine->batch_id;
                                                                        $section_id = $routine->section_id;
                                                                        $yearly_session_id = $routine->yearly_session_id;
                                                                        $room_id = $routine->room_id;
                                                                        $course_id = $routine->course_id;
                                                                        $teacher_id = $routine->teacher_id;
                                                                    @endphp
{{--                                                                @else--}}
{{--                                                                    @php--}}
{{--                                                                        $day_wise_slot_id = $batch_id = $section_id = $room_id = $course_id = $yearly_session_id = $teacher_id = '';--}}
{{--                                                                    @endphp--}}
                                                                @endif
                                                            @endforeach

                                                        </span>
                                                    <span class="d-block text-center">
                                                        <button type="button" class="btn btn-sm btn-danger data_modal"  data-toggle="modal" data-target=".bs-example-modal-center{{ 'batch'.$section->batch_id.'_section'.$section->section_id.'_day'.$slot->day_title.'_time'.$timeslot->time_slot->id  }}">Assign / Edit</button>
{{--                                                         {{ $routine_id }}--}}
                                                    </span>


                                                    <div class="modal fade bs-example-modal-center{{ 'batch'.$section->batch_id.'_section'.$section->section_id.'_day'.$slot->day_title.'_time'.$timeslot->time_slot->id  }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <span class="d-block font-weight-bold font-14">
                                                                        Day - {{ $slot->day_title }} |
                                                                        Batch - {{ $section->department_name.'-'.$section->batch_no.'-'.$section->slug }}
                                                                        {{ $section->section_name ? '-'.$section->section_name : '' }}  |
                                                                        Time Range - {{ date('g:i a', strtotime($timeslot->time_slot->from)).'-'.date('g:i a', strtotime($timeslot->time_slot->to)) }}
                                                                    </span>
                                                                </div>

                                                                <div class="modal-body">
                                                                    {!! Form::open(['route' => ['routine_create'],'style' => 'display:inline', 'class'=> 'form']) !!}
                                                                    {{ $routine_id }}
                                                                    <input type="hidden" name="yearly_session_id" value="{{ $yearly_session }}">
                                                                    <input type="hidden" name="batch_id" value="{{ $section->batch_id }}">
                                                                    <input type="hidden" name="section_id" value="{{ $section->section_id }}">
                                                                    <input type="hidden" name="day_id" value="{{ $timeslot->day_id }}">
                                                                    <input type="hidden" name="time_slot_id" value="{{ $timeslot->time_slot_id }}">
                                                                    <input type="hidden" name="routine_id" value="{{ $routine_id }}">


                                                                    <div class="alert_box"></div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Teacher</label>
                                                                                <select name="teacher_id" id="" class="form-control" required>

                                                                                    <option value="">Select</option>

                                                                                    @foreach($teachers as $teacher)
                                                                                        <option value="{{$teacher->id}}" {{ $teacher_id ==  $teacher->id ? 'selected' : '' }}>{{ $teacher->user->firstname.'-'.$teacher->user->lastname.' | '.$teacher->rank->rank }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Course</label>
                                                                                <select name="course_id" id="" class="form-control" required>
                                                                                    <option value="">Select</option>
                                                                                    @foreach($courses as $course)
                                                                                       <option value="{{$course->id}}" {{ $course_id ==  $course->id ? 'selected' : '' }}>{{ $course->course_code.'-'.$course->course_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Room</label>
                                                                                <select name="room_id" id="" class="form-control" required>
                                                                                    <option value="">Select</option>

                                                                                    @foreach($rooms as $room)
                                                                                        <option value="{{$room->id}}" {{ $room_id ==  $room->id ? 'selected' : '' }}>{{ $room->building.'-'.$room->room_no }} {{ $room->room_type == 0 ? '' : '- Lab' }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    {!! Form::submit('Assign', ['class' => 'btn btn-lg btn-danger']) !!}
                                                                    {!! Form::close() !!}
                                                                    <button type="button" class="btn btn-lg btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center{{ 'batch'.$section->batch_id.'_section'.$section->section_id.'_day'.$slot->day_title.'_time'.$timeslot->time_slot->id  }}"> Cancel </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endforeach

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
                    // error: function(error) {
                    //     alert('error');
                    // }
                });
            });
        })
    </script>

@endpush
