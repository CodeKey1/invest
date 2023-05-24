<div class="navbar-bg">
</div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <ul class="navbar-nav navbar-left">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> {{ Auth::user()->name }} <span
                    class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-left pullDown">
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
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i class="fa fa-home"
                            aria-hidden="true"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> طلبات المستثمر </span>
                        <i class="fa fa-file" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li> --}}
                        <li><a class="nav-link" href="{{ route('investment') }}">طلبات المستثمرين</a></li>
                        <li><a class="nav-link" href="{{ route('lecturer') }}"> المحاضر </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المزادات </span>
                        <i class="fa fa-university" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('auction') }}">مزادات</a></li>
                        <li><a class="nav-link" href="{{ route('offer') }}">الاطروحات</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ route('tech') }}" class="nav-link"><span>لجنة البت الفني</span><i class="fa fa-bug"
                            aria-hidden="true"></i></a>
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
                        <i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('request.report') }}">تقرير الطلبات</a></li>
                        <li><a class="nav-link" href="{{ route('single.report') }}">ملخص طلب</a></li>
                        <li><a class="nav-link" href="{{ route('auction.report') }}">تقرير المزادات</a></li>
                    </ul>
                </li>
                <li class="menu-header">
                    <hr />
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span>الإعدادات</span>
                        <i class="fa fa-cogs" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('user') }}"> المستخدمين</a></li>
                        <li><a class="nav-link" href="{{ route('role') }}">الصلحيات</a></li>
                        <li><a class="nav-link" href="{{ route('app.modify') }}">بيانات اساسية</a></li>
                    </ul>
                </li>
            </ul>
        @endif

        {{-- /* user permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('user'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i class="fa fa-home"
                            aria-hidden="true"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> طلبات المستثمر </span>
                        <i class="fa fa-file" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li> --}}
                        <li><a class="nav-link" href="{{ route('investment') }}">طلبات المستثمرين</a></li>
                        <li><a class="nav-link" href="{{ route('lecturer') }}"> المحاضر </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المزادات </span>
                        <i class="fa fa-university" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('auction') }}">مزادات</a></li>
                        <li><a class="nav-link" href="{{ route('offer') }}">الاطروحات</a></li>
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
                        <i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('request.report') }}">تقرير الطلبات</a></li>
                        <li><a class="nav-link" href="{{ route('auction.report') }}">تقرير المزادات</a></li>
                    </ul>
                </li>
            </ul>
        @endif

        {{-- /* side permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('side') ||
                auth()->user()->hasRole('city'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i class="fa fa-home"
                            aria-hidden="true"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> طلبات المستثمر </span>
                        <i class="fa fa-file" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li> --}}
                        <li><a class="nav-link" href="{{ route('side') }}">طلبات المستثمرين</a></li>
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
            </ul>
        @endif

        {{-- /* tech permission and role for sidebar*/ --}}
        @if (auth()->user()->hasRole('technical'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i class="fa fa-home"
                            aria-hidden="true"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="{{ route('tech') }}" class="nav-link"><span>لجنة البت الفني</span><i class="fa fa-bug"
                            aria-hidden="true"></i></a>
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
            </ul>
        @endif

        @if (auth()->user()->hasRole('viewer'))
            <ul class="sidebar-menu">
                <li class="dropdown active">
                    <a href="{{ route('home') }}" class="nav-link"><span>الرئيسية</span><i class="fa fa-home"
                            aria-hidden="true"></i></a>
                </li>
                <li class="menu-header"></li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> طلبات المستثمر </span>
                        <i class="fa fa-file" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="{{ route('investment.Create') }}">اضافة طلب</a></li> --}}
                        <li><a class="nav-link" href="{{ route('investment') }}">طلبات المستثمرين</a></li>
                        <li><a class="nav-link" href="{{ route('lecturer') }}"> المحاضر </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> المزادات </span>
                        <i class="fa fa-university" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('auction') }}">مزادات</a></li>
                        <li><a class="nav-link" href="{{ route('offer') }}">الاطروحات</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><span> التقارير </span>
                        <i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('request.report') }}">تقرير الطلبات</a></li>
                        <li><a class="nav-link" href="{{ route('single.report') }}">ملخص طلب</a></li>
                        <li><a class="nav-link" href="{{ route('auction.report') }}">تقرير المزادات</a></li>
                    </ul>
                </li>
            </ul>
        @endif
    </aside>
</div>
