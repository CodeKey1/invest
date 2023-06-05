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
                                <form method="POST" class="needs-validation" novalidate=""
                                    action="{{ route('user.store') }}">
                                    @csrf
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4>اضافة مستخدم جديد</h4>
                                            <div class="card-header-action">
                                                <a href="{{ route('user') }}" class="btn btn-success">كل المستخدمين</a>
                                            </div>
                                            {{-- <button class="btn btn-dark"
                                                style="position: absolute; left: 10px; top:5px"><a
                                                    class="nav-link text-white"
                                                    href="#">عودة</a></button> --}}
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="name"
                                                    class="col-md-2 col-form-label text-md-end">{{ __('اسم المستخدم الجديد') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="email"
                                                    class="col-md-2 col-form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password"
                                                    class="col-md-2 col-form-label text-md-end">{{ __('الرقم السري') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password-confirm"
                                                    class="col-md-2 col-form-label text-md-end">{{ __('تأكيد الرقم السري') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="role"
                                                    class="col-md-2 col-form-label text-md-end">{{ __(' صلاحية المستخدم  ') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="role" name="role" required>
                                                        <option value="" disabled selected> صلاحية المستخدم
                                                        </option>
                                                        @isset($role)
                                                            @if ($role && $role->count() > 0)
                                                                @foreach ($role as $Role)
                                                                    <option value="{{ $Role->id }}">
                                                                        {{ $Role->name }} </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3" id="city" style="display: none;">
                                                <label for="role"
                                                    class="col-md-2 col-form-label text-md-end">{{ __(' المركز ') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="city">
                                                        <option value="" disabled selected> المركز التابع له
                                                        </option>
                                                        @isset($city)
                                                            @if ($city && $city->count() > 0)
                                                                @foreach ($city as $c)
                                                                    <option value="{{ $c->id }}">
                                                                        {{ $c->name }} </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3" id="side" style="display: none;">
                                                <label for="role"
                                                    class="col-md-2 col-form-label text-md-end">{{ __(' الجهة ') }}</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="side">
                                                        <option value="" disabled selected> الجهة التابع لها
                                                        </option>
                                                        @isset($license)
                                                            @if ($license && $license->count() > 0)
                                                                @foreach ($license as $c)
                                                                    <option value="{{ $c->id }}">
                                                                        {{ $c->name }} </option>
                                                                @endforeach
                                                            @endif
                                                        @endisset
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-success"
                                                style="float: left;">حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <a href="javascript:void(0)" style="padding: 5px 10px 5px 10px;" id="addWork-btn"
                                class="btn btn-primary form-label" onclick="addWorkRow()">+ اضف مستحق
                            </a> --}}
                        </div>
                    </div>
                </section>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        $('#role').on('change', function(e) {
            if (e.target.value == 8) {
                $('#city').show();
                $('#side').hide();
            } else if (e.target.value == 5) {
                $('#side').show();
                $('#city').hide();
            } else {
                $('#city').hide();
                $('#side').hide();
            }
        });
    </script>

</body>


<!-- forms-validation.html  21 Nov 2019 03:55:16 GMT -->

</html>
