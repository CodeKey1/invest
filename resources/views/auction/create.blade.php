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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>اضافة مزاد جديد</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('auction') }}"
                                                class="dropdown-item has-icon text-dark btn-warning"><i
                                                    class="fa-sharp fa-solid fa-circle-arrow-left"></i>عودة</a>
                                        </div>
                                    </div>
                                </div>
                                <form class="needs-validation" novalidate="" action="{{ route('auction.Store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="form-group col-md-12">
                                                <label> اسم المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    name="name" class="form-control"placeholder="" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> تاريخ المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="date"
                                                    name="date" class="form-control"placeholder="" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> عنوان المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    name="label" class="form-control"placeholder="" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>ملاحظات</label>
                                                <textarea class="form-control" name="note" cols="10" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success"
                                                style="float: left;">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
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

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
