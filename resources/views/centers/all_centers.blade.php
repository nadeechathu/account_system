@extends('layouts.main')

@section('title')
    Centers Details View | Smart Life Investment
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
                                                   <h4 class="card-title">View Center Details</h4>
                                                </div>
                                                @canany('Center create')
                                                <div class="col-3">
                                                    @include('centers.components.new_center')
                                                </div>
                                                @endcanany
                                            </div>
                                            <div class="demo-inline-spacing">
                                                <!-- Basic trigger modal -->
                                                <div class="basic-modal mt-0"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 px-3">
                                                <table id="centersTable" class="table table-hover table-bordered DataTable" from="{{ route('centers.data') }}">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Branch Name</th>
                                                            <th>Center Code</th>
                                                            <th>Center Name</th>
                                                            <th>Center Allocate Date</th>
                                                            <th>Executive Person</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-hover"></tbody>
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
    <div class="modal fade text-left" id="delectCenter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-15"> Are you sure you want to delete this Center from the system ? </p>
                    <p class="text-danger font-15">This operation cannot be undone.</p>
                   
                </div>
                <div class="modal-footer">
                   
                    <a href="" id="delete-center-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
                </div>
            </div>
        </div>
    </div>

<!-- Basic trigger modal end -->


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        var url = $('#centersTable').attr('from');
    var table = $('#centersTable').DataTable({
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
                data: 'branch_id',
                name: 'branch_id',
                searchable: true,
                orderable: true
            },
            {
                data: 'center_code',
                name: 'center_code',
                searchable: true,
                orderable: true
            },
            {
                data: 'center_name',
                name: 'center_name',
                searchable: true,
                orderable: true
            },
            {
                data: 'center_allocate_date',
                name: 'center_allocate_date',
                searchable: true,
                orderable: true
            },
            {
                data: 'executive_person',
                name: 'executive_person',
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
let deleteConfirmationBtn = document.getElementById('delete-center-btn');
var url = "{{ route('centers.remove', ':id') }}";
url = url.replace(':id', id);
deleteConfirmationBtn.href = url;
$('#delectCenter').modal('toggle');
}
</script>