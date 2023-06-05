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
        div.divFooter {
            display: none;
        }

        @media print {
            div.divFooter {
                position: fixed;
                bottom: 0;
                margin: 30px;
                width: 90%;
                justify-content: space-between;
                align-items: center;
                display: flex;
            }

            div.divFooter .logo {
                width: 5%;
            }

            #print_Button {
                display: none;
            }
        }

        .tbody {
            background-color: transparent !important;
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
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('auctionReport') }}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    <button type="submit" class="text-white btn-dark col-1">عرض</button>
                                    <select class="form-control col-2" name="type" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            نوع التقرير
                                        </option>
                                        <option value="all">الكل</option>
                                        <option value="active">الفعال</option>
                                        <option value="hold">الغير فعال</option>
                                    </select>
                                    <select class="form-control col-8" name="auction" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            المزاد
                                        </option>
                                        @isset($auction)
                                            @if ($auction && $auction->count() > 0)
                                                @foreach ($auction as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @isset($offer)
                    <section class="section" id="print">
                        <div class="divHeader" id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    @include('layouts.success')
                                    @include('layouts.error')
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير {{ $type }} لمزاد "@isset($auction_detail)
                                                    {{ $auction_detail->name }}
                                                @endisset"
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody class="tbody">
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            تاريخ المزاد : </th>
                                                        <td style="text-align: inherit;">
                                                            @isset($auction_detail)
                                                                {{ $auction_detail->date }}
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            عدد الاطروحات :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->offer_count ?? 'لا يوجد' }}
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            اجمالي المبلغ :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->cost_sum ?? '0' }}
                                                                @endforeach
                                                            @endisset
                                                            جنيه
                                                        </td>
                                                    </tr>
                                                    {{-- <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px;">
                                                            عدد الاصول :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->asset_count }}
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr> --}}
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
                                                                    <td>{{ $offer1->phone }}</td>
                                                                    <td>{{ $offer1->asset_name->name }}</td>
                                                                    <td>{{ $offer1->asset_name->address }}</td>
                                                                    <td>{{ $offer1->contract_type->name }}</td>
                                                                    <td>{{ $offer1->contract_cost }}</td>
                                                                    <td>{{ $offer1->contract_period }}</td>
                                                                    <td>{{ $offer1->recived }}</td>
                                                                    <td>{{ $offer1->work_date }}</td>
                                                                    <td>
                                                                        @if ($offer1->status)
                                                                            <span style="color: green">فعال</span>
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
                        <div class="divFooter">
                            <img src="../images/logo/logo.png" class="logo">
                            <h6 style="color: darkslategrey">&nbsp;&nbsp; جميع الحقوق محفوظة لمركز نظم المعلومات
                                والتحول الرقمي&nbsp;&nbsp;
                            </h6>
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
