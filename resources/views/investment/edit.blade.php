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
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/izitoast/css/iziToast.min.css">
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
                                <div class="card">
                                    <div class="card-header">
                                        <h4> تعديل طلب الإسثمار / {{ $request->name }}</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('investment.record', $request->id) }}"
                                                class="btn btn-warning">
                                                محاضر الطلب</a>
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
                                    action="{{ route('investment.update', $request->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>فئة المشروع </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->categoryname->name }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        class="form-control" name="category_id"
                                                        value="{{ $request->categoryname->name }}" hidden>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>الفئة الفرعية </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $requests->subCat->name ?? 'لا يوجد' }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        class="form-control" name="sub_category_id"
                                                        value="{{ $requests->subCat->name ?? 'لا يوجد' }}" hidden>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label> اسم المشروع </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="name" value="{{ $request->name }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="name" value="{{ $request->name }}"
                                                        hidden>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> الجهات للموافة علي المشرع </label>
                                                    <select class="form-control select2" multiple style="width: 100%"
                                                        disabled>
                                                        @isset($r_license)
                                                            @if ($r_license && $r_license->count() > 0)
                                                                @foreach ($r_license as $item)
                                                                    <option selected>{{ $item->L_Lisense->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                    {{-- <select class="form-control select2" multiple=""
                                                        name="license[]" style="width: 100%">
                                                        @isset($license)
                                                            @if ($license && $license->count() > 0)
                                                                @foreach ($license as $license1)
                                                                    <option value="{{ $license1->id }}" selected>
                                                                        {{ $license1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select> --}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع مقدم الطلب </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_type"
                                                        value="{{ $request->owner_type }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_type"
                                                        value="{{ $request->owner_type }}" hidden>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label> اسم الشركة / المواطن </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_name"
                                                        value="{{ $request->owner_name }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_name"
                                                        value="{{ $request->owner_name }}" hidden>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> العنوان </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->address }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="address"
                                                        value="{{ $request->address }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> اسم المفوض </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $request->representative_name ?? 'لا يوجد' }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="representative_name"
                                                        value="{{ $request->representative_name ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> بالتوكيل رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $request->representative_id ?? 'لا يوجد' }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="representative_id"
                                                        value="{{ $request->representative_id ?? '' }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بطاقة رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->NID }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="NID"
                                                        value="{{ $request->NID }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تليفون </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->phone }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="phone"
                                                        value="{{ $request->phone }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> مساحة المشروع </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->size }}" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="size"
                                                        value="{{ $request->size }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع المساحة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->size_type }}"
                                                        disabled>
                                                    <select class="form-control" name="size_type" required>
                                                        <option selected hidden value="{{ $request->size_type }}">
                                                            {{ $request->size_type }}
                                                        </option>
                                                        <option value="متر مربع">متر مربع</option>
                                                        <option value="فدان">فدان</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>برأسمال قيمته </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->capital }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="capital"
                                                        value="{{ $request->capital }}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>فئة العملة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->currency_type }}"
                                                        disabled>
                                                    <select class="form-control" name="currency_type">
                                                        <option value="{{ $request->currency_type }}"selected hidden>
                                                            {{ $request->currency_type }}</option>
                                                        <option value="EGP">جنيه</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EUR">EUR</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة التمويل الذاتي </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->self_financing }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        class="form-control" name="Self_financing"
                                                        value="{{ $request->self_financing }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ تقديم الطلب </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        class="form-control" value="{{ $request->recived_date }}"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        class="form-control" name="recived_date"
                                                        value="{{ $request->recived_date }}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->city->name }}"
                                                        disabled>
                                                    <select class="form-control" id="city_id" name="city_id">
                                                        <option value="{{ $request->city_id }}" selected hidden>
                                                            {{ $request->city->name }}</option>
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
                                                    <select class="form-control select2" multiple style="width: 100%"
                                                        disabled>
                                                        @isset($request_places)
                                                            @if ($request_places && $request_places->count() > 0)
                                                                @foreach ($request_places as $item)
                                                                    <option selected>{{ $item->Req_place->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                    <select class="form-control select2" name="region[]" multiple
                                                        style="width: 100%">
                                                        @isset($place)
                                                            @if ($place && $place->count() > 0)
                                                                @foreach ($place as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> وصف المشروع </label>
                                                    <textarea class="form-control" name="description" cols="30" rows="5" maxlength="200" disabled>{{ $request->description }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> وصف المشروع <span style="color: rgba(255, 0, 0, 0.486)">بحد
                                                            اقصى 200
                                                            كلمة</span></label>
                                                    <textarea class="form-control" name="description" cols="30" rows="5" maxlength="200">{{ $request->description }}</textarea>
                                                </div>
                                                <div
                                                    class="form-group
                                                                col-md-12">
                                                    <hr style="border-top-color: #00000063 !important;" />
                                                    <label>مرفقات الطلب</label>
                                                    <table class="table table-bordered" style="margin-top: 10px;">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"> عقد نأسيس </th>
                                                                <th scope="col"> السجل التجاري </th>
                                                                <th scope="col"> البطاقة الضريبية </th>
                                                                <th scope="col"> صورة البطاقة </th>
                                                                <th scope="col"> مستنادات الملاءة المالية </th>
                                                                <th scope="col"> كروكي الموقع </th>
                                                                <th scope="col"> دراسة جدوي </th>
                                                                <th scope="col"> محضر الطلب </th>
                                                            </tr>
                                                        </thead>
                                                        @isset($project)
                                                            @if ($project && $project->count() > 0)
                                                                @foreach ($project as $PRG)
                                                                    <tbody>
                                                                        <tr>
                                                                            @if ($PRG->company_reg)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->company_reg) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->company_reg)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->commercial_register)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->commercial_register) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->commercial_register)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->tax_card)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->tax_card) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->tax_card)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->nid_photo)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->nid_photo) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->nid_photo)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->financial_capital)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->financial_capital) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->financial_capital)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->site_sketch)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->site_sketch) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->site_sketch)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->feasibility_study)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->feasibility_study) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->feasibility_study)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                            @if ($PRG->record)
                                                                                <td><a href="{{ asset('attatcment_project/' . $PRG->record) }}"
                                                                                        target="_blank">اضغط هنا</a></td>
                                                                            @elseif(!$PRG->record)
                                                                                <td>لا يوجد</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="file" name="company_reg"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file"
                                                                                    name="commercial_register"
                                                                                    class="form-control">
                                                                            <td>
                                                                                <input type="file" name="tax_card"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="nid_photo"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file"
                                                                                    name="financial_capital"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="site_sketch"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file"
                                                                                    name="feasibility_study"
                                                                                    class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="record"
                                                                                    class="form-control">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </table>
                                                </div>
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
            {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
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
                                @if ($r->R_Lisense->id == $request->id)
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
                                                name="record_send_date" value=""
                                                class="form-control"placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for=""> الملف المرفق </label>
                                            <input style="height: calc(2.25rem + 6px);" type="file"
                                                name="record_file" class="form-control">
                                        </div>
                                    </div>
                                @elseif($r->R_Lisense->id != $request->id)
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
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
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
            $('.license-' + {{ $request->categoryname->id }}).show();
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
