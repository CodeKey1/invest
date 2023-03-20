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
                    <nav aria-label="breadcrumb" style="direction: rtl">
                        <ol class="breadcrumb bg-white text-dark-all">

                            <li class="breadcrumb-item">تاريخ اليوم :
                            </li>

                        </ol>

                      </nav>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header">
                                        <h4> ادارة المشارع الفرعية  </h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                    class="btn btn-warning dropdown-toggle">Options</a>
                                                <div class="dropdown-menu" style="background-color: rgb(53, 60, 72);">
                                                    <a href="#"
                                                        class="dropdown-item has-icon text-success"><i
                                                            class="fas fa-eye"></i> اضافة</a>
                                                    <a href="#" class="dropdown-item has-icon text-info"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"><i
                                                            class="far fa-trash-alt"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                            <a href="{{ route('section.Create') }}" class="btn btn-primary"> اضافة جهة </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">

                                    <div class="card-body" style="direction: rtl;">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                    href="#home" role="tab" aria-controls="home"
                                                    aria-selected="true"> مشروع استثماري زراعي	 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile" aria-selected="false"> مشروع استثماري سياحي
                                                    </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                    role="tab" aria-controls="contact" aria-selected="false">مشروع استثماري صناعي
                                                     </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#project"
                                                    role="tab" aria-controls="project" aria-selected="false">مشروع استثماري خدمي
                                                     </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tap"
                                                    role="tab" aria-controls="tap" aria-selected="false">  مشروع استثماري مختلفة
                                                     </a>
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
                                                                    <th>اسم المشروع</th>
                                                                    <th> المشرعات الفرغية </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($category)
                                                                @if ($category && $category->count() > 0)
                                                                    @foreach ($category as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->cat_name->name }}</td>
                                                                                <td>{{ $Category->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="profile" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($category_1)
                                                                @if ($category_1 && $category_1->count() > 0)
                                                                    @foreach ($category_1 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->name }}</td>
                                                                                <td>{{ $Category->cat_name->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="contact" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($category_2)
                                                                @if ($category_2 && $category_2->count() > 0)
                                                                    @foreach ($category_2 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->name }}</td>
                                                                                <td>{{ $Category->cat_name->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="project" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($category_3)
                                                                @if ($category_3 && $category_3->count() > 0)
                                                                    @foreach ($category_3 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->name }}</td>
                                                                                <td>{{ $Category->cat_name->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="tap" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($category_4)
                                                                @if ($category_4 && $category_4->count() > 0)
                                                                    @foreach ($category_4 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->name }}</td>
                                                                                <td>{{ $Category->cat_name->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
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
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4> ادارة الجهات التي تتطلب موافقتها علي تخصيص قطعة أرض لإقامة مشروع </h4>
                                        <div class="card-header-action">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                    class="btn btn-warning dropdown-toggle">Options</a>
                                                <div class="dropdown-menu" style="background-color: rgb(53, 60, 72);">
                                                    <a href="#"
                                                        class="dropdown-item has-icon text-success"><i
                                                            class="fas fa-eye"></i> اضافة</a>
                                                    <a href="#" class="dropdown-item has-icon text-info"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item has-icon text-danger"><i
                                                            class="far fa-trash-alt"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                            <a href="{{ route('section.Create') }}" class="btn btn-primary"> اضافة جهة </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-secondary">

                                    <div class="card-body" style="direction: rtl;">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="t1-tab" data-toggle="tab"
                                                    href="#t1" role="tab" aria-controls="t1"
                                                    aria-selected="true"> مشروع استثماري زراعي	 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="t2-tab" data-toggle="tab" href="#t2"
                                                    role="tab" aria-controls="t2" aria-selected="false"> مشروع استثماري سياحي
                                                    </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="t3-tab" data-toggle="tab" href="#t3"
                                                    role="tab" aria-controls="t3" aria-selected="false">مشروع استثماري صناعي
                                                     </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="t4-tab" data-toggle="tab" href="#t4"
                                                    role="tab" aria-controls="t4" aria-selected="false">مشروع استثماري خدمي
                                                     </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="t5-tab" data-toggle="tab" href="#t5"
                                                    role="tab" aria-controls="t5" aria-selected="false">  مشروع استثماري مختلفة
                                                     </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="t1" role="tabpanel"
                                                aria-labelledby="t1-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($clicense)
                                                                @if ($clicense && $clicense->count() > 0)
                                                                    @foreach ($clicense as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->license_cate->name }}</td>
                                                                                <td>{{ $Category->license->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="t2" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($clicense2)
                                                                @if ($clicense2 && $clicense2->count() > 0)
                                                                    @foreach ($clicense2 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->license_cate->name }}</td>
                                                                                <td>{{ $Category->license->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="t3" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($clicense3)
                                                                @if ($clicense3 && $clicense3->count() > 0)
                                                                    @foreach ($clicense3 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->license_cate->name }}</td>
                                                                                <td>{{ $Category->license->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="t4" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($clicense4)
                                                                @if ($clicense4 && $clicense4->count() > 0)
                                                                    @foreach ($clicense4 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->license_cate->name }}</td>
                                                                                <td>{{ $Category->license->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            @endisset
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show " id="t5" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body" style="direction: rtl;">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover" id="save-stage"
                                                            style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th> # </th>
                                                                    <th>اسم المشروع</th>
                                                                    <th> الجهات المختصة </th>
                                                                    <th>تفاصيل</th>
                                                                </tr>
                                                            </thead>
                                                            @isset($clicense5)
                                                                @if ($clicense5 && $clicense5->count() > 0)
                                                                    @foreach ($clicense5 as $Category)
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>{{ $Category->id }}</td>
                                                                                <td>{{ $Category->license_cate->name }}</td>
                                                                                <td>{{ $Category->license->name }}</td>
                                                                                <td>
                                                                                    <a class="btn btn-icon btn-success"
                                                                                        href="#" ata-toggle="tooltip"
                                                                                        data-placement="top"
                                                                                        title="عرض وتعديل"><i
                                                                                            class="fas fa-user"></i></a>
                                                                                    <a class="btn btn-icon btn-danger"
                                                                                        href="#"><i
                                                                                            class="fas fa-times"></i></a>
                                                                                </td>
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
