@extends('admin.layouts.app')

@section('content')
    <div>
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <h3 class="m-0">New Club Contacts</h3>

                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="./index.html">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Club Contacts</li>
                    </ol>
                </div>
            </div>
        </div> <!-- / Breadcrumbs-->


        <section class="container-fluid">

            <div class="card">
                <div class="row">
                    <div class="mb-12">
                        @include('admin.common.alerts')
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('club_contacts.update',['id' => $club_contact->id])}}" method="post" id="{{'resource-form-'.$club_contact->id}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <input type="text" hidden name="club_contact_id" value="{{$club_contact->id}}"/>

                            <div class="form-group">
                                <label for="">Club Name</label>
                                <input type="text" class="form-control" name="club_name" value="{{$club_contact->club_name}}" id="club_name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Competition Type</label>
                                <input type="text" class="form-control" name="competition_type" value="{{$club_contact->competition_type}}" id="competition_type" required>
                            </div>
                            <div class="form-group">
                                <label for="">Number of teams</label>
                                <input type="text" class="form-control" name="number_of_teams" value="{{$club_contact->number_of_teams}}" id="number_of_teams"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" value="{{$club_contact->contact_person}}" id="contact_person" required>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Phone</label>
                                <input type="text" class="form-control" name="contact_phone" value="{{$club_contact->contact_phone}}" id="contact_phone"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                            <div class="form-group">
                                <label for="">Executive Name</label>
                                <input type="text" class="form-control" name="executive_name" value="{{$club_contact->executive_name}}" id="executive_name" required>
                            </div>

                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" class="form-control" name="designation" value="{{$club_contact->designation }}" id="designation" required>
                            </div>

                            <div class="form-group">
                                <label for="">Executive phone</label>
                                <input type="text" class="form-control" name="executive_phone" value="{{$club_contact->executive_phone}}" id="executive_phone"     oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                           

                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option {{$club_contact->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$club_contact->status == 0 ? 'selected' : ''}} value="0">In Active</option>


                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Club Contacts</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>

                </div>

            </div>
            <!-- /.card-body -->

            </form>
            <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    </section>
    </div>
@endsection
