@extends('layouts.main')

@section('title')
    Singal Member Report | Smart Life Investment
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="invoice-preview-wrapper">
                <div class="row invoice-preview">
                    <!-- Invoice -->
                    <div class="col-xl-9 col-md-8 col-12">
                        <div class="card invoice-preview-card" style="">
                            <div class="card-body invoice-padding pb-0">
                                <!-- Header starts -->
                                <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                    <div>
                                        <div class="logo-wrapper">
                                            <img src="{{ asset('app-assets/images/report-logo-type.png') }}"
                                                style="width: 220px;">
                                        </div>
                                        <p class="card-text mb-25">Smart Life Investment</p>
                                        <p class="card-text mb-25">J8/2 , Udagoda , Undugoda, kegalle</p>
                                        <p class="card-text mb-0">070 3700640 | 076 2700640</p>
                                    </div>
                                    <div class="mt-md-0 mt-2">
                                        <h4 class="invoice-title">
                                            Loan ID:
                                            <span class="invoice-number">#{{ $loan->id }}</span>
                                        </h4>
                                        <div class="invoice-date-wrapper">
                                            <p class="invoice-date-title">Issued Date:</p>
                                            <p class="invoice-date">{{ $loan->loan_issus_date }}</p>
                                        </div>
                                        {{-- <div class="invoice-date-wrapper">
                                      <p class="invoice-date-title">Due Date::</p>
                                      <p class="invoice-date">29/08/2020</p>
                                  </div> --}}
                                    </div>
                                </div>
                                <!-- Header ends -->
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Address and Contact starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row invoice-spacing">
                                    <div class="col-xl-8 p-0">
                                        <h6 class="mb-2"><b>Member Details:</b></h6>
                                        <h6 class="mb-25">{{ $loan->member->member_name }} - (
                                            {{ $loan->member->member_code }} )</h6>
                                        <p class="card-text mb-25">{{ $loan->member->member_address }}</p>
                                        <p class="card-text mb-25">{{ $loan->member->member_phone_no }}</p>
                                        <p class="card-text mb-25">{{ $loan->member->member_register_date }}</p>
                                    </div>
                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                        <h6 class="mb-2"><b>Loan Details:</b></h6>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pr-1">Loan Category:</td>
                                                    <td>
                                                        <span class="font-weight-bold">
                                                            @if ($loan->loan_category_id == 1)
                                                                Speed Loan
                                                            @elseif($loan->loan_category_id == 2)
                                                                Business Loan
                                                            @else
                                                                Micro Loan
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">Loan Amount:</td>
                                                    <td><span class="font-weight-bold">Rs.
                                                            {{ $loanCollectAmount->loan_category_amount }}.00</span></td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="pr-1">Loan Rate:</td>
                                                    <td><span class="font-weight-bold">{{ $loan->loan_rate }}.00%</span>
                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <td class="pr-1">Loan Duration:</td>
                                                    <td><span class="font-weight-bold">{{ $loan->loan_settle_week }}
                                                            weeks</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-1">D/Charg:</td>
                                                    <td><span class="font-weight-bold">Rs.
                                                            {{ $loan->loan_documt_charg }}.00</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Address and Contact ends -->

                            <!-- Invoice Description starts -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="py-1">#</th>
                                            <th class="py-1">Collect Date</th>
                                            <th class="py-1">Collect Amount</th>
                                            <th class="py-1">Arreas</th>
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
                                                <span class="font-weight-bold">{{ $counter++ }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">{{ $allLoanCollect->collect_date }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">Rs.{{ $allLoanCollect->collect_amount }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">Rs.{{ $allLoanCollect->collect_arreas }}</span>
                                            </td>
                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">Rs.{{ $allLoanCollect->collect_loan_balnce }}</span>
                                            </td>

                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">Rs.{{ $allLoanCollect->collect_loan_paid_balnce }}</span>
                                            </td>

                                            <td class="py-1">
                                                <span
                                                    class="font-weight-bold">{{ $allLoanCollect->collect_settle_week }}
                                                    weeks</span>
                                            </td>
                                            <td class="py-1">
                                                <span class="font-weight-bold">

                                                    @if ($allLoanCollect->collect_person == 1)
                                                    Thiwanka Senarath
                                                    @elseif ($allLoanCollect->collect_person == 2)
                                                    Indika Anura
                                                   @elseif ($allLoanCollect->collect_person == 3)
                                                   Tharindu Dilshan
                                                    @else
                                                    Visuka Gayashan
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <hr class="invoice-spacing" />

                            <!-- Invoice Note starts -->
                            <div class="card-body invoice-padding pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="font-weight-bold">Note:</span>
                                        <span>It was a pleasure working with you and your team. We hope you will get new loan. Thank You!</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Invoice Note ends -->
                        </div>
                    </div>
                    <!-- /Invoice -->

                    <!-- Invoice Actions -->
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{-- <button class="btn btn-gradient-warning btn-block btn-download-invoice mb-75"><i
                                        data-feather='download'></i> Download</button> --}}
                                        <a class="btn btn-gradient-success btn-block mb-75" href="{{ route('dashboard.singalMembeReportPdf', $loan->id) }}"
                                            target="_blank">
                                            <i data-feather='printer'></i> Print
                                        </a>
                                <a class="btn btn-gradient-secondary btn-block mb-75"
                                    href="{{ route('dashboard.singalMemberReport') }}"><i
                                        data-feather='corner-down-left'></i> Back </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Actions -->
                </div>
            </section>

        </div>
    </div>
@endsection
