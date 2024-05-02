@extends('layouts.main')

@section('title')
Singal Member Report | Smart Life Investment
@endsection

@section('content')

<div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Responsive Datatable -->
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-12">
                                @include('common.alerts')
                            </div>
                            <div class="card" style="padding: 20px !important;">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Singal Member Report</h4>
                                </div>
                                <div class="card-datatable">
                                <div class="table-responsive">
                                  <table id="example" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                            <th class="d-none-mobile">Branch</th>
                                                            <th class="d-none-mobile">Center</th>
                                                            <th>Member Name / Memeber Code</th>
                                                            <th class="d-none-mobile">Loan Category Name</th>
                                                            <th class="d-none-mobile">Loan Amount</th>
                                                            {{-- <th>Interst Rate (%)</th>
                                                            <th>Duration (Weeks)</th>
                                                            <th>D/Charg</th> --}}
                                                            <th class="d-none-mobile">Status</th>
                                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $counter = 1;
                                        @endphp
                                        @foreach($loans as $loan)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td class="d-none-mobile">{{ $loan->branch_name }}</td>
                                            <td class="d-none-mobile">{{ $loan->center_name }}</td>
                                            <td>{{ $loan->initial_name }} <br> {{ $loan->member_code }}</td>
                                            <td class="d-none-mobile">
                                                @if ($loan->loan_category_id == 1)
                                                   Speed Loan
                                                @elseif ($loan->loan_category_id == 2)
                                                   Business Loan
                                                @else
                                                   Micro Loan
                                                @endif
                                            </td>
                                            <td class="d-none-mobile">Rs.{{ $loan->loan_category_amount}}.00</td>
                                            {{-- <td>{{ $loan->loan_rate }}</td>
                                            <td>{{ $loan->loan_settle_week }}</td>
                                            <td>{{ $loan->loan_documt_charg }}</td> --}}
                                            <td class="d-none-mobile">
                                                @if ($loan->loan_status == 0)
                                                <div class="badge badge-danger">Delete</div>
                                                @elseif ($loan->loan_status == 1)
                                                <div class="badge badge-success">Active</div>
                                                @elseif ($loan->loan_status == 2)
                                                <div class="badge badge-warning">Pending</div>
                                                @elseif ($loan->loan_status == 3)
                                                <div class="badge badge-danger">Reject</div>
                                                @else
                                                <div class="badge badge-secondary">Settlement</div>
                                                @endif
                                            </td>
                                            <td>
                                              <a href="{{ route('dashboard.singalMemberReportView', $loan->loan_id) }}"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light"><i data-feather='eye'></i></button></a>
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
                </section>
                <!--/ Responsive Datatable -->

            </div>
        </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
