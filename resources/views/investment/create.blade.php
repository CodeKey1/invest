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
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
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
                <section class="section">

                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')


                                <div class="card">
                                    <div class="card-header">
                                        <h4>طلب الحصول علي موافقة لإقامت مشروع</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('investment') }}" class="btn btn-primary">ادارة
                                                الطلبات</a>
                                        </div>
                                        {{-- <button class="btn btn-dark"
                                                style="position: absolute; left: 10px; top:5px"><a
                                                    class="nav-link text-white"
                                                    href="#">عودة</a></button> --}}
                                    </div>

                                </div>
                                <form class="needs-validation" id="work_experience" novalidate=""
                                    action="{{ route('investment.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>فئة المشروع <span style="color: red">*</span></label>
                                                    <select class="form-control" id="project" name="category_id"
                                                        required>
                                                        <option disabled selected value="">اختر المشروع</option>
                                                        @isset($category)
                                                            @if ($category && $category->count() > 0)
                                                                @foreach ($category as $cat)
                                                                    <option value="{{ $cat->id }}">{{ $cat->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>الفئة الفرعية</label>
                                                    <select class="form-control" id="sub_cat" name="sub_category_id">
                                                        <option disabled selected>اختر الفئة الفرعية</option>
                                                        @isset($sub_cat)
                                                            @if ($sub_cat && $sub_cat->count() > 0)
                                                                @foreach ($sub_cat as $cat)
                                                                    <option class="option cat-{{ $cat->category_id }}"
                                                                        value="{{ $cat->id }}">{{ $cat->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label> اسم المشروع <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="name" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> الجهات للموافة علي المشرع <span
                                                            style="color: red">*</span></label>
                                                    <select class="form-control select2" multiple="" name="license[]"
                                                        style="width: 100%" required>
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
                                                <div class="form-group col-md-4">
                                                    <label>نوع مقدم الطلب <span style="color: red">*</span></label>
                                                    <select class="form-control" name="owner_type" required>
                                                        <option disabled selected value="">اختر مقدم الطلب
                                                        </option>
                                                        <option value="شركة">شركة</option>
                                                        <option value="مواطن">مواطن</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label> اسم الشركة / المواطن <span
                                                            style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="owner_name" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> العنوان <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="address" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> اسم المفوض </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="representative_name" class="form-control" value="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> بالتوكيل رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="representative_id" class="form-control" value="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بطاقة رقم \ جواز رقم</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="NID" class="form-control" maxlength="14"
                                                        minlength="9">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تليفون <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        pattern="\d*" name="phone" maxlength="11" minlength="10"
                                                        class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> مساحة المشروع <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="size" class="form-control" step="0.1"
                                                        placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع المساحة <span style="color: red">*</span></label>
                                                    <select class="form-control" name="size_type" required>
                                                        <option disabled selected value="">اختر نوع المساحة
                                                        </option>
                                                        <option value="متر">متر مربع</option>
                                                        <option value="فدان">فدان</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>برأسمال قيمته </label>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="capital" class="form-control"
                                                        placeholder="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>فئة العملة</label>
                                                    <select class="form-control" name="currency_type">
                                                        <option value="EGP">جنيه</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EUR">EUR</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة التمويل الذاتي </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        min="0" max="100" step="0.1"
                                                        name="Self_financing" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ تقديم الطلب <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="recived_date" class="form-control" placeholder=""
                                                        required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة <span style="color: red">*</span></label>
                                                    <select class="form-control" id="city_id" name="city_id"
                                                        required>
                                                        <option disabled selected value="">اختر المدينة</option>
                                                        @isset($city)
                                                            @if ($city && $city->count() > 0)
                                                                @foreach ($city as $City)
                                                                    <option value="{{ $City->id }}">
                                                                        {{ $City->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label>المواقع المقترحة لإقامة المشروع بالمحافظة</label>
                                                    <select class="form-control select2" multiple id="area"
                                                        name="region[]" style="width: 100%">
                                                        @isset($place)
                                                            @if ($place && $place->count() > 0)
                                                                @foreach ($place as $Place)
                                                                    <option
                                                                        class="coption city-{{ $Place->cityname->id }} type-{{ $Place->placeCatname->id }}"
                                                                        value="{{ $Place->id }}">
                                                                        {{ $Place->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> وصف المشروع <span style="color: rgba(255, 0, 0, 0.486)">بحد
                                                            اقصى 200
                                                            كلمة</span></label>
                                                    <textarea class="form-control" name="description" cols="30" rows="5" maxlength="200"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div>
                                                <label for="" style="text-align:center">الملفات المرفقة
                                                    بالطلب</label>
                                                <hr style="border-top: 1px solid rgb(0 0 0 / 31%); width: 76%;" />
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for=""> عقد نأسيس (الشركة/ منشأة فرد)
                                                    </label>
                                                    <input type="file" name="company_reg" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> السجل التجاري </label>
                                                    <input type="file" name="tax_card" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> البطاقة الضريبية </label>
                                                    <input type="file" name="commercial_register"
                                                        class="form-control" style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> صورة البطاقة </label>
                                                    <input type="file" name="nid_photo" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> مستنادات الملاءة المالية </label>
                                                    <input type="file" name="financial_capital"
                                                        class="form-control" style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> كروكي الموقع المختار واحداثياته
                                                    </label>
                                                    <input type="file" name="site_sketch" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> دراسة جدوي للمشروع </label>
                                                    <input type="file" name="feasibility_study"
                                                        class="form-control" style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">محضر الجلسة</label>
                                                    <input type="file" name="record" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success"
                                                style="float: left;">حفظ</button>
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
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModal" style="text-align: center">بيانات طلب الحصول علي
                                مشروع استثماري</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div> --}}
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
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $('.option').hide();
        $('.coption').hide();
        $('#project').on('change', function(e) {
            $('.option').hide();
            $('.license-' + e.target.value).show();
            $('.cat-' + e.target.value).show();
        });

        $('#city_id').on('change', function(e) {
            $('.coption').hide();
            $('.city-' + e.target.value).show();
        });
        $('#project').on('change', function(e) {
            $('.coption').hide();
            $('.type-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
