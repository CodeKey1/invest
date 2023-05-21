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

<body class="light theme-white dark-sidebar">
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
                                <img width="80px" height="100px" src="../images/logo/aswan.png">

                                <img width="80px" height="100px" src="../images/logo/logo.png">
                            </div>
                            <div class="section-body">
                                <div class="row" style="direction: rtl">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3>تقرير طلب استثماري / {{ $request->name }} - المقدم بتاريخ
                                                    {{ $request->recived_date }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 col-md-6 col-lg-6">
                                                        <table class="table">
                                                            <tbody>
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
                                                            <tbody>
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
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="col-6 col-md-6 col-lg-6">
                                                        <h5>ملاحظات الجهات</h5>
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
                                                                            <td>{{ $note->note_license->name }}</td>
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
                                                <div class="justify-content-right d-flex">
                                                    <button class="btn btn-danger  float-left mt-3 mr-2"
                                                        id="print_Button" onclick="printDiv()"> <i
                                                            class="mdi mdi-printer ml-1"></i>طباعة</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
                </div>
            </div>
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
