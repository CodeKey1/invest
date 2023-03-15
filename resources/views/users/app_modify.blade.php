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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="gov_name" class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                            <label> اختر المركز</label>
                                                            <select class="form-control" name="gov">
                                                                <option value="" hidden disabled selected>اختر
                                                                    المركز
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اسم المدينة</label>
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="city_name" class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                        <th>اسم المركز</th>
                                                                        <th>اسم المدينة</th>
                                                                        <th>عدد المناطق</th>
                                                                        <th>تفاصيل</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                            <select class="form-control" name="gov">
                                                                <option value="" hidden disabled selected>اختر
                                                                    المركز
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اختر المدينة</label>
                                                            <select class="form-control" name="ciry">
                                                                <option value="" hidden disabled selected>اختر
                                                                    المدينة
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اسم المنطقة</label>
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="area_name" class="form-control"placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اختر نوع المنطقة</label>
                                                            <select class="form-control" name="ciry">
                                                                <option value="" hidden disabled selected>اختر
                                                                    نوع المنطقة
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="p_category_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                            <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="home-tab">
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
                                            role="tab" aria-controls="license" aria-selected="false">موافقات</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Clicense-tab" data-toggle="tab" href="#Clicense"
                                            role="tab" aria-controls="Clicense" aria-selected="false">موافقة كل
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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="category_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                        <th>تفاصيل</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                <h4>المدن</h4>
                                            </div>
                                            <div class="card-body" style="direction: rtl">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group col-md-12">
                                                            <label> اختر الفئة</label>
                                                            <select class="form-control" name="gov">
                                                                <option value="" hidden disabled selected>اختر
                                                                    الفئة
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اسم الفئة الفرعية</label>
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="sub_category_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="license_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                        <th>عدد الفئات</th>
                                                                        <th>تفاصيل</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                <h4>المدن</h4>
                                            </div>
                                            <div class="card-body" style="direction: rtl">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group col-md-12">
                                                            <label> اختر الفئة</label>
                                                            <select class="form-control" name="category">
                                                                <option value="" hidden disabled selected>اختر
                                                                    الفئة
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label> اختر الموافقات</label>
                                                            <select class="form-control select2" multiple=""
                                                                name="category_license" style="width: 100%">
                                                                {{-- <option value="" hidden disabled selected>اختر
                                                                    الموافقات
                                                                </option> --}}
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                        <th>اسم الفئة</th>
                                                                        <th>اسم الموافقة</th>
                                                                        <th>تفاصيل</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                            <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="contract-tab" data-toggle="tab"
                                            href="#contract" role="tab" aria-controls="contract"
                                            aria-selected="true">نوع العقود</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="assets-tab" data-toggle="tab" href="#assets"
                                            role="tab" aria-controls="assets" aria-selected="true">نوع الاصول</a>
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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="contract_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
                                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                                name="assets_category_name"
                                                                class="form-control"placeholder="">
                                                        </div>
                                                        <button type="submit" class="btn btn-success"
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
                                                                        <th>تفاصيل</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>
                                                                            <a class="btn btn-icon btn-success"
                                                                                href="" ata-toggle="tooltip"
                                                                                data-placement="top"
                                                                                title="عرض وتعديل"><i
                                                                                    class="fas fa-user"></i></a>
                                                                            <a class="btn btn-icon btn-danger"
                                                                                href="#"><i
                                                                                    class="fas fa-times"></i></a>
                                                                        </td>
                                                                    </tr>
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
        </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
