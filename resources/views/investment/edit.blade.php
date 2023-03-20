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
                                <form class="needs-validation" id="work_experience" novalidate="" action="#"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <h4> عرض طلب الإسثمار / {{ $request->name }}</h4>
                                            <div class="card-header-action">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown"
                                                        class="btn btn-warning dropdown-toggle">Options</a>
                                                    <div class="dropdown-menu"
                                                        style="background-color: rgb(53, 60, 72);">
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
                                        <div class="card-body">
                                            <p class="card-text" style="text-align:center;">الجهات المنتظر منها الرد</p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        @foreach ($r_license as $r)
                                            @if ($r->R_Lisense->id == $request->id)
                                                <div class="col-12 col-md-6 col-lg-2">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <i class="fas fa-check-double" style="color: green;"></i>
                                                            <h4 style="font-size: 12px;"> <a href="#"
                                                                data-toggle="modal"
                                                                data-target=".bd-example-modal-lg">
                                                                {{ $r->L_Lisense->name }} </a> </a>
                                                            </h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($r->R_Lisense->id != $request->id)
                                                <div class="col-12 col-md-6 col-lg-2">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <i class="fas fa-times" style="color: red;"></i>
                                                            <h4 style="font-size: 12px;"><a href="#"
                                                                    data-toggle="modal"
                                                                    data-target=".bd-example-modal-lg">
                                                                    {{ $r->L_Lisense->name }} </a></h4>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="card card-primary">

                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label> اسم الشركة / المواطن</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="name" value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label> العنوان</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}" class="form-control"placeholder=""
                                                        disabled>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> اسم المفوض</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}" class="form-control"placeholder=""
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> بالتوكيل رقم</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بطاقة رقم</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تليفون</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> مساحة المشروع</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>براسمال قيمتة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>نسبة التمويل الذاتي</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>المواقع المقترحة لإقامة المشروع بالمحافظة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $request->name }}"
                                                        class="form-control"placeholder="" disabled>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <hr style="border-top-color: #00000063 !important;" />
                                                    <label>مرفقات الطلب</label>
                                                    <table class="table table-bordered" style="margin-top: 10px;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col"> عقد نأسيس </th>
                                                                <th scope="col"> السجل التجاري </th>
                                                                <th scope="col"> البطاقة الضريبية </th>
                                                                <th scope="col"> صورة البطاقة </th>
                                                                <th scope="col"> مستنادات الملاءة المالية </th>
                                                                <th scope="col"> كروكي الموقع </th>
                                                                <th scope="col"> دراسة جدوي </th>
                                                            </tr>
                                                        </thead>
                                                        @isset($project)
                                                            @if ($project && $project->count() > 0)
                                                                @foreach ($project as $PRG)
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->feasibility_study )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->tax_card )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->commercial_register )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->nid_photo )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->feasibility_study )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->site_sketch )}}" target="_blank">اضغط هنا</a></td>
                                                                            <td><a href="{{asset('attatcment_project/'. $PRG ->feasibility_study )}}" target="_blank">اضغط هنا</a></td>
                                                                        </tr>

                                                                    </tbody>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </table>
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
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="direction: rtl">
                            @foreach ($r_license as $r)
                                @if ($r->R_Lisense->id != $request->id)
                                    <div class="form-row" id="work_experience">
                                        <div class="form-group col-md-4">
                                            <label for=""> الجهات المطلوب موافقتها </label>
                                            <input style="height: calc(2.25rem + 6px);" type="text"
                                                name="owner_name" value="{{ $r->L_Lisense->name }}"
                                                class="form-control" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">تاريخ الإرسال للجهة </label>
                                            <input style="height: calc(2.25rem + 6px);" type="date"
                                                name="owner_name" value="" class="form-control"placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for=""> الملف المرفق </label>
                                            <input style="height: calc(2.25rem + 6px);" type="file"
                                                name="owner_name" value="{{ $r->L_Lisense->name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    @elseif($r->R_Lisense->id == $request->id)

                                        <div class="form-group col-md-4">
                                            <label for=""> ملف موافقة الجهة </label>
                                            <a href="#" target="_blank"> {{ $r->L_Lisense->name }} </a>
                                        </div>

                                   
                                @endif
                            @endforeach
                            <button type="submit" class="btn btn-success" style="float: left;"> ارسال </button>
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
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
