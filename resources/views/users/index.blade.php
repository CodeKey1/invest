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
                        <div class="row">
                            <div class="col-12">

                                @include('layouts.error')
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4> ادارة المستخدمين </h4>
                                        <div class="card-header-action">

                                            <a href="{{ route('user.Create') }}" class="btn btn-success">اضافة
                                                مستخدم</a>
                                        </div>
                                    </div>
                                    <div class="card-body" style="direction: rtl;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="save-stage"
                                                style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> اسم المستخدم</th>
                                                        <th> صلاحيات</th>
                                                        <th> الحالة</th>
                                                        <th> البريد الإلكتروني</th>
                                                        <th>تفاصيل</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $u => $user)
                                                        <tr>
                                                            <td>{{ $u + 1 }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td class="mb-2">
                                                                @if ($user->role == 3)
                                                                    ادمن
                                                                @elseif($user->role == 4)
                                                                    مستخدم
                                                                @elseif($user->role == 5)
                                                                    جهات
                                                                @elseif($user->role == 7)
                                                                    اللجنة الفنية
                                                                @elseif($user->role == 8)
                                                                    المدن
                                                                @elseif($user->role == 9)
                                                                    مشاهد
                                                                @else
                                                                    {{ $user->role }}
                                                                @endif
                                                            </td>

                                                            <td class="mb-2">
                                                                @if ($user->state == 0)
                                                                    <div class="badge badge-danger"> </div>
                                                                @elseif($user->state == 1)
                                                                    <div class="badge badge-success"> </div>
                                                                @endif
                                                            </td>
                                                            <td class="mb-2">{{ $user->email }}</td>
                                                            <td>
                                                                <a class="col-dark-gray waves-effect"
                                                                    href="{{ route('user.edit', $user->id) }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="عرض">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                                <a class="col-red waves-effect m-r-10"
                                                                    href="{{ route('user.delete', $user->id) }}"data-toggle="tooltip"
                                                                    data-placement="top" id="delete_btn"
                                                                    title="حذف"><i
                                                                        class="material-icons">delete</i></a></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
        $('#delete_btn').click(function(e) {
            if (confirm("هل انت متأكد!") == false)
                e.preventDefault();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.success("{{ Session::get('error') }}");
        </script>
    @endif
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
