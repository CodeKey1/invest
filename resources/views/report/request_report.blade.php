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
    <style>
        @media screen {
            div.divFooter {
                display: none;
            }
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
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <select class="form-control col-12" id="report_type" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            نوع التقرير
                                        </option>
                                        <option value="all">المدينة وفئة الطلب</option>
                                        <option value="city">المدن</option>
                                        <option value="cat">فئة الطلبات</option>
                                        <option value="size">المساحة</option>
                                        <option value="capital">رأس المال</option>
                                        <option value="date">التاريخ</option>
                                    </select>
                                </div>
                            </div>
                            <form class="report all" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    {{-- <button type="submit" name='action' value='all'
                                        class="text-white btn-dark col-1">عرض الكل</button> --}}
                                    <button type="submit" name='action' value='all'
                                        class="btn-dark col-3">عرض</button>
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
                                                    <option value="={{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                    <select class="form-control col-2" name="category" required>
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
                                                    <option value="={{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        @endisset
                                    </select>
                                </div>
                            </form>
                            <form class="report city" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    <button type="submit" name='action' value='city'
                                        class="btn-dark col-3">عرض</button>
                                    <select class="form-control col-2" name="city_id" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            المدينة
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
                                </div>
                            </form>
                            <form class="report category" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    <button type="submit" name='action' value='cat'
                                        class="btn-dark col-3">عرض</button>
                                    <select class="form-control col-2" name="category_id" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            فئة الطلب
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
                            <form class="report size" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row"
                                    style="display: flex; justify-content: space-around;  align-items: center ">
                                    <div class="form-group col-md-3">
                                        <button type="submit" style="height: calc(2.25rem + 6px); color:white"
                                            name='action' value='size' class="btn-dark form-control">عرض</button>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>نوع المساحة</label>
                                        <select class="form-control" name="size_type" required>
                                            <option value="" hidden disabled selected>
                                                اختر
                                                نوع المساحة
                                            </option>
                                            <option value="متر مربع">
                                                متر مربع
                                            </option>
                                            <option value="فدان">
                                                فدان
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>المساحة الى </label>
                                        <input style="height: calc(2.25rem + 6px);" type="number" name="end_size"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>المساحة من </label>
                                        <input style="height: calc(2.25rem + 6px);" type="number" name="start_size"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </form>
                            <form class="report capital" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="display: flex; justify-content: space-around ">
                                    <button type="submit" name='action' value='capital'
                                        class="btn-dark col-3">عرض</button>
                                    <select class="form-control col-2" name="capital" required>
                                        <option value="" hidden disabled selected>
                                            اختر
                                            حجم رأس المال
                                        </option>
                                        <option value="small">
                                            مليون او اقل
                                        </option>
                                        <option value="mediam">
                                            من مليون الى 5 مليون
                                        </option>
                                        <option value="large">
                                            اكبر من 5 مليون
                                        </option>
                                    </select>
                                </div>
                            </form>
                            <form class="report date" action="{{ route('req_report') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row"
                                    style="display: flex; justify-content: space-around; align-items: center">
                                    <div class="form-group col-md-3">
                                        <button type="submit" style="height: calc(2.25rem + 6px); color:white"
                                            name='action' value='date' class="btn-dark form-control">عرض</button>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label> تاريخ النهاية</label>
                                        <input style="height: calc(2.25rem + 6px);" type="date" name="end_date"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label> تاريخ البداية</label>
                                        <input style="height: calc(2.25rem + 6px);" type="date" name="start_date"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @isset($request_detail_all)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير الطلبات
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody class="tbody">
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px; ">
                                                            الفئة:</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($category_name)
                                                                @foreach ($category_name as $item)
                                                                    {{ $item->name }} -
                                                                @endforeach
                                                            @endisset
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 50px;">
                                                        <th scope="row" style="text-align: inherit;width: 130px;">
                                                            المدينة:</th>
                                                        <td style="text-align: inherit;">
                                                            @isset($city_name)
                                                                @foreach ($city_name as $item)
                                                                    {{ $item->name }} -
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
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        <th>الفئة</th>
                                                        {{-- <th>الفئة الفرعية</th> --}}
                                                        <th>المدينة</th>
                                                        <th class="info">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_all)
                                                    @foreach ($request_detail_all as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->categoryname->name }}</td>
                                                                <td>{{ $item->city->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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
                @isset($request_detail_city)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير طلبات الاستثمار لمدينة {{ $name->name }}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        <th>الفئة</th>
                                                        <th class="info">تفاصيل</th>
                                                        {{-- <th>الفئة الفرعية</th>
                                                        <th>المدينة</th> --}}
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_city)
                                                    @foreach ($request_detail_city as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->categoryname->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td>
                                                                    <td>{{ $item->city->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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
                @isset($request_detail_cat)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير فئات الطلبات الاستثمارية {{ $name->name }}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        {{-- <th>الفئة</th> --}}
                                                        {{-- <th>الفئة الفرعية</th> --}}
                                                        <th>المدينة</th>
                                                        <th class="info">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_cat)
                                                    @foreach ($request_detail_cat as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                {{-- <td>{{ $item->categoryname->name }}</td> --}}
                                                                <td>{{ $item->city->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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
                @isset($request_detail_size)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير الطلبات الاستثمارية للمساحة
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <h5>المساحات من {{ $start_size }} {{ $size_type }} الى
                                                {{ $end_size }} {{ $size_type }} </h5>
                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        <th>الفئة</th>
                                                        {{-- <th>الفئة الفرعية</th> --}}
                                                        <th>المدينة</th>
                                                        <th class="info">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_size)
                                                    @foreach ($request_detail_size as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->categoryname->name }}</td>
                                                                <td>{{ $item->city->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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
                @isset($request_detail_capital)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير الفئات السعرية لطلبات الاستثمار {{ $name }}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        <th>الفئة</th>
                                                        {{-- <th>الفئة الفرعية</th> --}}
                                                        <th>المدينة</th>
                                                        <th class="info">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_capital)
                                                    @foreach ($request_detail_capital as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->categoryname->name }}</td>
                                                                <td>{{ $item->city->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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
                @isset($request_detail_date)
                    <section class="section" id="print">
                        <div id="centerlogo"
                            style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                            {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                            <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                            <img width="120px" height="120px" src="../images/logo/new_logo.png">
                        </div>
                        <div class="section-body">
                            <div class="row" style="direction: rtl">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card card-primary work-xp">
                                        <div class="card-header">
                                            <h3>تقرير طلبات الاستثمار من {{ $start_date }} الى {{ $end_date }}
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered" style="margin-top: 50px;">
                                                <thead>
                                                    <tr>
                                                        <th>الطلب</th>
                                                        <th>مقدم الطلب</th>
                                                        <th>الهاتف</th>
                                                        <th>المساحة</th>
                                                        <th>راس المال</th>
                                                        <th>نسبة التمويل</th>
                                                        <th>ت. الطلب</th>
                                                        {{-- <th>المواقع المقترحة</th> --}}
                                                        <th>الحالة</th>
                                                        <th>الفئة</th>
                                                        {{-- <th>الفئة الفرعية</th> --}}
                                                        <th>المدينة</th>
                                                        <th class="info">تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                @isset($request_detail_date)
                                                    @foreach ($request_detail_date as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->owner_name }}</td>
                                                                {{-- <td>{{ $item->owner_type }}</td> --}}
                                                                <td>0{{ $item->phone }}</td>
                                                                <td>{{ $item->size }} {{ $item->size_type }}</td>
                                                                <td>{{ $item->capital ?? 'null' }} {{ $item->currency_type }}
                                                                </td>
                                                                <td>{{ $item->self_financing }}%</td>
                                                                <td>{{ $item->recived_date->format('Y-m-d') }}</td>
                                                                {{-- <td>
                                                                    @foreach (App\Models\Request_places::where('request_id', $item->id)->get() as $item1)
                                                                        {{ $item1->Req_place->name }} -
                                                                    @endforeach
                                                                </td> --}}
                                                                <td>
                                                                    @if ($item->technical_state == 1)
                                                                        <span style="color: green">مقبول</span>
                                                                    @elseif ($item->technical_state == 0)
                                                                        <span style="color: red">مرفوض</span>
                                                                    @else
                                                                        <span style="color: darkslategrey">جاري</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->categoryname->name }}</td>
                                                                <td>{{ $item->city->name }}</td>
                                                                <td class="info">
                                                                    <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $item->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                </td>
                                                                {{-- <td>{{ $item->subCat->name }}</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
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

            $('.info').hide();
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
        $('.option').hide();
        $('.report').hide();
        $('#cat_select').on('change', function(e) {
            $('.option').hide();
            var value = e.target.value;
            value = value.replace('=', '')
            $('.cat-' + value).show();
            $('.all_option').show();
            //$("div.id_100 select").val("all").change();
        });
        $('#report_type').on('change', function(e) {
            $('.report').hide();
            switch (e.target.value) {
                case "all":
                    $('.all').show();
                    break;
                case "city":
                    $('.city').show();
                    break;
                case "cat":
                    $('.category').show();
                    break;
                case "size":
                    $('.size').show();
                    break;
                case "capital":
                    $('.capital').show();
                    break;
                case "date":
                    $('.date').show();
                    break;
            }
        });
    </script>
</body>
<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
