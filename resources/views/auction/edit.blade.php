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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
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
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>تعديل المزاد ({{ $auction->name }})</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('auction') }}" class="btn btn-success">عودة</a>
                                        </div>
                                    </div>
                                </div>
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('auction.update', $auction->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="form-group col-md-12">
                                                <label> اسم المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    value="{{ $auction->name }}" class="form-control" disabled>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    name="name" class="form-control" value="{{ $auction->name }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> تاريخ المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="date"
                                                    value="{{ $auction->date->format('Y-m-d') }}" class="form-control"
                                                    disabled>
                                                <input style="height: calc(2.25rem + 6px);" type="date"
                                                    name="date" class="form-control"
                                                    value="{{ $auction->date->format('Y-m-d') }}" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> عنوان المزاد</label>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    value="{{ $auction->label }}" class="form-control" disabled>
                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                    name="label" class="form-control" value="{{ $auction->label }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>ملاحظات</label>
                                                <textarea class="form-control" cols="10" rows="5" disabled>{{ $auction->note }}</textarea>
                                                <textarea class="form-control" name="note" cols="10" rows="5">{{ $auction->note }}</textarea>
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
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
