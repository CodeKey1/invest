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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
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
                        <div class="row" style="direction: rtl">
                            <div class="col-12 col-md-12 col-lg-12">
                                @include('layouts.success')
                                @include('layouts.error')
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h4>تعديل اطروحة ({{ $offer->auction_name->name }}) -
                                            ({{ $offer->asset_name->name }}) لصالح ({{ $offer->investor }})</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('offer') }}"
                                                class="dropdown-item has-icon text-dark btn-warning"><i
                                                    class="fa-sharp fa-solid fa-circle-arrow-left"></i>عودة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('offer.update', $offer->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label> اختر المزاد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->auction_name->name }}" class="form-control"
                                                        disabled>
                                                    <select class="form-control" name="auction">
                                                        <option value="{{ $offer->auction_id }}" hidden selected>
                                                            {{ $offer->auction_name->name }}
                                                        </option>
                                                        @isset($auction)
                                                            @if ($auction && $auction->count() > 0)
                                                                @foreach ($auction as $auction1)
                                                                    <option value="{{ $auction1->id }}">
                                                                        {{ $auction1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> اختر المدينة</label>
                                                    <select class="form-control" id="cityselect" name="city">
                                                        <option value="" hidden disabled selected>
                                                            اختر
                                                            المدينة
                                                        </option>
                                                        @isset($city)
                                                            @if ($city && $city->count() > 0)
                                                                @foreach ($city as $city1)
                                                                    <option value="{{ $city1->id }}">
                                                                        {{ $city1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> اختر الاصل</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->asset_name->name }}" class="form-control"
                                                        disabled>
                                                    <select class="form-control" name="asset">
                                                        <option value="{{ $offer->assets_id }}" hidden selected>
                                                            {{ $offer->asset_name->name }}
                                                        </option>
                                                        @isset($assets)
                                                            @if ($assets && $assets->count() > 0)
                                                                @foreach ($assets as $assets1)
                                                                    <option class="option asset-{{ $assets1->city_id }}"
                                                                        value="{{ $assets1->id }}">
                                                                        {{ $assets1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>اسم المستفيد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->investor }}" class="form-control" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        name="investor" class="form-control"
                                                        value="{{ $offer->investor }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>رقم الهاتف</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->phone }}" class="form-control" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="number"
                                                        name="phone" minlength="10" maxlength="11"
                                                        class="form-control" value="{{ $offer->phone }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الاستلام</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        value="{{ $offer->recived }}" class="form-control" disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="recived" class="form-control"
                                                        value="{{ $offer->recived }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>محضر الاستلام <span style="color: red">pdf او word بحد اقصي
                                                            1
                                                            ميجا</span></label>
                                                    <label class="form-control"
                                                        style="height: calc(2.25rem + 6px);"><a target="_blank"
                                                            href="auctionOffer-files/{{ $offer->delivery_record }}">{{ $offer->delivery_record }}</a></label>
                                                    <input style="height: calc(2.25rem + 6px);" type="file"
                                                        name="delivery_record" value="null"
                                                        accept=",.doc, .docx, .pdf, image/*" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>تاريخ الاشغال</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->work_date }}" class="form-control"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="work_date" class="form-control"
                                                        value="{{ $offer->work_date }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نسبة الزيادة</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->increase_rate }}" class="form-control"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="increase_rate" class="form-control"
                                                        value="{{ $offer->increase_rate }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>نوع التعاقد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->contract_type->name }}"
                                                        class="form-control" disabled>
                                                    <select class="form-control" name="contract_type">
                                                        <option value="{{ $offer->contract_type_id }}" hidden
                                                            selected>
                                                            {{ $offer->contract_type->name }}
                                                        </option>
                                                        @isset($contract_type)
                                                            @if ($contract_type && $contract_type->count() > 0)
                                                                @foreach ($contract_type as $contract_type1)
                                                                    <option value="{{ $contract_type1->id }}">
                                                                        {{ $contract_type1->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>مدة العقد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->contract_period }}" class="form-control"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" type="date"
                                                        name="contract_period" class="form-control"
                                                        value="{{ $offer->contract_period }}" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>قيمة العقد</label>
                                                    <input style="height: calc(2.25rem + 6px);" type="text"
                                                        value="{{ $offer->contract_cost }}" class="form-control"
                                                        disabled>
                                                    <input style="height: calc(2.25rem + 6px);" step="0.1"
                                                        type="number" name="contract_cost" class="form-control"
                                                        value="{{ $offer->contract_cost }}" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>ملاحظات</label>
                                                    <textarea class="form-control" name="note" cols="5" rows="3" disabled>{{ $offer->note }}</textarea>
                                                    <textarea class="form-control" name="note" cols="5" rows="3">{{ $offer->note }}</textarea>
                                                </div>
                                                @if ($offer->status)
                                                    <div class="form-group col-md-6">
                                                        <input type="checkbox" class="btn-check" name="offer_status"
                                                            id="offer_status" autocomplete="off" checked>
                                                        <label class="btn btn-outline-primary" for="offer_status">
                                                            تعاقد فعال</label><br>
                                                    </div>
                                                @else
                                                    <div class="form-group col-md-6">
                                                        <input type="checkbox" class="btn-check" name="offer_status"
                                                            id="offer_status" autocomplete="off">
                                                        <label class="btn btn-outline-primary"
                                                            for="offer_status">تفعيل
                                                            التعاقد</label><br>
                                                    </div>
                                                @endif
                                                <div class="form-group col-md-6">
                                                    <input type="checkbox" class="btn-check" id="asset_status"
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-danger" for="asset_status">الغاء
                                                        التعاقد</label><br>
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
    <script>
        $('.option').hide();
        $('#cityselect').on('change', function(e) {
            $('.option').hide();
            $('.asset-' + e.target.value).show();
        });
    </script>
</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
