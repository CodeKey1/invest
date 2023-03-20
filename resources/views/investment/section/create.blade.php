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
                                <form>
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h4> الجهلت المطلوب موافقتها لطلب الإستثمار : {{ $request->name }}</h4>
                                            <div class="card-header-action">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"
                                                        class="btn btn-warning"> طلب استعجال </a>
                                                    {{-- <div class="dropdown-menu"
                                                        style="background-color: rgb(53, 60, 72);">
                                                        <a href="#" class="dropdown-item has-icon text-success"><i
                                                                class="fas fa-eye"></i> اضافة</a>
                                                        <a href="#" class="dropdown-item has-icon text-info"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item has-icon text-danger"><i
                                                                class="far fa-trash-alt"></i>
                                                            Delete</a>
                                                    </div> --}}
                                                </div>
                                                <a href="#" class="btn btn-primary">ادارة
                                                    الجهات</a>
                                            </div>

                                        </div>
                                        <div class="card-body">
                                            <p class="card-text" style="text-align:center;"> للإسثمار بـ:
                                                {{ $request->categoryname->name }} </p>
                                        </div>
                                    </div>
                                    <div class="card card-primary">

                                        <div class="card-body">
                                            @isset($license)
                                                @if ($license && $license->count() > 0)
                                                    @foreach ($license as $lic)
                                                        <div class="form-row" id="work_experience">
                                                            <div class="form-group col-md-4">
                                                                <label for=""> الجهات المطلوب موافقتها </label>
                                                                <input style="height: calc(2.25rem + 6px);" type="text"
                                                                    name="owner_name" value="{{ $lic->license->name }}"
                                                                    class="form-control" disabled>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="">تاريخ الإرسال للجهة </label>
                                                                <input style="height: calc(2.25rem + 6px);" type="date"
                                                                    name="owner_name" value=""
                                                                    class="form-control"placeholder="">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for=""> الملف المرفق </label>
                                                                <input style="height: calc(2.25rem + 6px);" type="file"
                                                                    name="owner_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endisset
                                            <button type="submit" class="btn btn-success"
                                                style="float: left;">حفظ</button>
                                        </div>
                                    </div>
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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="direction: rtl">
                    @isset($license)
                        @if ($license && $license->count() > 0)
                            @foreach ($license as $lic)
                                <div class="form-row" id="work_experience">
                                    <div class="form-group col-md-4">
                                        <label for=""> الجهات المطلوب موافقتها </label>
                                        <input style="height: calc(2.25rem + 6px);" type="text" name="owner_name"
                                            value="{{ $lic->license->name }}" class="form-control" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">تاريخ الإرسال للجهة </label>
                                        <input style="height: calc(2.25rem + 6px);" type="date" name="owner_name"
                                            value="" class="form-control"placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for=""> الملف المرفق </label>
                                        <input style="height: calc(2.25rem + 6px);" type="file" name="owner_name"
                                            class="form-control">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endisset
                    <button type="submit" class="btn btn-success" style="float: left;">حفظ</button>
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
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    {{-- <script>
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>
    <script>
        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'card-body form-row';
                div.innerHTML =
                    `
                <div class="form-group col-md-5">
                    <select class="form-control" id="city" name="name">
                        <option value="" disabled selected>اختر المشروع</option>
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
                <div class="form-group col-md-5">
                    <select class="form-control select2" multiple=""  name="name">
                        <option value="" disabled selected>اختر الجهة</option>
                        @isset($license)
                            @if ($license && $license->count() > 0)
                                @foreach ($license as $Lic)
                                    <option value="{{ $Lic->id }}">{{ $Lic->name }}
                                    </option>
                                @endforeach
                            @endif
                        @endisset
                    </select>
                </div>
                <input type="button" class="btn btn-danger" style="width: 110px;height: calc(2.25rem + 6px);line-height: 30px;" value="x" onclick="removeWorkRow(this)" />`;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 4) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 4) {
                    document.getElementById("addWork-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
                document.getElementById("addWork-btn").style.display = "block";
            }
        }
    </script>
    <script>
        function addSkillRow() {
            var elements = document.getElementsByClassName('skill-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("skills").length < 10) {
                const div = document.createElement('div');
                div.className = 'col-md-4 skills';
                div.innerHTML = `
                    <div class="h5">
                    <select type="text" name="skill_id[]" class="skill-input" id="" placeholder="اسم المهارة">
                    <optgroup label="من فضلك أخترالمهارة "></optgroup>

                    <option value=""</option>

                    </select>
                    <a href="javascript:void(0)" style="padding: 5px 20px 5px 20px;"
                                class="btn btn-danger form-label" onclick="removeSkillRow(this)">-</a>
                  </div>
                `;
                document.getElementById('skills').appendChild(div);
                if (document.getElementsByClassName("skills").length == 9) {
                    document.getElementById("addSkill-btn").style.display = "none";
                }
                if (document.getElementsByClassName("skills").length != 9) {
                    document.getElementById("addSkill-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeSkillRow(input) {
            confirm("متأكد؟") ? document.getElementById('skills').removeChild(input.parentNode.parentNode) : 0;
            if (document.getElementsByClassName("skills").length != 9) {
                document.getElementById("addSkill-btn").style.display = "block";
            }
        }
    </script> --}}

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
