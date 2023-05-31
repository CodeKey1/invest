<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css" />
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/components.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2dbd33348671a769597f', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('user-notification');
        channel.bind('my-notification', function(data) {
            toastr.success(JSON.stringify(data));
        });
    </script>
    <style>
        .col-xl-3 .card {
            border-radius: 68px;
            background: linear-gradient(to left, #183242, #2c5875, #fff);
            background: #2c587526;
        }

        .col-xl-3 .card .card-statistic-4 {
            padding: 0;
        }

        .col-xl-3 .card .card-content {
            margin-top: 10%;
        }
    </style>
</head>

<body class="light theme-white">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-15">الإطروحات</h5>
                                                    <h2 class="mb-3 font-18">{{ $offers->count() }}</h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="images/pay.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-14"> المزادات</h5>
                                                    <h2 class="mb-3 font-18">
                                                        {{ $auctions->count() }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="images/money.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-14">الطلبات المنتهية</h5>
                                                    <h2 class="mb-3 font-18">{{ $req->where('state', 1)->count() }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="images/end.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-14"> طلبات الإستثمار</h5>
                                                    <h2 class="mb-3 font-18">{{ $req->count() }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <img src="images/project.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>المشاريع</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart1">
                                        <input type="hidden" name="pending" value="{{ $users['pending'] }}">
                                        <input type="hidden" name="rejected" value="{{ $users['rejected'] }}">
                                        <input type="hidden" name="finished" value="{{ $users['finished'] }}">
                                        <input type="hidden" name="month" value="{{ $users['month'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>طلبات الإستثمار المتأخرة</h4>

                                    <div class="card-header-action">
                                        @if (auth()->user()->hasRole('super_admin') ||
    auth()->user()->hasRole('user'))
                                            <a href="{{ route('investment') }}" class="btn btn-primary">كل طلبات
                                                الإستثمار</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body" style="direction: rtl;">
                                    <div class="table-responsive">
                                        <table class="table" id="save-stage" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th>الطلب</th>
                                                    <th>مقدم الطلب</th>
                                                    <th>التاخير</th>
                                                    <th>تاريخ الطلب</th>
                                                    <th>عرض</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($delaiy_req)
                                                    @if ($delaiy_req && $delaiy_req->count() > 0)
                                                        @foreach ($delaiy_req as $d => $delaiy)
                                                            <tr>
                                                                <td> {{ $d + 1 }} </td>
                                                                <td> {{ $delaiy->name }} </td>
                                                                <td> {{ $delaiy->owner_name }} </td>
                                                                <td> {{ $delaiy->created_at->diffInDays($now) }} يوم </td>
                                                                <td> {{ $delaiy->recived_date->format('Y-M-d') }} </td>
                                                                @if (auth()->user()->hasRole('super_admin') ||
    auth()->user()->hasRole('user'))
                                                                    <td><a class="btn btn-icon btn-info"
                                                                            href="{{ route('investment.record', $delaiy->id) }}"
                                                                            ata-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="fas fa-info"></i>
                                                                        </a></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </section>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/js/page/widget-data.js"></script>
    <!-- Template JS File -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-apexcharts.js"></script>
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <!-- Page Specific JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
