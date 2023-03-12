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
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <style>
        @media print {
            #print_Button {
                display: none;
            }

            #DataTables_Table_0_filter {
                display: none;
            }

            #DataTables_Table_0_length {
                display: none;
            }

            #DataTables_Table_0_paginate {
                display: none;
            }

            #DataTables_Table_0_info {
                display: none;
            }
        }
    </style>
</head>

<body class="light theme-white dark-sidebar">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section" id="print">
                    <div id="centerlogo"
                        style="margin: 30px ; justify-content: space-between; align-items: center; display:flex;">
                        <img width="80px" height="100px" src="../images/logo/aswan.png">

                        <img width="80px" height="100px" src="../images/logo/logo.png">
                    </div>
                    <div class="section-body">
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card card-primary work-xp">
                                    <div class="card-header">
                                        <h3>تقرير تفصيلي لمشروع ""</h3>
                                    </div>
                                    <div class="card-body">
                                        {{-- <table class="table">
                                            <tbody>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        اسم المشروع : </th>
                                                    <td style="text-align: inherit; "></td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        تاريخ الانشاء :</th>
                                                    <td style="text-align: inherit; ">
                                                        </td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px; ">
                                                        تاريخ الانتهاء :</th>
                                                    <td style="text-align: inherit;">
                                                        </td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        التكلفة المستحقة :</th>
                                                    <td style="text-align: inherit;">
                                                        جنيه
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        ما تم تحصيله :</th>
                                                    <td style="text-align: inherit;">

                                                        جنيه
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        التكلفة المتبقية :</th>
                                                    <td style="text-align: inherit;">

                                                        جنيه
                                                    </td>
                                                </tr>
                                                <tr style="height: 50px;">
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        المساحة / الزمام :</th>
                                                    <td style="text-align: inherit;">
                                                        <div class="badge badge-light">

                                                            فدان</div>
                                                        <div class="badge badge-light">

                                                            فراط</div>
                                                        <div class="badge badge-light">

                                                            سهم</div>
                                                    </td>
                                                    <th scope="row" style="text-align: inherit;width: 130px;">
                                                        المساحة / الزمام (الفعلي):</th>
                                                    <td style="text-align: inherit;">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}

                                        <table class="table table-bordered" style="margin-top: 50px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">تاريخ الحصر </th>
                                                    <th scope="col">تاريخ العرض والنشر </th>
                                                    <th scope="col">تاريخ المعارضات </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">بدأ</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نهو</th>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-bordered" style="margin-top: 50px;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">تاريخ ابلاغ الضرائب </th>
                                                    <th scope="col">تاريخ ابلاغ المساحة </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">مبدأي (صرف)</th>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">نهائي (مساحة)</th>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-right d-flex">
                                <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button"
                                    onclick="printDiv()"> <i class="mdi mdi-printer ml-1"></i>طباعة</button>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
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
    <script type="text/javascript">
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
