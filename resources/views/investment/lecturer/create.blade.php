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
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
                                        <h4> محاضر طلب الإسثمار / {{ $request->name }}</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('investment.show', $request->id) }}"
                                                class="btn btn-warning">تعديل
                                                الطلب</a>
                                            <a href="{{ route('lecturer') }}" class="btn btn-primary">ادارة
                                                المحاضر</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    @foreach ($r_license as $r)
                                        @if ($r->response_file != null)
                                            <div class="col-12 col-md-6 col-lg-2">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <i class="fas fa-check-double" style="color: green;"></i>
                                                        <h4 style="font-size: 12px;color: green;">
                                                            {{ $r->L_Lisense->name }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($r->response_file == null)
                                            <div class="col-12 col-md-6 col-lg-2">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <i class="fas fa-times" style="color: red;"></i>
                                                        <h4 style="font-size: 12px;color: red;">
                                                            {{ $r->L_Lisense->name }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div> --}}
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <h4>حالة لجنة البت الفني
                                            @if ($request->technical_state == 2)
                                                <span style="color: darkslategray"> جاري </span>
                                            @elseif($request->technical_state == 1)
                                                <span style="color: green"> الموافقة </span>
                                            @elseif($request->technical_state == 0)
                                                <span style="color: red"> الرفض </span>
                                            @endif
                                        </h4>
                                        <br>
                                        <h4>بيانات المشروع</h4>
                                        <form class="needs-validation" novalidate=""
                                            action="{{ route('record.approve', $request->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label>فئة المشروع </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->categoryname->name }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>الفئة الفرعية </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $request->subCat->name ?? 'لا يوجد' }}" disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>نوع مقدم الطلب </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_type"
                                                        value="{{ $request->owner_type }}" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label> اسم الشركة / المواطن </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" name="owner_name"
                                                        value="{{ $request->owner_name }}" disabled>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> العنوان </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->address }}" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> اسم المفوض </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $request->representative_name ?? 'لا يوجد' }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> بالتوكيل رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control"
                                                        value="{{ $request->representative_id ?? 'لا يوجد' }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>بطاقة رقم </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->NID }}" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تليفون </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->phone }}" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> مساحة المشروع </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->size }}" disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع المساحة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->size_type }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>برأسمال قيمته </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->capital }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>فئة العملة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->currency_type }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة التمويل الذاتي </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->self_financing }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ تقديم الطلب </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        class="form-control" value="{{ $request->recived_date }}"
                                                        disabled>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>المدينة </label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        class="form-control" value="{{ $request->city->name }}"
                                                        disabled>
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
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label> وصف المشروع </label>
                                                    <textarea class="form-control" name="description" cols="30" rows="5" maxlength="200" disabled>{{ $request->description }}</textarea>
                                                </div>
                                                @if ($request->state == 0)
                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-success"
                                                            style="float: left;" name="actionBTN" value="approve">
                                                            اعتماد وارسال للجنة البت الفني
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-danger"
                                                            style="float: left;" name="actionBTN"
                                                            value="dissApprove">
                                                            الغاء الاعتماد
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card card-primary">
                                    <div class="form-group col-md-12">
                                        <br>
                                        <h4>المرفقات </h4>
                                        <table class="table table-bordered" style="margin-top: 10px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> عقد نأسيس </th>
                                                    <th scope="col"> السجل التجاري </th>
                                                    <th scope="col"> البطاقة الضريبية </th>
                                                    <th scope="col"> صورة البطاقة </th>
                                                    <th scope="col"> الملاءة المالية </th>
                                                    <th scope="col"> كروكي الموقع </th>
                                                    <th scope="col"> دراسة جدوي </th>
                                                    <th scope="col"> محضر الطلب</th>
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
                                                        </tbody>
                                                    @endforeach
                                                @endif
                                            @endisset
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12" style="direction: rtl; width:100%">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <h4>الموافقات</h4>
                                        <div class="form-group col-md-12">
                                            <form class="needs-validation" novalidate=""
                                                action="{{ route('record.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <table class="table table-bordered" style="margin-top: 10px;">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th scope="col"> # </th> --}}
                                                            <th> اسم الجهة</th>
                                                            <th> الملف المرسل</th>
                                                            <th> تاريخ الارسال </th>
                                                            <th> الرد </th>
                                                            <th> ملف الرد </th>
                                                            <th> تاريخ الرد </th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($r_license as $r)
                                                        <tbody>
                                                            <tr>
                                                                <input type="text" name="r_id[]"
                                                                    value="{{ $r->id }}" hidden readonly>

                                                                <td>{{ $r->L_Lisense->name }}</td>
                                                                <td>
                                                                    @if ($r->file != null)
                                                                        <a href="{{ asset('project_inquiry_file/' . $r->file) }}"
                                                                            target="_blank">اضغط هنا</a> | او تغير
                                                                        |
                                                                    @endif
                                                                    <input type="file"
                                                                        accept=",.doc, .docx, .pdf, image/*"
                                                                        name="send_file[]">
                                                                </td>
                                                                {{-- <td>
                                                                    <input type="date" value="{{ $r->send_date }}"
                                                                        name="send_date[]">
                                                                </td> --}}
                                                                <td>
                                                                    @if ($r->send_date != null)
                                                                        {{ $r->send_date }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($r->state == 1)
                                                                        <div class="badge badge-success"> موافق
                                                                        </div>
                                                                    @elseif ($r->state == 0)
                                                                        <div class="badge badge-danger"> رفض
                                                                        </div>
                                                                    @else
                                                                        <div class="badge badge-warning"> جاري
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                @if ($r->response_file != null)
                                                                    <td><a href="{{ asset('project_response_file/' . $r->response_file) }}"
                                                                            target="_blank">اضغط هنا</a></td>
                                                                @elseif($r->response_file == null)
                                                                    <td>لا يوجد</td>
                                                                @endif
                                                                <td>{{ $r->recived_date }}</td>
                                                            </tr>

                                                        </tbody>
                                                    @endforeach
                                                </table>
                                                <button type="submit" class="btn btn-success" style="float: left;">
                                                    ارسال وتعزيز
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6" style="direction: rtl">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <h4> انشاء ملاحظة</h4>
                                        <form class="needs-validation" novalidate=""
                                            action="{{ route('record.store.note', $request->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-md-12">
                                                <label>اختر الجهة <span style="color: red">*</span></label>
                                                <select class="form-control select2" style="width: 100%" multiple
                                                    name="l_name[]">
                                                    <option value="invest">الاستثمار</option>
                                                    @isset($r_license)
                                                        @if ($r_license && $r_license->count() > 0)
                                                            @foreach ($r_license as $item)
                                                                <option value="{{ $item->license_id }}">
                                                                    {{ $item->L_Lisense->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endisset
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label> الملاحظة<span style="color: red">*</span></label>
                                                <textarea class="form-control" name="note" cols="10" rows="5"> </textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success" style="float: left;">
                                                    ارسال
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="form-group col-md-12">
                                            <h4>الملاحظات</h4>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="notes"
                                                    style="margin-top: 10px;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"> # </th>
                                                            <th scope="col"> الراسل </th>
                                                            {{-- <th scope="col"> الجهة </th> --}}
                                                            <th scope="col"> الملاحظة </th>
                                                            <th scope="col"> تاريخ الارسال </th>
                                                            <th scope="col"> خيارات </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($r_note)
                                                            @foreach ($r_note as $n => $note)
                                                                <tr>
                                                                    <td>{{ $n + 1 }}</td>
                                                                    <td>{{ $note->sender_name->name }}</td>
                                                                    {{-- <td>{{ $note->note_license->name }}</td> --}}
                                                                    <td>{{ $note->notes }}</td>
                                                                    <td>{{ $note->created_at }}</td>
                                                                    <td><a class="btn btn-icon btn-danger"
                                                                            href="{{ route('note.delete', $note->id) }}"><i
                                                                                class="fas fa-times"></i></a></td>
                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <h3 class="text-center">ملاحظات لجنة البت الفني</h3>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="notes"
                                                style="margin-top: 10px;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"> # </th>
                                                        <th scope="col"> الملاحظة </th>
                                                        <th scope="col"> تاريخ الارسال </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($r_tech)
                                                        @foreach ($r_tech as $n => $note)
                                                            <tr>
                                                                <td>{{ $n + 1 }}</td>
                                                                <td>{{ $note->note }}</td>
                                                                <td>{{ $note->date }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        @include('layouts.setting')

        @include('layouts.footer')
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
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });

        /*function formConfirm() {
            if (!confirm("هل انت متأكد من تعزيز الطلب"))
                return false;
            location.href = "{{ route('record.store.note', $request->id) }}";
        }*/
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
