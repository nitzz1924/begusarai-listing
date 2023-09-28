@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class=" fs-5 mb-2 fw-bold"><b>All Entries</b></div>
                <div class="row row-cols-1 row-cols-md-2 ">

                    <div class="col-xl-6 col-md-3 mb-3">
                        <a class="text-decoration-none" href="{{ route('admin.listing.index') }}">
                            <div class="card   widget-content zoom-on-hover" style="background-color: #1F77B4">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class=" fs-5 fw-bold">Total Listings</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white">{{ count($Result) }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-xl-6 col-md-3 mb-3">

                        <a class="text-decoration-none" href="{{ route('admin.listing.index') }}">

                            <div class="card   widget-content zoom-on-hover" style="background-color: #FF7F0E">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class=" fs-5 fw-bold">Total Active Plans</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white">{{ $activePlans }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-md-3 mb-3">

                        <a class="text-decoration-none" href="{{ route('admin.users.index') }}">
                            <div class="card   widget-content zoom-on-hover" style="background-color: #2CA02C;">

                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class=" fs-5 fw-bold">Total Users</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white">{{ $userCount }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-6 col-md-3 mb-3">

                        <a class="text-decoration-none" href="{{ route('admin.lead.index') }}">
                            <div class="card   widget-content  zoom-on-hover" style="background-color: #D62728;">
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class=" fs-5 fw-bold text-white">Total Leads</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">{{ count($lead) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="donut-chart"></div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class=" fs-5 mb-2 fw-bold"><b>Today's New Entry</b></div>
            <div class="row">

                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="card   widget-content zoom-on-hover gradient-bg">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class=" fs-5 mb-2 fw-bold">Today's Listings</div>
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

                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="card   widget-content zoom-on-hover gradient-bg">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class=" fs-5 mb-2 fw-bold">Today's Leads</div>
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

                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="card   widget-content gradient-bg zoom-on-hover">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class=" fs-5 mb-2 fw-bold">Today's new User</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    {{ $CurrentUserCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="card   widget-content gradient-bg zoom-on-hover">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class=" fs-5 fw-bold">Today's new Active Plan</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white">
                                    {{ $CurrentActivePlan }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">


        <div class="row ">
            <div class="col-md-6">
                <div class="main-card   card px-2 py-3">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered " style="width:100%">
                            <thead class="table-dark">
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
                                                        <div class=" fs-5  fw-bold">{{ $value->businessName }}</div>
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
                                                class="btn btn-primary d-flex btn-sm " title="View"><i class="la la-eye"
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

            <div class="col-md-6 ">
                <div class="main-card   card px-2 py-3">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered " style="width:100%">
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
                                            <a href="{{ route('admin.lead.index') }}" class="btn btn-primary d-flex btn-sm "
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
    </div>
    <!-- Add this code to your HTML file -->

    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sample data
            let chartData = [
                ["Total Listings", {{ count($Result) }}],
                ["Total Active Plans", {{ $activePlans }}],
                ["Total Users", {{ $userCount }}],
                ["Total Leads", {{ count($lead) }}],
            ];
            let totalValue = chartData.reduce((sum, dataPoint) => sum + dataPoint[1], 0);

            let chart = bb.generate({
                data: {
                    columns: chartData,
                    type: "donut",
                    onclick: function(d, i) {
                        console.log("onclick", d, i);
                    },
                    onover: function(d, i) {
                        console.log("onover", d, i);
                    },
                    onout: function(d, i) {
                        console.log("onout", d, i);
                    },
                },
                donut: {
                    title: totalValue.toString(), // Set the total value as the title
                },
                bindto: "#donut-chart",
            });
        });
    </script>

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
