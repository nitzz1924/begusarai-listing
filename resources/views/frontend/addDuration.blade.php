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
            <div class="col-md-6 offset-md-3 shadow rounded-3">
                <!-- Display Success Message -->
                <h2 class="text-center fs-4 py-3">Select Opening and Closing Times</h2>
                @if (session('success'))
                    <div class="alert alert-success text-center text-white py-2 w-75 bg-success" role="alert">
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

                <div class="">

                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Select Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <form action="{{ route('saveDuration') }}" method="post">
                            @csrf
                            <tbody>
                                <tr class="table-light table-striped">
                                    <td>
                                        <input type="text" name="businessId" id="businessId" style="display:none"
                                            value='{{ $bid }}' />
                                        <select class="formInput form-control" name="day" id="day">
                                            <option value="All days">ALL days</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="formInput form-control" name="opening_time" id="opening_time">
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
                                            <option value='{{ $time . ':' . '00' . ' AM' }}'>
                                                {{ $time . ':' . '00' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '15' . ' AM' }}'>
                                                {{ $time . ':' . '15' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '30' . ' AM' }}'>
                                                {{ $time . ':' . '30' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '00' . ' PM' }}'>
                                                {{ $time . ':' . '00' . ' PM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '15' . ' PM' }}'>
                                                {{ $time . ':' . '15' . ' PM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '30' . ' PM' }}'>
                                                {{ $time . ':' . '30' . ' PM' }}
                                            </option>
                                            <?php
                                }
                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="formInput form-control" name="end_time" id="end_time">
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
                                            <option value='{{ $time . ':' . '00' . ' AM' }}'>
                                                {{ $time . ':' . '00' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '15' . ' AM' }}'>
                                                {{ $time . ':' . '15' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '30' . ' AM' }}'>
                                                {{ $time . ':' . '30' . ' AM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '00' . ' PM' }}'>
                                                {{ $time . ':' . '00' . ' PM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '15' . ' PM' }}'>
                                                {{ $time . ':' . '15' . ' PM' }}
                                            </option>
                                            <option value='{{ $time . ':' . '30' . ' PM' }}'>
                                                {{ $time . ':' . '30' . ' PM' }}
                                            </option>
                                            <?php
                                }
                                ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="text-center">

                                            <button type="submit" class="formbutton"><i
                                                    class="fa fa-plus text-white p-2 rounded bg-success"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                        @foreach ($duration as $value)
                            <tbody>
                                <tr class="">
                                    <td class="border-end text-center">{{ $value->day }} </td>
                                    <td class="border-end text-center"> {{ $value->opening_time }} </td>
                                    <td class="border-end text-center">{{ $value->end_time }} </td>
                                    <td>
                                        <form action="{{ route('deleteDuration', ['id' => $value->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="text-center">
                                                <button type="submit"><i class="fa fa-trash text-danger"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
