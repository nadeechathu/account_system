@extends('layouts.main')

@section('title')
    Add New Centers | Smart Life Investment
@endsection

@section('content')
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="app-user-edit">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i data-feather="user"></i><span class="d-none d-sm-block">Personal Information</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                <i data-feather="info"></i><span class="d-none d-sm-block">Change Password</span>
                            </a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">

                        <!-- Account Tab starts -->
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <!-- users edit media object start -->
                            <div class="media mb-2">
                                <img src="{{ asset('app-assets/images/avatars/8.png') }}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                <div class="media-body mt-50">
                                    <h3>{{Auth::user()->name}}</h3>
                                </div>
                            </div>
                            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                            <!-- users edit media object ends -->
                            <!-- users edit account form start -->
                            <form class="form-validate" method="POST" action="{{ route('profile.update') }}" id="AdminInfoForm">
                                @csrf
    @method('PUT')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->name }}" name="name" id="name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" placeholder="" value="{{ Auth::user()->email }}" name="email" id="email" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="table-responsive border rounded mt-1">
                                            <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                                <span class="align-middle">Permission List</span>
                                            </h6>
                                            <table class="table table-striped table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td><i data-feather='circle'></i> Admin</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>
                        <!-- Account Tab ends -->

                        <!-- Information Tab starts -->
                        {{-- <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                            <!-- users edit Info form start -->
                            <form class="form-validate" action="" method="POST" id="changePasswordAdminForm">
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <h4 class="mb-1">
                                            <i data-feather="user" class="font-medium-4 mr-25"></i>
                                            <span class="align-middle">Personal Information</span>
                                        </h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Old Passord</label>
                                            <input type="password" name="inputName" id="inputName" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">New Password</label>
                                            <input type="password" name="newpassword" id="newpassword" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Confirm New Password</label>
                                            <input type="password" name="cnewpassword" id="cnewpassword" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Update Password</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit Info form ends -->
                        </div> --}}
                        <!-- Information Tab ends -->

                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->

    </div>
</div>
@endsection