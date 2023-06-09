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
                                        <h4>اضافة ترسية جديد</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('offer') }}" class="btn btn-success">عودة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <form class="needs-validation" novalidate="" action="{{ route('offer.Store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                @isset($auction)
                                                    <div class="form-group col-md-4">
                                                        <label> اختر المزاد <span style="color: red">*</span></label>
                                                        <select class="form-control" name="auction" required>
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
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label> اختر المدينة <span style="color: red">*</span></label>
                                                        <select class="form-control" id="cityselect" name="city"
                                                            required>
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
                                                    <div class="form-group col-md-4">
                                                        <label> اختر الاصل <span style="color: red">*</span></label>
                                                        <select class="form-control" name="asset" required>
                                                            <option value="" hidden disabled selected>
                                                                اختر
                                                                الاصل
                                                            </option>
                                                            @isset($assets)
                                                                @if ($assets && $assets->count() > 0)
                                                                    @foreach ($assets as $assets1)
                                                                        <option class="option asset-{{ $assets1->city_id }}"
                                                                            value="{{ $assets1->id }}">
                                                                            {{ $assets1->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                @endisset
                                                @isset($direct)
                                                    <div class="form-group col-md-6">
                                                        <label> اختر المدينة <span style="color: red">*</span></label>
                                                        <select class="form-control" id="cityselect" name="city"
                                                            required>
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
                                                    <div class="form-group col-md-6">
                                                        <label> اختر الاصل <span style="color: red">*</span></label>
                                                        <select class="form-control" name="asset" required>
                                                            <option value="" hidden disabled selected>
                                                                اختر
                                                                الاصل
                                                            </option>
                                                            @isset($assets)
                                                                @if ($assets && $assets->count() > 0)
                                                                    @foreach ($assets as $assets1)
                                                                        <option class="option asset-{{ $assets1->city_id }}"
                                                                            value="{{ $assets1->id }}">
                                                                            {{ $assets1->name }}
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                @endisset
                                                <div class="form-group col-md-4">
                                                    <label>اسم المستفيد <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="investor" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>رقم الهاتف <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="phone" minlength="10" maxlength="11"
                                                        class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الاستلام <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="recived" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>محضر الاستلام <span style="color: red">*</span> <span
                                                            style="color: red">pdf او word بحد اقصي 1
                                                            ميجا</span> </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="file"
                                                        name="delivery_record" accept=",.doc, .docx, .pdf, image/*"
                                                        class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الاشغال <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="work_date" class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة الزيادة </label>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="increase_rate"
                                                        class="form-control"placeholder="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع التعاقد <span style="color: red">*</span></label>
                                                    <select class="form-control" name="contract_type" required>
                                                        <option value="" hidden disabled selected>
                                                            اختر
                                                            نوع التعاقد
                                                        </option>
                                                        @isset($contract_type)
                                                            @if ($contract_type && $contract_type->count() > 0)
                                                                @foreach ($contract_type as $contract_type1)
                                                                    <option value="{{ $contract_type1->id }}">
                                                                        {{ $contract_type1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>مدة العقد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="contract_period" class="form-control"placeholder="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>قيمة العقد <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="contract_cost"
                                                        class="form-control"placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>ملاحظات</label>
                                                    <textarea class="form-control" name="note" cols="10" rows="5"> </textarea>
                                                </div>

                                                <button type="submit" class="btn btn-success"
                                                    style="float: left;">حفظ</button>
                                            </div>
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
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $('.option').hide();
        $('#cityselect').on('change', function(e) {
            $('.option').hide();
            $('.asset-' + e.target.value).show();
        });
    </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
