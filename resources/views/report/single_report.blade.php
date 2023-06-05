<!DOCTYPE html>
<html lang="en">
<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title></title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">

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
                        @include('layouts.success')
                        @include('layouts.error')
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ملخص طلبات المستثمرين</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>فئة مشروع </th>
                                                        <th> اسم المشروع </th>
                                                        <th>اسم المقدم</th>
                                                        <th> مواطن / شركة </th>
                                                        <th>المدينة</th>
                                                        <th>الرأي الفني</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($request)
                                                        @if ($request && $request->count() > 0)
                                                            @foreach ($request as $req => $requests)
                                                                <tr>
                                                                    <td>{{ $req + 1 }}</td>
                                                                    <td>{{ $requests->categoryname->name ?? 'لا يوجد' }}
                                                                    </td>
                                                                    <td>{{ $requests->name }}</td>
                                                                    <td>{{ $requests->owner_name }}</td>
                                                                    <td>{{ $requests->owner_type }}</td>
                                                                    <td>{{ $requests->city->name }}</td>
                                                                    <td>
                                                                        @if ($requests->technical_state == 1)
                                                                            <div class="badge badge-success">مقبول</div>
                                                                        @elseif($requests->technical_state == 0)
                                                                            <div class="badge badge-danger">مرفوض</div>
                                                                        @else
                                                                            <div class="badge badge-warning">جاري</div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('single_report', $requests->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="material-icons">info</i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
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
                @include('layouts.setting')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @elseif (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
