@extends('frontend.layouts.master')
@section('title', 'Duration')
@section('content')

<style>
.formInput {
    padding: 2px;
    padding-left: 5px;
    padding-right: 5px;
    width: 100%;
    border: 1px solid #d5d5d5;
}
</style>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Display Success Message -->
            <h2 style="margin:20px;" class="text-center">Select Opening and Closing Times</h2>
            @if (session('success'))
            <div class="alert alert-success " style="color:green">
                {{ session('success') }}
            </div>
            @endif

            <!-- Display Error Messages -->
            @if ($errors->any())
            <div style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div>

                <table class="table">
                    <tr>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th></th>
                    </tr>
                    <form action="{{ route('saveDuration') }}" method="post">
                        @csrf
                        <tr>
                            <td>
                                <input type="text" name="businessId" id="businessId" style="display:none"
                                    value='{{ $bid }}' />
                                <select class="formInput" name="day" id="day">
                                    <option value="All days">ALL days</option>
                                    <option value="Sunday">Sun</option>
                                    <option value="Monday">Mon</option>
                                    <option value="Tuesday">Tue</option>
                                    <option value="Wednesday">Wed</option>
                                    <option value="Thursday">Thur</option>
                                    <option value="Friday">Fri</option>
                                    <option value="Saturday">Sat</option>
                                </select>
                            </td>
                            <td>
                                <select class="formInput" name="opening_time" id="opening_time">
                                    <option value='Closed'>Closed</option>
                                    <option value='24 x 7'>24 x 7</option>
                                    <?php for($i=1;$i<=12;$i++){
                                         $time=0;
                                        if($i<10)
                                        {
                                           $time="0".$i;       
                                        }
                                        else{ $time=$i;}
                                       
                                        ?>
                                    <option value='{{$time.":"."00"."AM"}}'>{{$time.":"."00"."AM"}}</option>
                                    <option value='{{$time.":"."15"."AM"}}'>{{$time.":"."15"."AM"}}</option>
                                    <option value='{{$time.":"."30"."AM"}}'>{{$time.":"."30"."AM"}}</option>
                                    <option value='{{$time.":"."00"."PM"}}'>{{$time.":"."00"."PM"}}</option>
                                    <option value='{{$time.":"."15"."PM"}}'>{{$time.":"."15"."PM"}}</option>
                                    <option value='{{$time.":"."30"."PM"}}'>{{$time.":"."30"."PM"}}</option>
                                    <?php
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <select class="formInput" name="end_time" id="end_time">
                                    <option value='Closed'>Closed</option>
                                    <option value='24 x 7'>24 x 7</option>
                                    <?php for($i=1;$i<=12;$i++){
                                         $time=0;
                                        if($i<10)
                                        {
                                           $time="0".$i;       
                                        }
                                        else{ $time=$i;}
                                       
                                        ?>
                                    <option value='{{$time.":"."00"."AM"}}'>{{$time.":"."00"."AM"}}</option>
                                    <option value='{{$time.":"."15"."AM"}}'>{{$time.":"."15"."AM"}}</option>
                                    <option value='{{$time.":"."30"."AM"}}'>{{$time.":"."30"."AM"}}</option>
                                    <option value='{{$time.":"."00"."PM"}}'>{{$time.":"."00"."PM"}}</option>
                                    <option value='{{$time.":"."15"."PM"}}'>{{$time.":"."15"."PM"}}</option>
                                    <option value='{{$time.":"."30"."PM"}}'>{{$time.":"."30"."PM"}}</option>
                                    <?php
                                }
                                ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="formbutton"><i class="fa fa-plus"></i></button>
                            </td>
                        </tr>
                    </form>
                    @foreach ($duration as $value)
                    <tr>
                        <td>{{ $value->day }}</td>
                        <td>{{ $value->opening_time }}</td>


                        <td>{{ $value->end_time }}</td>
                        <td>
                            <form action="{{ route('deleteDuration', ['id' => $value->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>

@endsection