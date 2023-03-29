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
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>E
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4> اضافة ملف صادر جديد </h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('export') }}" class="btn btn-warning">كل الوارد</a>
                                                <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                              </div>
                                            {{-- <button class="btn btn-dark"
                                                style="position: absolute; left: 10px; top:5px"><a
                                                    class="nav-link text-white"
                                                    href="#">عودة</a></button> --}}
                                        </div>
                                    </div>
                                    <div class="card card-secondary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>رقم الصادر</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="agr_name"
                                                        class="form-control"placeholder="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> اسم الجهات الصادر اليها</label>
                                                    <select class="form-control select2" style="width: 100% !important;" multiple="" name="region">
                                                        @isset($side)
                                                            @if ($side && $side->count() > 0)
                                                                @foreach ($side as $sides)
                                                                    <option value="{{ $sides->side_name }}"> {{ $sides->side_name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>عنوان الملف الصادر</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="agr_name"
                                                        class="form-control"placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label> الموظف المكلف بالملف</label>
                                                    <select class="form-control select2" style="width: 100% !important;" multiple="" name="region">
                                                        <option value="" disabled selected>اختر الموظف</option>
                                                        <option value="" >1 الموظف</option>
                                                        <option value="" >2 الموظف</option>
                                                        <option value="" >3 الموظف</option>
                                                        <option value="" >4 الموظف</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> تاريخ استلام الصادر </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="agr_name"
                                                        class="form-control"placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>اضافة ملاحظات</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="agr_name"
                                                        class="form-control"placeholder="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success" style="float: left;" >حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
                        </div>
                    </div>
            </div>
            </section>
            @include('layouts.setting')
        </div>
        @include('layouts.footer')
    </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
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
    <script>
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
