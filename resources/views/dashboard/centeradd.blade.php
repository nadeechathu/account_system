@extends('layouts.main')

@section('title')
    Add New Centers | Smart Life Investment
@endsection

@section('content')
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <!-- Tooltip validations start -->
        {{-- <section class="tooltip-validations" id="tooltip-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="validationTooltip01">First name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" required />
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="validationTooltip02">Last name</label>
                                        <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" required />
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                    <div class="col-md-4 col-12 mb-3">
                                        <label for="validationTooltip03">City</label>
                                        <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required />
                                        <div class="invalid-tooltip">Please provide a valid city.</div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Tooltip validations end -->

        <section id="input-sizing">
          <div class="row match-height">
              <div class="col-md-7 col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Add New Center</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-12">
                                <form class="needs-validation" novalidate>
                                  <div class="form-group row">
                                      <label for="colFormLabel" class="col-sm-3 col-form-label">Select Branch</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" id="basicSelect">
                                          <option value=" ">Select Your Branch</option>
                                          <option value="Kegalla">Kegalla</option>
                                          <option value="Awissawella">Awissawella</option>
                                      </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-3 col-form-label">Center Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="colFormLabel" placeholder="" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="colFormLabel" class="col-sm-3 col-form-label">Center Name</label>
                                  <div class="col-sm-9">
                                      <input type="text" class="form-control" id="colFormLabel" placeholder="" />
                                  </div>
                              </div>
                                  <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

    </div>
</div>
@endsection