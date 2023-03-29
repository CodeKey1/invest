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


                                <div class="card">
                                    <div class="card-header">
                                        <h4>طلب الحصول علي موافقة لإقامت مشروع</h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                    class="btn btn-warning dropdown-toggle">Options</a>
                                                <div class="dropdown-menu" style="background-color: rgb(53, 60, 72);">
                                                    <a href="#" class="dropdown-item has-icon text-success"><i
                                                            class="fas fa-eye"></i> View</a>
                                                    <a href="#" class="dropdown-item has-icon text-info"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"><i
                                                            class="far fa-trash-alt"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                            <a href="{{ route('investment') }}" class="btn btn-primary">ادارة
                                                الطلبات</a>
                                        </div>
                                        {{-- <button class="btn btn-dark"
                                                style="position: absolute; left: 10px; top:5px"><a
                                                    class="nav-link text-white"
                                                    href="#">عودة</a></button> --}}
                                    </div>

                                </div>
                                <div class="card"
                                    style="flex-direction: inherit;
                                    background-color: #fff0;
                                    border-radius: 10px;
                                    border: none;
                                    position: relative;
                                    margin-bottom: 30px;
                                    box-shadow: unset;">
                                    <span class="badge badge-danger" style="border-radius: 4px;">تاريخ اليوم :
                                        {{ $now }} </span>
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
                                                        <option disabled selected>اختر المشروع</option>
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
                                                    <label>الفئة الفرعية <span style="color: red">*</span></label>
                                                    <select class="form-control" id="sub_cat" name="sub_category_id"
                                                        required>
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
                                                    <label> الجهات للموافة علي المشرع </label>
                                                    @isset($clicense)
                                                        @if ($clicense && $clicense->count() > 0)
                                                            @foreach ($clicense as $lice)
                                                                <div
                                                                    class="option license-{{ $lice->license_cate->id }} badge badge-danger">
                                                                    {{ $lice->license->name }}</div>
                                                                {{-- <input class="option license-{{ $lice->license_cate->id }}" type="text" value="{{ $lice->license_cate->id }}" name="sub_ctegory_id"> --}}
                                                            @endforeach
                                                        @endif
                                                    @endisset

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع مقدم الطلب <span style="color: red">*</span></label>
                                                    <select class="form-control" name="owner_type" required>
                                                        <option disabled selected>اختر مقدم الطلب</option>
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
                                                        name="representative_name" class="form-control"
                                                        value="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> بالتوكيل رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="representative_id" class="form-control" value="">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بطاقة رقم <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="NID" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تليفون <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="phone" class="form-control" placeholder="" required>
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
                                                        <option disabled selected>اختر نوع المساحة</option>
                                                        <option value="متر">متر مربع</option>
                                                        <option value="فدان">فدان</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>برأسمال قيمته <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="capital" class="form-control"
                                                        placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة التمويل الذاتي <span
                                                            style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="Self_financing" class="form-control"
                                                        placeholder="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ تقديم الطلب <span style="color: red">*</span></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="recived_date" class="form-control" placeholder=""
                                                        required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة <span style="color: red">*</span></label>
                                                    <select class="form-control" id="city_id" name="city_id">
                                                        <option disabled selected>اختر المدينة</option>
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
                                                <div class="form-group col-md-4">
                                                    <label> أختر النشاط <span style="color: red">*</span></label>
                                                    <select class="form-control" id="city" name="city"
                                                        required>
                                                        <option value="" disabled hidden selected>اختر المركز
                                                        </option>
                                                        @isset($place_cat)
                                                            @if ($place_cat && $place_cat->count() > 0)
                                                                @foreach ($place_cat as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>

                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المواقع المقترحة لإقامة المشروع بالمحافظة</label>
                                                    <select class="form-control" id="area" name="region"
                                                        required>
                                                        <option value="" disabled hidden selected>اختر المنطقة
                                                        </option>
                                                        @isset($place)
                                                            @if ($place && $place->count() > 0)
                                                                @foreach ($place as $Place)
                                                                    <option
                                                                        class="coption city-{{ $Place->catePlace->id }} type-{{ $Place->cityPlace->id }}"
                                                                        value="{{ $Place->catePlace->id }}">
                                                                        {{ $Place->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
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
                                                    <label for=""> صورة البطاقة <span
                                                            style="color: red">*</span></label>
                                                    <input type="file" name="nid_photo" class="form-control"
                                                        style="height: calc(2.25rem + 6px);" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> مستنادات الملاءة المالية <span
                                                            style="color: red">*</span></label>
                                                    <input type="file" name="financial_capital"
                                                        class="form-control" style="height: calc(2.25rem + 6px);"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> كروكي الموقع المختار واحداثياته
                                                    </label>
                                                    <input type="file" name="location_string" class="form-control"
                                                        style="height: calc(2.25rem + 6px);">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for=""> دراسة جدوي للمشروع <span
                                                            style="color: red">*</span> </label>
                                                    <input type="file" name="feasibility_study"
                                                        class="form-control" style="height: calc(2.25rem + 6px);"
                                                        required>
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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
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
            $('.type-' + e.target.value).show();
        });
        $('#city').on('change', function(e) {
            $('.coption').hide();
            $('.city-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
