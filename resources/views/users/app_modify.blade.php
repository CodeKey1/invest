<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <div class="card card-primary">
                    @include('layouts.success')
                    @include('layouts.error')
                    <div class="card-header">
                        <h4></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="setting-tab" data-toggle="tab" href="#setting"
                                    role="tab" aria-controls="setting" aria-selected="true">المناطق</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="project-tab" data-toggle="tab" href="#project" role="tab"
                                    aria-controls="project" aria-selected="true">المشاريع</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="area-tab" data-toggle="tab" href="#other" role="tab"
                                    aria-controls="area" aria-selected="false">اخرى</a>
                            </li>
                        </ul>
                        <form class="needs-validation" novalidate="" action="{{ route('app.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="setting" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="gov-tab" data-toggle="tab" href="#gov"
                                                role="tab" aria-controls="gov" aria-selected="true">محافظات</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="city-tab" data-toggle="tab" href="#city"
                                                role="tab" aria-controls="city" aria-selected="false">مدن</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="place-tab" data-toggle="tab" href="#place"
                                                role="tab" aria-controls="place" aria-selected="false">مناطق</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Pcategory-tab" data-toggle="tab" href="#Pcategory"
                                                role="tab" aria-controls="Pcategory" aria-selected="false">نوع
                                                المناطق</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="gov" role="tabpanel"
                                            aria-labelledby="gov-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>المحافظات</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم المحافظة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="gov_name"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="govbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول المحافظة</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم المركز</th>
                                                                            <th>عدد المدن</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($gov as $gove)
                                                                            <tr>
                                                                                <td>{{ $gove->id }}</td>
                                                                                <td>{{ $gove->name }}</td>
                                                                                <td>{{ $gove->cityname->count() }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href=""
                                                                                        ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
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
                                        </div>
                                        <div class="tab-pane fade" id="city" role="tabpanel"
                                            aria-labelledby="city-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>المدن</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اختر المحافظة</label>
                                                                <select class="form-control" name="gov">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        المحافظة
                                                                    </option>
                                                                    @isset($gov)
                                                                        @if ($gov && $gov->count() > 0)
                                                                            @foreach ($gov as $gov1)
                                                                                <option value="{{ $gov1->id }}">
                                                                                    {{ $gov1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اسم المدينة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="city_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="citybtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول المدن</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم المحافظة</th>
                                                                            <th>اسم المدينة</th>
                                                                            <th>عدد المناطق</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($city)
                                                                            @if ($city && $city->count() > 0)
                                                                                @foreach ($city as $city1)
                                                                                    <tr>
                                                                                        <td>{{ $city1->id }}</td>
                                                                                        <td>{{ $city1->govname->name }}</td>
                                                                                        <td>{{ $city1->name }}</td>
                                                                                        <td>{{ $city1->place_name->count() }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="place" role="tabpanel"
                                            aria-labelledby="place-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>المدن</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اختر المركز</label>
                                                                <select class="form-control" id="govselect"
                                                                    name="gov">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        المركز
                                                                    </option>
                                                                    @isset($gov)
                                                                        @if ($gov && $gov->count() > 0)
                                                                            @foreach ($gov as $gov1)
                                                                                <option value="{{ $gov1->id }}">
                                                                                    {{ $gov1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اختر المدينة</label>
                                                                <select class="form-control" name="city">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        المدينة
                                                                    </option>
                                                                    @isset($city)
                                                                        @if ($city && $city->count() > 0)
                                                                            @foreach ($city as $city1)
                                                                                <option
                                                                                    class="option city-{{ $city1->gov_id }}"
                                                                                    value="{{ $city1->id }}">
                                                                                    {{ $city1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اسم المنطقة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="area_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اختر نوع المنطقة</label>
                                                                <select class="form-control" name="areaType">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        نوع المنطقة
                                                                    </option>
                                                                    @isset($placeCat)
                                                                        @if ($placeCat && $placeCat->count() > 0)
                                                                            @foreach ($placeCat as $placeCat1)
                                                                                <option value="{{ $placeCat1->id }}">
                                                                                    {{ $placeCat1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="placebtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول ألمناطق</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم المركز</th>
                                                                            <th>اسم المدينة</th>
                                                                            <th>اسم المنطقة</th>
                                                                            <th>نوع المنطقة</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($place)
                                                                            @if ($place && $place->count() > 0)
                                                                                @foreach ($place as $place1)
                                                                                    <tr>
                                                                                        <td>{{ $place1->id }}</td>
                                                                                        <td>{{ $place1->cityname->govname->name }}
                                                                                        </td>
                                                                                        <td>{{ $place1->cityname->name }}
                                                                                        </td>
                                                                                        <td>{{ $place1->name }}</td>
                                                                                        <td>{{ $place1->placeCatname->name }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Pcategory" role="tabpanel"
                                            aria-labelledby="Clicense-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>فئات المناطق</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الفئة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="p_category_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="placeCategorybtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول الفئات</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم الفئة</th>
                                                                            <th>عدد المناطق</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($placeCat)
                                                                            @if ($placeCat && $placeCat->count() > 0)
                                                                                @foreach ($placeCat as $placeCat1)
                                                                                    <tr>
                                                                                        <td>{{ $placeCat1->id }}</td>
                                                                                        <td>{{ $placeCat1->name }}</td>
                                                                                        <td>{{ $placeCat1->placename->count() }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="project" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="category-tab" data-toggle="tab"
                                                href="#category" role="tab" aria-controls="category"
                                                aria-selected="true">فئات</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="subCategory-tab" data-toggle="tab"
                                                href="#subCategory" role="tab" aria-controls="subCategory"
                                                aria-selected="false">فئات
                                                فرعية</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="license-tab" data-toggle="tab" href="#license"
                                                role="tab" aria-controls="license"
                                                aria-selected="false">موافقات</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Clicense-tab" data-toggle="tab" href="#Clicense"
                                                role="tab" aria-controls="Clicense" aria-selected="false">موافقة
                                                كل
                                                فئة</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="category" role="tabpanel"
                                            aria-labelledby="category-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>فئات المشاريع</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الفئة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="category_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="catbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول الفئات</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم الفئة</th>
                                                                            <th>عدد الفئات الفرعية</th>
                                                                            <th>عدد الموافقات</th>
                                                                            {{-- <th>عدد المشاريع</th> --}}
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($category)
                                                                            @if ($category && $category->count() > 0)
                                                                                @foreach ($category as $category1)
                                                                                    <tr>
                                                                                        <td>{{ $category1->id }}</td>
                                                                                        <td>{{ $category1->name }}</td>
                                                                                        <td>{{ $category1->sub_cat->count() }}
                                                                                        </td>
                                                                                        <td>{{ $category1->cat_license->count() }}
                                                                                        </td>
                                                                                        {{-- <td>{{ $category1->cat_request->count() }}
                                                                                        </td> --}}
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="subCategory" role="tabpanel"
                                            aria-labelledby="subCategory-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>الفئات الفرعية</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اختر الفئة</label>
                                                                <select class="form-control" name="category">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        الفئة
                                                                    </option>
                                                                    @isset($category)
                                                                        @if ($category && $category->count() > 0)
                                                                            @foreach ($category as $category1)
                                                                                <option value="{{ $category1->id }}">
                                                                                    {{ $category1->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الفئة الفرعية</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="sub_category_name"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="subcatbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول الفئات الفرعية</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم الفئة</th>
                                                                            <th>اسم الفئة الفرعية</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($subcategory)
                                                                            @if ($subcategory && $subcategory->count() > 0)
                                                                                @foreach ($subcategory as $subcategory1)
                                                                                    <tr>
                                                                                        <td>{{ $subcategory1->id }}</td>
                                                                                        <td>{{ $subcategory1->cat_name->name }}
                                                                                        </td>
                                                                                        <td>{{ $subcategory1->name }}</td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="license" role="tabpanel"
                                            aria-labelledby="license-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>الموافقات</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الموافقة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="license_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="licensebtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول الموافقات</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم الموافقة</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($license)
                                                                            @if ($license && $license->count() > 0)
                                                                                @foreach ($license as $license1)
                                                                                    <tr>
                                                                                        <td>{{ $license1->id }}</td>
                                                                                        <td>{{ $license1->name }}</td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="Clicense" role="tabpanel"
                                            aria-labelledby="Clicense-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>موافقات كل فئة</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اختر الفئة</label>
                                                                <select class="form-control" name="category">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        الفئة
                                                                    </option>
                                                                    @isset($category)
                                                                        @if ($category && $category->count() > 0)
                                                                            @foreach ($category as $category1)
                                                                                <option value="{{ $category1->id }}">
                                                                                    {{ $category1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> اختر الموافقات</label>
                                                                <select class="form-control select2" multiple=""
                                                                    name="category_license[]" style="width: 100%">
                                                                    {{-- <option value="" hidden disabled selected>اختر
                                                                    الموافقات
                                                                </option> --}}
                                                                    @isset($license)
                                                                        @if ($license && $license->count() > 0)
                                                                            @foreach ($license as $license1)
                                                                                <option value="{{ $license1->id }}">
                                                                                    {{ $license1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="cLicensebtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول موافقات كل فئة</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>اسم الفئة</th>
                                                                            <th>اسم الموافقة</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($clicense)
                                                                            @if ($clicense && $clicense->count() > 0)
                                                                                @foreach ($clicense as $clicense1)
                                                                                    <tr>
                                                                                        <td>{{ $clicense1->license_cat->name }}
                                                                                        </td>
                                                                                        <td>{{ $clicense1->license->name }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="other" role="tabpanel"
                                    aria-labelledby="other-tab">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="contract-tab" data-toggle="tab"
                                                href="#contract" role="tab" aria-controls="contract"
                                                aria-selected="true">نوع العقود</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="assets-tab" data-toggle="tab" href="#assets"
                                                role="tab" aria-controls="assets" aria-selected="true">نوع
                                                الاصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="newAssets-tab" data-toggle="tab"
                                                href="#newAssets" role="tab" aria-controls="newAssets"
                                                aria-selected="true">اضافة
                                                اصول</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="contract" role="tabpanel"
                                            aria-labelledby="category-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>فئات العقود</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الفئة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="contract_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="contractbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول العقود</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>نوع العقد</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($contract)
                                                                            @if ($contract && $contract->count() > 0)
                                                                                @foreach ($contract as $contract1)
                                                                                    <tr>
                                                                                        <td>{{ $contract1->id }}</td>
                                                                                        <td>{{ $contract1->name }}</td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="assets" role="tabpanel"
                                            aria-labelledby="category-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>فئات الاصول</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الفئة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="assets_category_name"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="assetbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول فئات الاصول</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>نوع الفئة</th>
                                                                            <th>عدد الاصول</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($assets)
                                                                            @if ($assets && $assets->count() > 0)
                                                                                @foreach ($assets as $assets1)
                                                                                    <tr>
                                                                                        <td>{{ $assets1->id }}</td>
                                                                                        <td>{{ $assets1->name }}</td>
                                                                                        <td>{{ $assets1->asset_name->count() }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="newAssets" role="tabpanel"
                                            aria-labelledby="category-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>اضافة اصول</h4>
                                                </div>
                                                <div class="card-body" style="direction: rtl">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group col-md-12">
                                                                <label> اسم الاصل</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="asset_name"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> المدينة</label>
                                                                <select class="form-control" name="city_id">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        المدينة
                                                                    </option>
                                                                    @isset($city)
                                                                        @if ($city && $city->count() > 0)
                                                                            @foreach ($city as $city1)
                                                                                <option value="{{ $city1->id }}">
                                                                                    {{ $city1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> نوع الاصل</label>
                                                                <select class="form-control" name="asset_type">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        النوع
                                                                    </option>
                                                                    @isset($assets)
                                                                        @if ($assets && $assets->count() > 0)
                                                                            @foreach ($assets as $assets1)
                                                                                <option value="{{ $assets1->id }}">
                                                                                    {{ $assets1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> العنوان</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="asset_address"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> رقم الوحدة</label>
                                                                <input style="height: calc(2.25rem + 6px);"
                                                                    type="text" name="asset_number"
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label> نوع العقد</label>
                                                                <select class="form-control" name="contract_type">
                                                                    <option value="" hidden disabled selected>
                                                                        اختر
                                                                        النوع
                                                                    </option>
                                                                    @isset($contract)
                                                                        @if ($contract && $contract->count() > 0)
                                                                            @foreach ($contract as $contract1)
                                                                                <option value="{{ $contract1->id }}">
                                                                                    {{ $contract1->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endisset
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>ملاحظات</label>
                                                                <textarea class="form-control" name="note" cols="10" rows="5"></textarea>
                                                            </div>
                                                            <button type="submit" name="actionbtn"
                                                                class="btn btn-success" value="newAssetbtn"
                                                                style="float: left;">حفظ</button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="table-responsive">
                                                                <h6> جدول الاصول</h6>
                                                                <table class="table table-striped table-hover"
                                                                    style="width:100%;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> # </th>
                                                                            <th>اسم الاصل</th>
                                                                            <th>نوع الاصل</th>
                                                                            <th>نوع العقد</th>
                                                                            <th>المدينة</th>
                                                                            <th>العنوان</th>
                                                                            <th>تفاصيل</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($asset)
                                                                            @if ($asset && $asset->count() > 0)
                                                                                @foreach ($asset as $asset1)
                                                                                    <tr>
                                                                                        <td>{{ $asset1->id }}</td>
                                                                                        <td>{{ $asset1->name }}</td>
                                                                                        <td>{{ $asset1->asset_type->name }}
                                                                                        </td>
                                                                                        <td>{{ $asset1->contract_type->name }}
                                                                                        <td>{{ $asset1->city_name->name }}
                                                                                        <td>{{ $asset1->address }}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a class="btn btn-icon btn-success"
                                                                                                href=""
                                                                                                ata-toggle="tooltip"
                                                                                                data-placement="top"
                                                                                                title="عرض وتعديل"><i
                                                                                                    class="fas fa-user"></i></a>
                                                                                        </td>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script src="assets/js/page/datatables.js"></script>
        <script src="assets/bundles/datatables/datatables.min.js"></script>
        <!-- Custom JS File -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>

        <script>
            $(document).ready(function() {
                $('table.table').DataTable();
            });
            $('.option').hide();
            $('#govselect').on('change', function(e) {
                $('.option').hide();
                $('.city-' + e.target.value).show();
            });
        </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
