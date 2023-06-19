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
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body class="light theme-white">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row" style="margin-top: -15px;margin-bottom: 25px;">
                        <div class="col-xl-4 col-md-12 col-lg-4 l-bg-green"
                            style="border-radius: 10px 0px 0px 10px;border-right: 2px solid #fff;">
                            <div class="">
                                <div class="card-body">
                                    <div class="text-white">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-5" style="color: #ffffff;">
                                                <h4 class="mb-0 font-26">
                                                    {{ round($not_direct_offers->sum('contract_cost') / 1000000, 2) }}
                                                    {{ 'مليون' }}
                                                </h4>
                                                <p class="mb-0">
                                                    <span class="font-20">
                                                        @if (
                                                            $not_direct_offers->sum('contract_cost') != 0 &&
                                                                $not_direct_offers->sum('contract_cost') > $not_direct_prev_offers->sum('contract_cost'))
                                                            {{ round((($not_direct_offers->sum('contract_cost') - $not_direct_prev_offers->sum('contract_cost')) / $not_direct_offers->sum('contract_cost')) * 100, 2) }}%
                                                        @else
                                                            0%
                                                        @endif
                                                    </span>
                                                    <i class="ion-connection-bars" data-pack="default"
                                                        data-tags="data, stats"></i>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-lg-7">
                                                <p class="lead"
                                                    style="font-weight: 500; color: #212529;line-height: 12px;"><i
                                                        class="ion-stats-bars" data-pack="default"
                                                        data-tags="data, stats"></i>الفرص الغير مباشرة</p>
                                                <br>
                                                <p class="mb-2" style="font-weight: 500; color: sandybrown;">
                                                    الزيادة السنوية<i class="ion-arrow-graph-up-right"
                                                        data-pack="default" data-tags="data, stats"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 col-lg-4 l-bg-green"
                            style="border-radius: 10px 10px 10px 10px;border-right: 2px solid #fff;border-left: 2px solid #fff;">
                            <div class="">
                                <div class="card-body">
                                    <div class="text-white">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-5" style="color: #ffffff;">
                                                <h4 class="mb-0 font-26">
                                                    {{ round($direct_offers->sum('contract_cost') / 1000000, 2) }}
                                                    {{ 'مليون' }}
                                                </h4>
                                                <p class="mb-0">
                                                    <span class="font-20">
                                                        @if (
                                                            $direct_offers->sum('contract_cost') != 0 &&
                                                                $direct_offers->sum('contract_cost') > $direct_prev_offers->sum('contract_cost'))
                                                            {{ round((($direct_offers->sum('contract_cost') - $direct_prev_offers->sum('contract_cost')) / $direct_offers->sum('contract_cost')) * 100, 2) }}%
                                                        @else
                                                            0%
                                                        @endif
                                                    </span>
                                                    <i class="ion-connection-bars" data-pack="default"
                                                        data-tags="data, stats"></i>
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-lg-7">
                                                <p class="lead"
                                                    style="font-weight: 500; color: #212529;line-height: 12px;"><i
                                                        class="ion-stats-bars" data-pack="default"
                                                        data-tags="data, stats"></i>الفرص المباشرة</p>
                                                <br>
                                                <p class="mb-2" style="font-weight: 500; color: sandybrown;"> الزيادة
                                                    السنوية<i class="ion-arrow-graph-up-right" data-pack="default"
                                                        data-tags="data, stats"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12 col-lg-4 l-bg-cyan"
                            style="border-radius: 0px 10px 10px 0px;border-left: 2px solid #fff;">
                            <div class="card-body">
                                <div class="text-white">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-5" style="color: #ffffff;">
                                            <h4 class="mb-0 font-26">
                                                {{ round($accepted_req->sum('capital') / 1000000, 2) }}
                                                {{ 'مليون' }}
                                            </h4>
                                            <p class="mb-0">
                                                <span class="font-20">
                                                    @if ($accepted_req->sum('capital') != 0 && $accepted_req->sum('capital') > $prev_year_req->sum('capital'))
                                                        {{ round((($accepted_req->sum('capital') - $prev_year_req->sum('capital')) / $accepted_req->sum('capital')) * 100, 2) }}%
                                                    @else
                                                        0%
                                                    @endif
                                                </span>
                                                <i class="ion-connection-bars" data-pack="default"
                                                    data-tags="data, stats"></i>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-lg-7">
                                            <p class="lead"
                                                style="font-weight: 500; color: #212529;line-height: 12px;"> <i
                                                    class="ion-stats-bars" data-pack="default"
                                                    data-tags="data, stats"></i>الاستثمار السنوي</p>
                                            <br>
                                            <p class="mb-2" style="font-weight: 500; color: sandybrown;">
                                                الزيادة السنوية<i class="ion-arrow-graph-up-right" data-pack="default"
                                                    data-tags="data, stats"></i></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="card-statistic-4">
                                    <div class="align-items-center justify-content-between">
                                        <div class="row ">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                                <div class="card-content">
                                                    <h5 class="font-14">قيمة الفرص</h5>
                                                    <h2 class="mb-3 font-18">
                                                        {{ round($not_direct_offers->sum('contract_cost') / 1000000, 2) }}
                                                        (مليون)
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
                                                    <h5 class="font-15">فرص منتهية</h5>
                                                    <h2 class="mb-3 font-18">{{ $not_direct_offers->count() }}</h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <a href="{{ route('offer') }}"><img src="images/pay.png"
                                                            alt=""></a>
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
                                                    <h2 class="mb-3 font-18">
                                                        {{ $req->where('technical_state', 1)->count() }}
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
                                                    <h5 class="font-14"> طلبات الاستثمار </h5>
                                                    <h2 class="mb-3 font-18">{{ $req->count() }}
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                                <div class="banner-img">
                                                    <a href="{{ route('single.report') }}"><img
                                                            src="images/project.png" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
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
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4>المشاريع</h4>
                                </div>
                                <div class="card-body">
                                    <div class="recent-report__chart">

                                        <div id="chart7"></div>
                                        <input type="hidden" name="data" value="{{ $orderChart['data'] }}">
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

    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!-- JS Libraies -->
    <!-- Template JS File -->
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/chart-apexcharts.js"></script>
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
