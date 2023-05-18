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
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
                        <div class="row">
                            <div class="col-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ادارة جميع محاضر لطلبات الإستثمار</h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="{{ route('investment') }}" class="btn btn-warning"> كل طلبات
                                                    الإستثمار </a>
                                            </div>
                                            <a href="{{ route('home') }}" class="btn btn-primary">الرئيسية</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card card-secondary">
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> مشروع </th>
                                                        <th> اسم المشروع </th>
                                                        <th>اسم المتقدم</th>
                                                        <th> مواطن / شركة </th>
                                                        <th>المدينة</th>
                                                        <th> موافقات الجهات </th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($request)
                                                        @if ($request && $request->count() > 0)
                                                            @foreach ($request as $requests)
                                                                <tr>
                                                                    <td>{{ $requests->id }}</td>
                                                                    <td>{{ $requests->categoryname->name }}</td>
                                                                    <td>{{ $requests->name }}</td>
                                                                    <td>{{ $requests->name }}</td>
                                                                    <td>{{ $requests->owner_type }}</td>
                                                                    <td>{{ $requests->city->name }}</td>
                                                                    <td>
                                                                        @foreach ($r_license->where('request_id', $requests->id) as $r)
                                                                            @if ($r->response_file != null)
                                                                                <div class="badge badge-success"> </div>
                                                                            @elseif($r->response_file == null)
                                                                                <div class="badge badge-danger"> </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-icon btn-success"
                                                                            href="{{ route('investment.record', $requests->id) }}"
                                                                            ata-toggle="tooltip" data-placement="top"
                                                                            title="عرض">
                                                                            <i class="fas fa-user"></i>
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
                                </div> --}}

                                <div class="card card-secondary">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                    href="#home" role="tab" aria-controls="home"
                                                    aria-selected="true">طلبات
                                                    مرسلة</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile" aria-selected="false">طلبات
                                                    جارية</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>فئة مشروع </th>
                                                                    <th> اسم المشروع </th>
                                                                    <th>اسم المقدم</th>
                                                                    <th> مواطن / شركة </th>
                                                                    <th>المدينة</th>
                                                                    <th> موافقات الجهات </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($request)
                                                                    @if ($request && $request->count() > 0)
                                                                        @foreach ($request as $req => $requests)
                                                                            @if ($requests->state)
                                                                                <tr>
                                                                                    <td>{{ $req + 1 }}</td>
                                                                                    <td>{{ $requests->categoryname->name }}
                                                                                    </td>
                                                                                    <td>{{ $requests->name }}</td>
                                                                                    <td>{{ $requests->owner_name }}</td>
                                                                                    <td>{{ $requests->owner_type }}</td>
                                                                                    <td>{{ $requests->city->name }}</td>
                                                                                    <td>
                                                                                        @foreach ($r_license->where('request_id', $requests->id) as $r)
                                                                                            @if ($r->response_file != null)
                                                                                                <div
                                                                                                    class="badge badge-success">
                                                                                                </div>
                                                                                            @elseif($r->response_file == null)
                                                                                                <div
                                                                                                    class="badge badge-danger">
                                                                                                </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </td>
                                                                                    <td>
                                                                                        <a class="btn btn-icon btn-success"
                                                                                            href="{{ route('investment.record', $requests->id) }}"
                                                                                            ata-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="عرض">
                                                                                            <i class="fas fa-user"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endisset
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th> مشروع </th>
                                                                    <th> اسم المشروع </th>
                                                                    <th>اسم المتقدم</th>
                                                                    <th> مواطن / شركة </th>
                                                                    <th>المدينة</th>
                                                                    <th> موافقات الجهات </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @isset($request)
                                                                    @if ($request && $request->count() > 0)
                                                                        @foreach ($request as $req => $requests)
                                                                            @if (!$requests->state)
                                                                                <tr>
                                                                                    <td>{{ $req + 1 }}</td>
                                                                                    <td>{{ $requests->categoryname->name }}
                                                                                    </td>
                                                                                    <td>{{ $requests->name }}</td>
                                                                                    <td>{{ $requests->name }}</td>
                                                                                    <td>{{ $requests->owner_type }}</td>
                                                                                    <td>{{ $requests->city->name }}</td>
                                                                                    <td>
                                                                                        @foreach ($r_license->where('request_id', $requests->id) as $r)
                                                                                            @if ($r->response_file != null)
                                                                                                <div
                                                                                                    class="badge badge-success">
                                                                                                </div>
                                                                                            @elseif($r->response_file == null)
                                                                                                <div
                                                                                                    class="badge badge-danger">
                                                                                                </div>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </td>
                                                                                    <td>
                                                                                        <a class="btn btn-icon btn-success"
                                                                                            href="{{ route('investment.record', $requests->id) }}"
                                                                                            ata-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="عرض">
                                                                                            <i class="fas fa-user"></i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
