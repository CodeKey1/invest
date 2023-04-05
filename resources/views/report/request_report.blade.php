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
                            <form action="{{ route('req_report') }}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    <button type="submit" class="text-white btn-dark col-2">عرض</button>
                                    <select class="form-control col-2" name="city" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            المدينة
                                        </option>
                                        <option style="font-weight: bolder" value="IS NOT NULL">
                                            كل المدن
                                        </option>
                                        @isset($city)
                                            @if ($city && $city->count() > 0)
                                                @foreach ($city as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                    <select class="form-control col-2" name="owner_type" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            فئة المالك
                                        </option>
                                        <option style="font-weight: bolder" value="IS NOT NULL">كل الفئات</option>
                                        <option value="شركة">شركات</option>
                                        <option value="مواطن">افراد</option>
                                    </select>
                                    <select class="form-control col-2" name="sub_cat" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            الفئة
                                        </option>
                                        <option style="font-weight: bolder" class="option all_option"
                                            value="IS NOT NULL">
                                            كل الفئات
                                        </option>
                                        @isset($sub_cat)
                                            @if ($sub_cat && $sub_cat->count() > 0)
                                                @foreach ($sub_cat as $item)
                                                    <option class="option cat-{{ $item->category_id }}"
                                                        value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                    <select class="form-control col-2" id="cat_select" name="category" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            الفئة
                                        </option>
                                        <option style="font-weight: bolder" value="IS NOT NULL">
                                            كل الفئات
                                        </option>
                                        @isset($category)
                                            @if ($category && $category->count() > 0)
                                                @foreach ($category as $item)
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
                @isset($request_detail)
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
                                            <h3>تقرير لمزاد ""
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            اسم المزاد : </th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->name }}
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            تاريخ المزاد : </th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->date }}
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            عدد الاطروحات :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->offer_count }}
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
                                                                    {{ $offerDetail1->cost_sum }}
                                                                @endforeach
                                                            @endisset
                                                            جنيه
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px;">
                                                            عدد الاصول :</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($offerDetail)
                                                                @foreach ($offerDetail as $offerDetail1)
                                                                    {{ $offerDetail1->asset_count }}
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>نوع المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        <th>المدينة</th>
                                                        <th>المواقع المقترحة</th>
                                                        <th>الحالة</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail)
                                                    @if ($request_detail && $request_detail->count() > 0)
                                                        @foreach ($request_detail as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->owner_name }}</td>
                                                                    <td>{{ $item->phone }}</td>
                                                                    <td>{{ $item->size }}</td>
                                                                    <td>{{ $item->size_type }}</td>
                                                                    <td>{{ $item->capital }}</td>
                                                                    <td>{{ $item->self_financing }}</td>
                                                                    <td>{{ $item->recived_date }}</td>
                                                                    <td>{{ $item->city->name }}</td>
                                                                    <td>
                                                                        @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                            {{ $item1->Req_place->name }} -
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        @if ($item->state)
                                                                            <span style="color: green">فعال</span>
                                                                        @else
                                                                            <span style="color: red">غير فعال</span>
                                                                        @endif
                                                                    </td>
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
        $('.option').hide();
        $('#cat_select').on('change', function(e) {
            $('.option').hide();
            $('.cat-' + e.target.value).show();
            $('.all_option').show();
            //$("div.id_100 select").val("all").change();
        });
    </script>
</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
