@extends('layouts.main')

@section('title')
    Member Details View | Smart Life Investment
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
                                                    <h4 class="card-title">View Member Details</h4>
                                                 </div>
                                                 @canany('Member create')
                                                <div class="col-3">
                                                  <a href="{{ route('member.createUI') }}" class="btn btn-primary w-100">Add Member</a>
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
                                                <div class="table-responsive">
                                                <table id="membersTable" class="table table-hover table-bordered DataTable" from="{{ route('members.data') }}">
                                                    <thead class="table-success">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Center Name</th>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>NIC</th>
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
                            </div>
                        </section>
                        <!-- Basic Modals end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade text-left" id="delectMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel12" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-20" id="exampleModalLabel">Confirm Delect</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="font-15"> Are you sure you want to delete this Member from the system ? </p>
                <p class="text-danger font-15">This operation cannot be undone.</p>

            </div>
            <div class="modal-footer">


                <a href="" id="delete-member-btn"><button type="button" class="btn btn-success  btn-secondary px-3 font-13 rounded-2">Yes</button></a>
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

        var url = $('#membersTable').attr('from');
    var table = $('#membersTable').DataTable({
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
                data: 'center_id',
                name: 'center_id',
                searchable: true,
                orderable: true
            },
            {
                data: 'member_code',
                name: 'member_code',
                searchable: true,
                orderable: true
            },
            {
                data: 'initial_name',
                name: 'initial_name',
                searchable: true,
                orderable: true
            },
            {
                data: 'member_nic',
                name: 'member_nic',
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

let deleteConfirmationBtn = document.getElementById('delete-member-btn');

var url = "{{ route('member.remove', ':id') }}";
url = url.replace(':id', id);

deleteConfirmationBtn.href = url;

$('#delectMember').modal('toggle');
}
</script>

