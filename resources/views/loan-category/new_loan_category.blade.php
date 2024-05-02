@extends('layouts.main')

@section('title')
    Add New Loan Category | Smart Life Investment
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
                                                    <h2>Add New Loan Category</h2>
                                                </div>
                                                <div class="col-3">
                                                </div>
                                            </div>
                                            <div class="demo-inline-spacing">
                                                <!-- Basic trigger modal -->
                                                <div class="basic-modal mt-0">
                                                </div>
                                              </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-12 px-3">
                                                <form class="form form-vertical" action="{{ route('loanCategory.create')}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="categories_id">
                                                                  Loan Category Name</label>
                                                                  <select name="categories_id" class="form-control" id="categories_id" required>
                                                                    <option >--- Select loan ---</option>
                                                                    <option value="1">Speed Loan</option>
                                                                    <option value="2">Business Loan</option>
                                                                    <option value="3">Micro Loan</option>

                                                                  </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_amount">
                                                                  Loan Amount</label>
                                                                <input type="text" class="form-control" id="loan_category_amount"
                                                                    name="loan_category_amount" value="{{old('loan_category_amount')}}" placeholder="Loan Amount" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_interst_rate">
                                                                  Loan Interst Rate</label>
                                                                <input type="text" class="form-control"
                                                                    id="loan_interst_rate" name="loan_interst_rate"
                                                                    value="{{old('loan_interst_rate')}}" placeholder="Loan Interst Rate" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_duration">Loan Duration</label>
                                                                <input type="text" class="form-control"
                                                                    id="loan_duration" name="loan_duration" value="{{old('loan_duration')}}" placeholder="Loan Duration"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_def_docharg">Document Charges</label>
                                                                <input type="text" class="form-control" id="loan_category_def_docharg"
                                                                    name="loan_category_def_docharg" value="{{old('loan_category_def_docharg')}}" placeholder="Document Charges" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Add Loan Category</button>
                                                            <button type="reset"
                                                                class="btn btn-outline-secondary waves-effect">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
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
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
