<!DOCTYPE html>
<html lang="en">
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <style>
        @media print {
            #print_Button {
                display: none;
            }

            #DataTables_Table_0_filter {
                display: none;
            }

            #DataTables_Table_0_length {
                display: none;
            }

            #DataTables_Table_0_paginate {
                display: none;
            }

            #DataTables_Table_0_info {
                display: none;
            }
        }
    </style>
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('auctionReport') }}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <button type="submit" class="text-white btn-dark col-1">عرض</button>
                                    <select class="form-control col-9" name="auction">
                                        <option value="" hidden disabled selected>
                                            اختر
                                            المزاد
                                        </option>
                                        @isset($auction)
                                            @if ($auction && $auction->count() > 0)
                                                @foreach ($auction as $auction1)
                                                    <option value="{{ $auction1->id }}">
                                                        {{ $auction1->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                    <h6 class="col-2">اختر المزاد</h6>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @isset($offer)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            <img width="80px" height="100px" src="../images/logo/aswan.png">

                            <img width="80px" height="100px" src="../images/logo/logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    @include('layouts.success')
                                    @include('layouts.error')
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير اجمالي لمزاد "@isset($offer)
                                                    {{ $offer->auction_name->name }}
                                                @endisset"</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            اسم المزاد : </th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offer)
                                                                {{ $offer->auction_name->name }}
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            تاريخ المزاد : </th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offer)
                                                                {{ $offer->auction_name->date }}
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            عدد الاطروحات :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offer)
                                                                {{ $offer->id->count() }}
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            اجمالي المبلغ :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offer)
                                                                {{ $offer->asset_name->contract_cost->sum() }}
                                                            @endisset
                                                            جنيه
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px;">
                                                            عدد الاصول :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offer)
                                                                {{ $offer->asset_name->id->count() }}
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>المستفيد</th>
                                                        <th>الهاتف</th>
                                                        <th>اسم الاصل</th>
                                                        <th>عنوان الاصل</th>
                                                        <th>نوع التعاقد</th>
                                                        <th>تكلفة التعاقد</th>
                                                        <th>مدة التعاقد</th>
                                                        <th>ت. الاستلام</th>
                                                        <th>ت. الاشغال</th>
                                                        <th>حالة العقد</th>
                                                        <th>ملاحظات</th>
                                                    </tr>
                                                </thead>
                                                @isset($offer)
                                                    @if ($offer && $offer->count() > 0)
                                                        @foreach ($offer as $offer1)
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $offer1->investor }}</td>
                                                                    <td>{{ $offer1->number }}</td>
                                                                    <td>{{ $offer1->asset_name->name }}</td>
                                                                    <td>{{ $offer1->asset_name->address }}</td>
                                                                    <td>{{ $offer1->asset_name->contract_type->name }}</td>
                                                                    <td>{{ $offer1->asset_name->contract_cost }}</td>
                                                                    <td>{{ $offer1->asset_name->contract_period }}</td>
                                                                    <td>{{ $offer1->recived }}</td>
                                                                    <td>{{ $offer1->work_date }}</td>
                                                                    <td>
                                                                        @if ($offer1->status)
                                                                            <span>فعال</span>
                                                                        @else
                                                                            <span style="color: red">غير فعال</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $offer1->note }}</td>
                                                                </tr>
                                                            </tbody>
                                                        @endforeach
                                                    @endif
                                                @endisset
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-right d-flex">
                                    <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                        onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                                </div>
                            </div>
                        </div>
                    </section>
                @endisset
            </div>
            @include('layouts.setting')
        </div>
        @include('layouts.footer')
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="assets/bundles/izitoast/js/iziToast.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/toastr.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
