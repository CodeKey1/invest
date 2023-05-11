<div class="navbar-bg">
</div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <ul class="navbar-nav navbar-left">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                    class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-left pullDown">
                <div class="dropdown-title"> {{ Auth::user()->name }} : مرحبا</div>
                <a href="{{ route('user.edit', Auth::user()->id) }}" class="dropdown-item has-icon"> <i
                        class="fas fa-cog"></i>
                    الإعدادات
                </a>
                <div class="dropdown-divider"></div>

                <div>
                    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>
                        {{ __('تسجيل خروج') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>
        <li>
            {{-- <a href="{{ route('home') }}" > <img alt="image"
                src="images/investment.jpg"  /> --}}

            </a>
        </li>
    </ul>
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar"
                    class="nav-link nav-link-lg
                            collapse-btn">
                    <i data-feather="align-justify"></i></a>
            </li>

        </ul>
    </div>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}" style="letter-spacing: initial"> <img alt="image"
                    src="images/logo/aswan.png" class="header-logo" />
                <span class="logo-name"> الإستثمار </span>
            </a>
        </div>
        {{-- /* super admin permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('super_admin'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> الطلبات </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="{{ route('section') }}">الجهات المختصة</a></li> --}}
                        <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li>
                        <li><a class="nav-link" href="{{ route('investment') }}">طلبات</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المحاضر </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="#">الطلبات المقبولة</a></li> --}}
                        <li><a class="nav-link" href="{{ route('lecturer') }}"> المحاضر </a></li>
                    </ul>
                </li>
                <li dir="rtl">
                    <a href="{{ route('tech') }}" class="nav-link"><i data-feather="briefcase"></i> لجنة البت الفني
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المزادات </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('auction') }}">مزادات</a></li>
                        <li><a class="nav-link" href="{{ route('offer') }}">اطروحات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الوارد
                        </span>
                        <i data-feather="chevrons-left"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('import.Create') }}"> اضافة وارد</a></li>
                        <li><a class="nav-link" href="{{ route('import') }}">كل الوارد</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الصادر
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('export.Create') }}">اضافة صادر</a></li>
                        <li><a class="nav-link" href="{{ route('export') }}"> كل الصادر</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> التقارير </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('request.report') }}">تقرير الطلبات</a></li>
                        <li><a class="nav-link" href="{{ route('auction.report') }}">تقرير المزادات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الإعدادات</span>
                        <i data-feather="user-check"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('user') }}"> المستخدمين</a></li>
                        <li><a class="nav-link" href="{{ route('role') }}">الصلحيات</a></li>
                        <li><a class="nav-link" href="{{ route('app.modify') }}">اعدادات البرنامج</a></li>
                    </ul>
                </li>
            </ul>
        @endif

        {{-- /* user permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('user'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                            data-feather="monitor"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المحاضر </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li>
                        <li><a class="nav-link" href="{{ route('investment') }}">طلبات</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المزادات </span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('auction') }}">مزادات</a></li>
                        <li><a class="nav-link" href="{{ route('offer') }}">اطروحات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الوارد
                        </span>
                        <i data-feather="chevrons-left"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('import.Create') }}"> اضافة وارد</a></li>
                        <li><a class="nav-link" href="{{ route('import') }}">كل الوارد</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الصادر
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('export.Create') }}">اضافة صادر</a></li>
                        <li><a class="nav-link" href="{{ route('export') }}"> كل الصادر</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> تقارير الطلبات</span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">تقرير مفصل</a></li>
                        <li><a class="nav-link" href="#">تقرير </a></li>
                        <li><a class="nav-link" href="#">تقرير مجمع</a></li>
                    </ul>
                </li>
            </ul>
        @endif

        @if (auth()->user()->hasRole('side'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i
                            data-feather="monitor"></i></a>
                </li>

                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> طلبات الإستثمار</span>
                        <i data-feather="briefcase"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="#">الطلبات المقبولة</a></li> --}}
                        <li><a class="nav-link" href="{{ route('side') }}"> الطلبات </a></li>
                    </ul>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الوارد
                        </span>
                        <i data-feather="chevrons-left"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('import.Create') }}"> اضافة وارد</a></li>
                        <li><a class="nav-link" href="{{ route('import') }}">كل الوارد</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الصادر
                        </span>
                        <i data-feather="chevrons-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('export.Create') }}">اضافة صادر</a></li>
                        <li><a class="nav-link" href="{{ route('export') }}"> كل الصادر</a></li>
                    </ul>
                </li>
            </ul>
        @endif
    </aside>
</div>
