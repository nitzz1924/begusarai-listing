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
                                    <input type="text" name="businessId" id="businessId" style="display:none" value='{{$bid}}' />
                                    <select class="formInput" name="day" id="day">
                                        <option value="Sun">Sun</option>
                                        <option value="Mon">Mon</option>
                                        <option value="Tues">Tues</option>
                                        <option value="Wednes">Wednes</option>
                                        <option value="Thurs">Thurs</option>
                                        <option value="Fri">Fri</option>
                                        <option value="Satur">Satur</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="formInput" type="time" name="opening_time" id="opening_time">
                                </td>
                                <td>
                                    <input class="formInput" type="time" name="end_time" id="end_time">
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
