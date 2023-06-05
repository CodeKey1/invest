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
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <style>
        @media screen {
            div.divFooter {
                display: none;
            }
        }

        @media print {
            div.divFooter {
                position: fixed;
                bottom: 0;
                margin: 30px;
                width: 90%;
                justify-content: space-between;
                align-items: center;
                display: flex;
            }

            div.divFooter .logo {
                width: 5%;
            }
        }

        .tbody {
            background-color: transparent !important;
        }
    </style>
</head>

<body class="light theme-white">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <div class="row" style="direction: rtl">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4> تقرير طلب / {{ $request->name }}</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('single.report') }}" class="btn btn-primary">ادارة
                                        التقارير</a>
                                </div>
                            </div>
                        </div>
                        <section class="section" id="print">
                            <div id="centerlogo"
                                style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                                {{-- <img width="80px" height="100px" src="../images/logo/logo.png"> --}}
                                <h3>قطاع الشؤن الاقتصادية والاستثمار</h3>
                                <img width="120px" height="120px" src="../images/logo/new_logo.png">
                            </div>
                            <div class="section-body">
                                <div class="row" style="direction: rtl">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3>تقرير طلب استثماري / {{ $request->name }} - المقدم بتاريخ
                                                    {{ $request->recived_date->format('Y-m-d') }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 col-md-6 col-lg-6">
                                                        <table class="table">
                                                            <tbody class="tbody">
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        اسم مقدم الطلب:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->owner_name }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        فئة مقدم الطلب:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->owner_type }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        فئة المشروع:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->categoryname->name }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        الفئة الفرعية:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->subCat->name ?? 'لا يوجد' }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px;">
                                                                        المدينة:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->city->name }} -
                                                                        بمساحة تبلغ {{ $request->size }}
                                                                        {{ $request->size_type }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px;">
                                                                        المواقع المقترحة :</th>
                                                                    <td style="text-align: inherit;">
                                                                        @isset($request_places)
                                                                            @foreach ($request_places as $place)
                                                                                {{ $place->Req_place->name }} -
                                                                            @endforeach
                                                                        @endisset
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-6 col-md-6 col-lg-6">
                                                        <table class="table">
                                                            <tbody class="tbody">
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        مفوض المالك:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->representative_name ?? 'نفسه' }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        بتوكيل رقم :</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->representative_id ?? 'لا يوجد' }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        بطاقة/جواز رقم:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->NID }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px; ">
                                                                        هاتف رقم :</th>
                                                                    <td style="text-align: inherit;">
                                                                        0{{ $request->phone ?? 'لا يوجد' }}
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px;">
                                                                        راس المال:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->capital }}
                                                                        {{ $request->currency_type }} -
                                                                        بنسبة تمويل ذاتي
                                                                        {{ $request->self_financing }}%
                                                                    </td>
                                                                </tr>
                                                                <tr style="height: 50px;">
                                                                    <th scope="row"
                                                                        style="text-align: inherit;width: 130px;">
                                                                        وصف المشروع:</th>
                                                                    <td style="text-align: inherit;">
                                                                        {{ $request->description }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-12"
                                                        style="border-top: 1px solid black; margin-top:30px; padding-top:20px; border-radius: 20px;">
                                                        <h3>حالة الموافقات: </h3>
                                                        <br>
                                                        <div class="d-flex justify-content-between">
                                                            @isset($license)
                                                                @foreach ($license as $li => $l)
                                                                    <div class="p-2" style="width: 33%">
                                                                        <h6> الجهة: {{ $l->L_Lisense->name }}</h6>
                                                                        <h6> الرد :
                                                                            @if ($l->state == 1)
                                                                                <span style="color: green">موافق</span>
                                                                            @elseif($l->state == 0)
                                                                                <span style="color: red">مرفوض</span>
                                                                            @else
                                                                                <span
                                                                                    style="color: yellowgreen">جاري</span>
                                                                            @endif
                                                                        </h6>
                                                                    </div>
                                                                    @if ($li + 1 == 3 || ($li + 1) % 3 == 0)
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                @endif
                                                                @endforeach
                                                            @endisset
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-12"
                                                        style="border-top: 1px solid black; margin-top:30px; padding-top:20px; border-radius: 20px;">
                                                        <div class="row">
                                                            <div class="col-6 col-md-6 col-lg-6">
                                                                <h5>ملاحظات الجهات</h5>
                                                                <br>
                                                                <br>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> الملاحظة </th>
                                                                            <th> المرسل </th>
                                                                            <th> الجهة </th>
                                                                            <th> التاريخ </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($r_note)
                                                                            @foreach ($r_note as $note)
                                                                                <tr>
                                                                                    <td>{{ $note->notes }}</td>
                                                                                    <td>{{ $note->sender_name->name }}</td>
                                                                                    <td>{{ $note->note_license->name }}
                                                                                    </td>
                                                                                    <td>{{ date('Y-m-d', strtotime($note->created_at)) }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endisset
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-6 col-md-6 col-lg-6">
                                                                <h5>ملاحظات لجنة البت الفني</h5>
                                                                <br>
                                                                <br>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> الملاحظة </th>
                                                                            <th> التاريخ </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @isset($tech)
                                                                            @foreach ($tech as $note)
                                                                                <tr>
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
                                    </div>
                                </div>
                            </div>
                            <div class="divFooter">
                                <img src="../images/logo/logo.png" class="logo">
                                <h6 style="color: darkslategrey">&nbsp;&nbsp; جميع الحقوق محفوظة لمركز نظم المعلومات
                                    والتحول الرقمي&nbsp;&nbsp;
                                </h6>
                            </div>
                        </section>
                        <div class="card-body justify-content-right d-flex">
                            <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                onclick="printDiv()">
                                <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="form-group col-md-12">
                                <br>
                                <h4>مرفقات الطلب</h4>
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
                                                </tbody>
                                            @endforeach
                                        @endif
                                    @endisset
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card card-primary">
                            <div class="form-group col-md-12">
                                <br>
                                <h4>ردود الهيئات المنوطة بالموافقة</h4>
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
                                    @foreach ($license as $r)
                                        <tbody>
                                            <tr>
                                                <input type="text" name="r_id" value="{{ $r->id }}"
                                                    hidden readonly>

                                                <td>{{ $r->L_Lisense->name }}</td>
                                                <td>
                                                    @if ($r->file != null)
                                                        <a href="{{ asset('project_inquiry_file/' . $r->file) }}"
                                                            target="_blank">اضغط هنا</a>
                                                    @else
                                                        <p>لا يوجد</p>
                                                    @endif
                                                </td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layouts.setting')

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
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#notes').DataTable();
        });

        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
