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
                                        <h4>ترسيات المزادات</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('offer.notDircectCreate') }}"
                                                class="btn btn-success">ترسية
                                                غير مباشرة</a>
                                            <a href="{{ route('offer.drirectCreate') }}" class="btn btn-primary">ترسية
                                                مباشرة</a>
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
                                                        <th> # </th>
                                                        <th>اسم المزاد</th>
                                                        <th>تاريخ الجلسة</th>
                                                        <th>اسم المستفيد</th>
                                                        <th>اسم الاصل</th>
                                                        <th>نوع التعاقد</th>
                                                        <th>تاريخ الاستلام</th>
                                                        <th>الحالة</th>
                                                        <th>ملاحظات</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($offer)
                                                        @if ($offer && $offer->count() > 0)
                                                            @foreach ($offer as $offer1)
                                                                <tr>
                                                                    <td>{{ $offer1->id }}</td>
                                                                    <td>{{ $offer1->auction_name->name ?? 'طرح مباشر' }}
                                                                    </td>
                                                                    <td>{{ $offer1->auction_name->date ?? 'لا يوجد' }}</td>
                                                                    <td>{{ $offer1->investor }}</td>
                                                                    <td>{{ $offer1->asset_name->name }}</td>
                                                                    <td>{{ $offer1->contract_type->name }}</td>
                                                                    <td>{{ $offer1->recived }}</td>
                                                                    <td>
                                                                        @if ($offer1->status)
                                                                            <div class="badge badge-success">
                                                                            </div>
                                                                        @else
                                                                            <div class="badge badge-danger">
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{ $offer1->note }}</td>
                                                                    <td>
                                                                        <a class="col-dark-gray waves-effect"
                                                                            href="{{ route('offer.edit', $offer1->id) }}"
                                                                            ata-toggle="tooltip" data-placement="top"
                                                                            title="عرض وتعديل">
                                                                            <i class="material-icons">edit</i>
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
