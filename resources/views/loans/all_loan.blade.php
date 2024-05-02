@extends('layouts.main')

@section('title')
Loan Details View | Smart Life Investment
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
                                    <h4 class="card-title">View Loan Details</h4>
                                    @canany('Loans create')
                                    <div class="col-3">
                                        <a href="{{ route('loan.createUI') }}" class="btn btn-primary w-100">Add New Loan</a>
                                    </div>
                                    @endcanany
                                </div>
                                <div class="card-datatable">
                                <div class="table-responsive">
                                  <table id="example" class="table table-hover table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                <th>Branch or Center</th>
                                                <th>Member Name </th>
                                                <th>Member Code</th>
                                                <th>Loan Category</th>
                                                <th>Loan Amount</th>
                                                <th>Status</th>
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
                                            <td>{{ $loan->branch_name }} - {{ $loan->center_name }}</td>
                                            <td>{{ $loan->initial_name }}</td>
                                            <td> {{ $loan->member_code }}</td>
                                            <td>
                                                @if ($loan->loan_category_id == 1)
                                                   Speed Loan
                                                @elseif ($loan->loan_category_id == 2)
                                                   Business Loan
                                                @else
                                                   Micro Loan
                                                @endif
                                            </td>
                                            <td>Rs.{{ $loan->loan_category_amount }}.00</td>
                                            <td>
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

                                                @canany('Loans access')
                                                <a href="{{ route('loan.view', $loan->loan_id) }}"><button type="button" class="btn btn-sm btn-primary waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="View"><i data-feather='eye'></i></button></a>
                                                @endcanany

                                                @canany('Loans edit')
                                                <a href="{{ route('loans.update', $loan->loan_id) }}"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i data-feather='edit-2'></i></button></a>
                                                @endcanany

                                                @canany('Loans delete')
                                                <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation('{{ $loan->loan_id }}')" data-target="#delectLoan" data-toggle="modal"><i data-feather='trash-2'></i></button>
                                                @endcanany

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

        <div class="modal fade text-left" id="delectLoan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel121" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="font-15"> Are you sure you want to delete this Loan from the system ? </p>
                        <p class="text-danger font-15">This operation cannot be undone.</p>

                    </div>
                    <div class="modal-footer">


                        <a href="" id="delete-loan-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
                        <button type="button" class="btn  btn-secondary px-3 font-13 rounded-2" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
function openDeleteConfirmation(id) {

    let deleteConfirmationBtn = document.getElementById('delete-loan-btn');

    var url = "{{ route('loan.remove', ':id') }}";
    url = url.replace(':id', id);

    deleteConfirmationBtn.href = url;

    $('#delectLoan').modal('toggle');
    }
    </script>
