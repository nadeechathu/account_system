@extends('layouts.main')

@section('title')
    Loan Category Details View | Smart Life Investment
@endsection

@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-body ">
                        <!-- Basic Modals start -->
                        <section id="basic-modals">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-body py-1">
                                            <div class="mb-12">
                                                @include('common.alerts')
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-9">
                                                    <h4 class="card-title">View Loan Category Details</h4>
                                                 </div>
                                                 @canany('Loans Category create')
                                                <div class="col-3">
                                                  <a href="{{ route('loanCategory.loanCategoryUI') }}" class="btn btn-primary w-100">Add Loan Category</a>
                                                </div>
                                                @endcanany
                                            </div>
                                            <div class="demo-inline-spacing">
                                                <!-- Basic trigger modal -->
                                                <div class="basic-modal mt-0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 px-3">
                                                <table id="loanCategoryTable" class="table table-hover table-bordered DataTable" from="{{ route('loanCategory.data') }}">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Loan Category</th>
                                                            <th>Loan Amount</th>
                                                            <th>Interst Rate (%)</th>
                                                            <th>Duration (Weeks)</th>
                                                            <th>D/Charg</th>
                                                            <th class="text-center">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-hover">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </section>
                        <!-- Basic Modals end -->

                    </div>
                </div>
            </div>

        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade text-left" id="delectLoanCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-15"> Are you sure you want to delete this Laon Category from the system ? </p>
                <p class="text-danger font-15">This operation cannot be undone.</p>

            </div>
            <div class="modal-footer">


                <a href="" id="delete-loan-category-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
                <button type="button" class="btn  btn-secondary px-3 font-13 rounded-2" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Basic trigger modal end -->


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        var url = $('#loanCategoryTable').attr('from');
    var table = $('#loanCategoryTable').DataTable({
        ordering: true,
        processing: true,
        serverSide: true,
        pageLength: 8,
        ajax: url,
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: true,
                orderable: true
            },
            {
                data: 'categories_id',
                name: 'categories_id',
                searchable: true,
                orderable: true
            },
            {
                data: 'loan_category_amount',
                name: 'loan_category_amount',
                searchable: true,
                orderable: true
            },
            {
                data: 'loan_interst_rate',
                name: 'loan_interst_rate',
                searchable: true,
                orderable: true
            },
            {
                data: 'loan_duration',
                name: 'loan_duration',
                searchable: true,
                orderable: true
            },
            {
                data: 'loan_category_def_docharg',
                name: 'loan_category_def_docharg',
                searchable: true,
                orderable: true
            },
            {
                data: 'actions',
                name: 'actions',
                searchable: false,
                orderable: false
            },
        ],
    });
    });


    function openDeleteConfirmation(id) {

let deleteConfirmationBtn = document.getElementById('delete-loan-category-btn');

var url = "{{ route('loanCategory.remove', ':id') }}";
url = url.replace(':id', id);

deleteConfirmationBtn.href = url;

$('#delectLoanCategory').modal('toggle');
}
</script>

