@extends('layouts.main')

@section('title')
    Add New Member | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
<section class="bs-validation">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Member</h4>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate>

                        <div class="form-group">
                            <label for="select-country1">Select Branch</label>
                            <select class="form-control" id="select-country1" required>
                                <option value="">Select Branch</option>
                                <option value="">Kegalla</option>
                                <option value="">Awissawella</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>

                        <div class="form-group">
                            <label for="select-country1">Select Center</label>
                            <select class="form-control" id="select-country1" required>
                                <option value="">Select Center</option>
                                <option value="">Thalgamuwa</option>
                                <option value="">13</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Member Code</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Member Name</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Member Phone No</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Member Address</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Member Group Number</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label for="dob-bootstrap-val">Member Register Date</label>
                            <input type="text" class="form-control flatpickr-validation flatpickr" id="dob-bootstrap-val" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Your DOB</div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="customFile1">Profile pic</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile1" required />
                                <label class="custom-file-label" for="customFile1">Choose profile pic</label>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- /Bootstrap Validation -->

    </div>
</section>
</div>
@endsection