<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loan ID: #{{ $loan->id }}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/smart-life-smart-logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice-print.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                              <img src="{{ asset('app-assets/images/report-logo-type.png') }}"
                              style="width: 220px;">
                            </div>
                            <p class="mb-25">Smart Life Investment</p>
                            <p class="mb-25">J8/2 , Udagoda , Undugoda, kegalle</p>
                            <p class="mb-0">070 3700640 | 076 2700640</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="font-weight-bold text-right mb-1"></h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Issued Date:</span>
                                <span class="font-weight-bold">{{ $loan->loan_issus_date }}</span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-2" />

                    <div class="row pb-2">
                        <div class="col-sm-6">
                            <h6 class="mb-1">Member Details:</h6>
                            <p class="mb-25">{{ $loan->member->member_name }} - (
                              {{ $loan->member->member_code }} )</p>
                            <p class="mb-25">{{ $loan->member->member_address }}</p>
                            <p class="mb-25">{{ $loan->member->member_phone_no }}</p>
                            <p class="mb-25">{{ $loan->member->member_register_date }}</p>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-2">
                            <h6 class="mb-1">Loan Details:</h6>
                            <table>
                                <tbody>
                                  <tr>
                                    <td class="pr-1">Loan Category:</td>
                                        <td><strong>
                                          @if ($loan->loan_category_id == 1)
                                          Speed Loan
                                      @elseif($loan->loan_category_id == 2)
                                          Business Loan
                                      @else
                                          Micro Loan
                                      @endif
                                        </strong></td>
                                    </tr>
                                    <tr>
                                        <td class="pr-1">Loan Amount:</td>
                                        <td><strong>Rs.
                                          {{ $loanCollectAmount->loan_category_amount }}.00</strong></td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="pr-1">Loan Rate:</td>
                                        <td>{{ $loan->loan_rate }}.00%</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="pr-1">Loan Duration:</td>
                                        <td>{{ $loan->loan_settle_week }}
                                          weeks</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-1">D/Charg:</td>
                                        <td>Rs.
                                          {{ $loan->loan_documt_charg }}.00</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-1">SWIFT code:</td>
                                        <td>BR91905</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                              <tr>
                                <th class="py-1">#</th>
                                <th class="py-1">Collect Amount</th>
                                <th class="py-1">Collect Date</th>
                                <th class="py-1">Due Collect Blance</th>
                                <th class="py-1">Total Paid Blance</th>
                                <th class="py-1">Settle Week</th>
                                <th class="py-1">Person</th>
                            </tr>
                            </thead>
                            <tbody>
                              @php
                                        $counter = 1;
                                        @endphp
                                        @foreach ($allLoanCollects as $allLoanCollect)
                                <tr style="font-size: 13px;">
                                    <td class="py-1">
                                        <strong>{{ $counter++ }}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>Rs.{{ $allLoanCollect->collect_amount }}</strong>
                                    </td>
                                    <td class="py-1">
                                        <strong>{{ $allLoanCollect->collect_date }}</strong>
                                    </td>
                                    <td class="py-1">
                                      <strong>Rs.{{ $allLoanCollect->collect_loan_balnce }}</strong>
                                  </td>
                                  <td class="py-1">
                                    <strong>Rs.{{ $allLoanCollect->collect_loan_paid_balnce }}</strong>
                                </td>
                                <td class="py-1">
                                  <strong>{{ $allLoanCollect->collect_settle_week }}
                                    weeks</strong>
                              </td>
                              <td class="py-1">
                                <strong>
                                  @if ($allLoanCollect->collect_person == 1)
                                                            Thiwanka
                                                        @elseif ($allLoanCollect->collect_person == 2)
                                                            Indika
                                                        @else
                                                            Chamara
                                                        @endif
                                </strong>
                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr class="my-2" />

                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">Note:</span>
                            <span>It was a pleasure working with you and your team. We hope you will get new loan. Thank You!</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-print.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        function closeWindow() {
            if (openedWindow) {
                openedWindow.close();
            }
        }
    </script>
</body>
<!-- END: Body-->
</html>
