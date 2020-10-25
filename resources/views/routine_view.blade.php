
@section('title', 'Routine')
@include('layouts.includes.header')

<div class="container-fluid">
    <h4 class="text-center mt-4"> Class schedule for <strong>{{ $batch->department_name."-".$batch->batch_no."-".$batch->slug }}{{ $batch->section_name != '' ? " - ".$batch->section_name : '' }} ({{ $batch->session_name."-".$batch->year }})</strong></h4>
    <div class="row justify-content-center">
        <div class="col-md-12 pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="mt-0 header-title mb-4">
                        <a class="btn btn-danger float-right" href="{{ route('routine') }}">
                            Go Back
                        </a>

                        <form action="{{ route('routine_print') }}" method="post">
                            @csrf
                            <input type="hidden" name="batch_id" value="{{  $batch->batch_id.",".$batch->section_id }}">
                            <input type="hidden" name="y_session_id" value="{{  $y_session_id }}">
                            <button type="submit" class="btn btn-primary float-right mr-2">
                                Download as PDF
                            </button>
                        </form>
                        <br>
                    </div>

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
                                            <td colspan="{{ $colspan }}">
                                                @foreach($slot->routine as $routine)
                                                    @if($timeslot->day->id == $routine->day_id && $timeslot->time_slot->id == $routine->time_slot_id &&  $routine->yearly_session_id == $y_session_id)
                                                        {{ $routine->course->course_code }}-{{ $routine->course->course_type == '0' ? '(T)': '(L)' }} <br>
                                                        {{ $routine->course->course_name }} <br>
                                                        {{ $routine->room->building.'-'.$routine->room->room_no }} <br>
                                                        {{ $routine->teacher->user->firstname." ".$routine->teacher->user->lastname }}
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
</div>







