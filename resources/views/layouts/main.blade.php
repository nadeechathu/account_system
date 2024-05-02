<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/smart-life-investment-logo-title.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/smart-life-investment-logo-title.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

    <!-- Form Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">


    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- Header Start -->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl ">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle is-active d-none-mobile" href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('dashboard.index') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loan Calculator"><i data-feather='grid'></i> Loan Calculator</a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span><span class="user-status">

                            @if (Auth::user()->id == 1 || Auth::user()->id == 3 || Auth::user()->id == 4 || Auth::user()->id == 5)
                        <span class="badge bg-danger">Director</span>
                        @elseif(Auth::user()->id == 6 || Auth::user()->id == 7 || Auth::user()->id == 8)
                        <span class="badge bg-success">Executive officer</span>
                        @else
                        <span class="badge bg-warning">Developer</span>
                        @endif

                        </span></div><span class="avatar"><img class="round" src="{{ asset('app-assets/images/avatars/8.png') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('dashboard.singalProfile') }}"><i class="mr-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mr-50" data-feather="power"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

                </li>
            </ul>
        </div>
    </nav>
    <!-- Header End -->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">

        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                            </span><img style="width: 170px !important;" src="{{ asset('app-assets/images/side-nav-logo.png') }}"></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>

        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item">
                    <a class="d-flex align-items-center {{ 'dashboard' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.index') }}"><i data-feather="home">
                        </i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="navigation-header"><span data-i18n="Apps &amp; Pages" style="font-weight: 600">Loan Details</span><i data-feather="more-horizontal"></i>
                </li>

                @canany('Center access','Center edit','Center create','Center delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/center' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.center') }}">
                    <i data-feather='home'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Centers</span></a>
                </li>
                @endcanany

                @canany('Member access','Member edit','Member create','Member delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/member' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.member') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Members</span></a>
                </li>
                @endcanany

                @canany('Loans Category access', 'Loans Category edit', 'delete','Loans Category create','Loans Category delete')
                    <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/loancategory' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loancategory') }}">
                        <i data-feather='book-open'></i>
                        <span class="menu-title text-truncate" data-i18n="Typography">Loans Category</span></a>
                    </li>
                @endcanany

                @canany('Loans access', 'Loans edit', 'Loans create', 'Loans delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/loans' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loans') }}">
                    <i data-feather='layers'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Loans</span></a>
                </li>
                @endcanany

                @canany('Collections access', 'Collections edit', 'Collections create', 'Collections delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/loanCollects' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loanCollects') }}">
                    <i data-feather='briefcase'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Collections</span></a>
                </li>
                @endcanany

                @canany('Bulk Collection')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/bulkReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.bulkReport') }}">
                    <i data-feather='folder-plus'></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Bulk Collection</span></a>
                </li>
                @endcanany

                <li class="navigation-header"><span data-i18n="Apps &amp; Pages" style="font-weight: 600">Report Details</span><i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item"><a class="d-flex align-items-center {{ 'dashboard/loanReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loanReport') }}">
                    <i data-feather='user-plus'></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Loan Report</span></a>
                </li>

                @canany('Member Report')
                <li class="nav-item"><a class="d-flex align-items-center {{ 'dashboard/memberReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.memberReport') }}">
                    <i data-feather='user-plus'></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Member Report</span></a>
                </li>
                @endcanany

                @canany('Singal Member Report')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/singalMemberReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.singalMemberReport') }}">
                    <i data-feather='user-check'></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Singal Member Report</span></a>
                </li>
                @endcanany

                {{-- @canany('Loan Report')
                <li class="nav-item"><a class="d-flex align-items-center {{ 'dashboard/loanReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loanReport') }}">
                    <i data-feather='folder'></i>
                    <span class="menu-title text-truncate" data-i18n="Kanban">Loan Report</span></a>
                </li>
                @endcanany --}}

                @canany('Collection Report')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/loanCollectionReport' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.loanCollectionReport') }}">
                    <i data-feather='folder-plus'></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Collection Report</span></a>
                </li>
                @endcanany

                {{-- @canany('Collection')
                <li class=" nav-item"><a class="d-flex align-items-center" href="">
                    <i data-feather='send'></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Collection</span></a>
                </li>
                @endcanany --}}

                {{-- @canany('Profit & Loss')
                <li class=" nav-item"><a class="d-flex align-items-center" href="">
                    <i data-feather='pie-chart'></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">Profit & Loss</span></a>
                </li>
                @endcanany --}}

                <li class=" navigation-header"><span data-i18n="User Interface">Setting</span><i data-feather="more-horizontal"></i>
                </li>

                @canany('Role access','Role add','Role edit','Role delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'admin/roles' == Request()->path() ? 'active' : ''}}" href="{{ route('admin.roles.index') }}">
                    <i data-feather='briefcase'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Role</span></a>
                </li>
                @endcanany

                @canany('Permission access','Permission add','Permission edit','Permission delete')
                <li class="nav-item"><a class="d-flex align-items-center {{ 'admin/permissions' == Request()->path() ? 'active' : ''}}" href="{{ route('admin.permissions.index') }}">
                    <i data-feather='server'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Permission</span></a>
                </li>
                @endcanany

                @canany('User access','User add','User edit','User delete')
                <li class=" nav-item"><a class="d-flex align-items-center {{ 'admin/users' == Request()->path() ? 'active' : ''}}" href="{{ route('admin.users.index')}}">
                    <i data-feather="user"></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">User</span></a>
                </li>
                @endcanany

                <li class=" nav-item"><a class="d-flex align-items-center {{ 'dashboard/activity_log' == Request()->path() ? 'active' : ''}}" href="{{ route('dashboard.activity_log') }}">
                    <i data-feather='watch'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Users Activity Log</span></a>
                </li>
                {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="ui-typography.html">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Typography">Setting</span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="ui-feather.html">
                    <i data-feather='book'></i>
                    <span class="menu-title text-truncate" data-i18n="Feather">Documents</span></a>
                </li> --}}
                <p style="color: #fff;padding-left: 5px;margin-top: 45px;">Software Version 1.0.0</p>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <!-- END: Page JS-->

    <!-- form js -->
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>

    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

</body>
<!-- END: Body-->

</html>
