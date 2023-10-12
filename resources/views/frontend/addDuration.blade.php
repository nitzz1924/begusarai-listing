 @extends('frontend.layouts.master')
 @section('title', 'Duration')
 @section('content')
     <style>
         .formInput {
             border: 1px solid #ccc;
             padding: 8px;
             width: 100%;
             border-radius: 4px;
         }

         .formbutton {
             padding: 8px 16px;
             background-color: #4CAF50;
             color: white;
             border: none;
             border-radius: 4px;
             cursor: pointer;
         }

         .formbutton:hover {
             background-color: #45a049;
         }

         .container {
             margin-top: 50px;
         }

         .table {
             width: 100%;
             border-collapse: collapse;
         }

         .table th,
         .table td {
             padding: 8px;
             text-align: left;
             border-bottom: 1px solid #ddd;
         }

         /* .table th {
            background-color: #f2f2f2;
        } */
         h2 {
             text-align: center;
             margin-top: 20px;
             margin-bottom: 30px;
         }
     </style>

     <!-- Display Success Message -->
     @if (session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
     @endif

     <!-- Display Error Messages -->
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

     <h2>Select Opening and Closing Times</h2>

     <div class="container">
         <div class="row">
             <div class="col-md-6 offset-md-3">
                 <form action="{{ route('saveDuration') }}" method="post">
                     @csrf
                     <table class="table">
                         <tr>
                             <th>Day</th>
                             <th>Opening Time</th>
                             <th>Closing Time</th>
                             <th>Action</th>
                         </tr>
                         <tr>
                             <td>
                                 <select class="formInput" name="day" id="day">
                                     <option value="Sun">Sunday</option>
                                     <option value="Mon">Monday</option>
                                     <option value="Tues">Tuesday</option>
                                     <option value="Wednes">Wednesday</option>
                                     <option value="Thurs">Thursday</option>
                                     <option value="Fri">Friday</option>
                                     <option value="Satur">Saturday</option>
                                 </select>
                             </td>
                             <td>
                                 <input class="formInput" type="time" name="opening_time" id="opening_time">
                             </td>
                             <td>
                                 <input class="formInput" type="time" name="end_time" id="end_time">
                             </td>
                             <td>
                                 <button type="submit" class="formbutton">Submit</button>
                             </td>
                         </tr>
                     </table>
                 </form>
             </div>
         </div>
     </div>

 @endsection
