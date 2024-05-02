@extends('layouts.main')

@section('title')
    Add New Loan | Smart Life Investment
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
                    <h4 class="card-title">Add New Loan</h4>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate>

                        <div class="form-group">
                            <label for="select-country1">Select Member</label>
                            <select class="select2 form-control form-control-lg">
                              <option value="HI">Select Member</option>
                              <option value="AK">Hashan Samaranayaka - S01/BL/001</option>
                              <option value="HI">Hawaii</option>
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                              <option value="OR">Oregon</option>
                              <option value="NH">New Hampshire</option>
                          </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>

                        <div class="form-group">
                            <label for="select-country1">Loan Type</label>
                            <select class="form-control" id="select-country1" required>
                                <option value="">Loan Type</option>
                                <option value="">Business Loan</option>
                                <option value="">Personal Loan</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Loan Amount</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs. 50,000" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Loan Rate</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : 38 %" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">Loan settlement Weeks</label>
                            <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : 20 weeks" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="form-group">
                          <label class="form-label" for="basic-addon-name">Loan Document Charges</label>
                          <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs. 900" required />
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please enter your name.</div>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Loan Rental</label>
                        <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs. 3450" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>


                      <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Loan Total Collected ( without D/Charg) </label>
                        <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs 69,000" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="basic-addon-name">Loan Total Collected ( with D/Charg)</label>
                      <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs 69,900" required />
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Please enter your name.</div>
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="basic-addon-name">Loan Interest Total</label>
                      <input type="text" id="basic-addon-name" class="form-control" aria-label="Name" aria-describedby="basic-addon-name" placeholder="Eg : Rs 19,000" required />
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Please enter your name.</div>
                    </div>

                        <div class="form-group">
                            <label for="dob-bootstrap-val">Loan Issue Date</label>
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