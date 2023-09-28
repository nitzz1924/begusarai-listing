@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <style>
        /* Custom gradient class */
        .gradient-bg {
            background: linear-gradient(45deg, #46aef7, #46aef7);
            animation: changeColor 5s linear infinite;
        }

        /* Keyframes for color change */
    </style>
    <style>
        /* Custom CSS styles for your table */
        .widget-heading {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .main-card {
            border: 1px solid #e4e6ef;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .widget-content {
            display: flex;
            align-items: center;
        }

        .widget-content-left {
            margin-right: 15px;
        }

        .widget-content-left img {
            border-radius: 50%;
        }

        .widget-heading {
            font-size: 18px;
            font-weight: bold;
        }

        .badge-warning {
            background-color: #ffc107;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        /* Add more custom styles as needed */
    </style>
 <div class="app-page-title bg-light">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-graph2 icon-gradient bg-success"></i>
            </div>
            <div class="page-title-content">
                <h5 class="page-title"><b>Dashboard Data</b></h5>
                <h6 class="page-subtitle">Explore important statistics and insights</h6>
            </div>
        </div>
    </div>
</div>


    <div class="widget-heading"><b>All Entries</b></div>
    <div class="d-flex">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-primary">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Listings</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">{{ count($Result) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-success">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Active Plans</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">{{ $activePlans }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content" style="background-color: slategray;">

                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Users</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">{{ $userCount }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content bg-info">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Leads</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">{{ count($lead) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget-heading"><b>Today's New Entry</b></div>
    <div class="d-flex">
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content gradient-bg">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Today's Listings</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php
                            $todayDate = now()->format('Y-m-d');
                            $count = 0;
                            
                            foreach ($Result as $item) {
                                if (substr($item->created_at, 0, 10) === $todayDate) {
                                    $count++;
                                }
                            }
                            
                            echo $count;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content gradient-bg">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Today's Leads</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            @php
                                $todayDate = now()->format('Y-m-d');
                                $count = 0;
                                
                                foreach ($lead as $item) {
                                    if (substr($item->created_at, 0, 10) === $todayDate) {
                                        $count++;
                                    }
                                }
                                
                                echo $count;
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content gradient-bg">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Today's new User</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            {{$CurrentUserCount}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card mb-3 widget-content gradient-bg">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Today's new Active Plan</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            {{$CurrentActivePlan}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card px-2 py-3">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Business Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $todayDate = now()->format('Y-m-d');
                                $collectionResult = collect($Result);
                                $filteredResult = $collectionResult->filter(function ($value) use ($todayDate) {
                                    return substr($value->created_at, 0, 10) === $todayDate;
                                });
                            @endphp
                            @foreach ($filteredResult as $value)
                                <tr>
                                    <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img class="rounded-circle" src="assets/images/avatars/1.jpg"
                                                            alt="" width="40">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $value->businessName }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $value->email }}</td>
                                    <td class="text-center">{{ $value->phoneNumber1 }}</td>
                                    <td class="text-center">{{ $value->category }}</td>
                                    <td class="text-center">{{ $value->city }}</td>
                                    <td data-title="Payment" class="text-center">
                                        @if ($value->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-success"><i class="fas fa-check-circle"></i>
                                                Approved</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('listingDetail', ['id' => $value->id, 'category' => $value->category]) }}"
                                            class="btn btn-primary btn-sm " title="View"><i class="la la-eye"
                                                style="font-size: 18px; margin-right: 5px;"></i>View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Lead -->

        <div class="col-md-6">
            <div class="main-card mb-3 card px-2 py-3">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>

                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Number</th>
                                <th class="text-nowrap">Business Name</th>
                                <th class="text-nowrap">Message</th>

                                <th>Status </th>
                                <th>View </th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($Todayleads as $value)
                                <tr>
                                    <td class="serial-number">{{ $loop->iteration }}</td>

                                    <td class="fw-bold text-nowrap ">{{ $value->name }}</td>
                                    <td class="fw-bold text-nowrap ">{{ $value->number }}</td>
                                    <td class="fw-bold">{{ $value->businessName1 }}</td>

                                    <td class="fw-bold">{{ $value->message }}</td>

                                    <td class="fw-bold">
                                        @if ($value->status == 1)
                                            <a class="fw-bold  btn btn-success"
                                                href="{{ URL::to('admin/lead/active', $value->id) }}">Active</a>
                                        @elseif ($value->status == 0)
                                            <a class="fw-bold btn btn-danger"
                                                href="{{ URL::to('admin/lead/inactive', $value->id) }}">Inactive</a>
                                        @else
                                            Unknown
                                        @endif
                                        <br />

                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.lead.index') }}" class="btn btn-primary btn-sm "
                                            title="View"><i class="la la-eye"
                                                style="font-size: 18px; margin-right: 5px;"></i>View</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        });
    </script>
@endsection
