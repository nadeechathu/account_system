@extends('layouts.main')

@section('title')
    Loan Category Edit | Smart Life Investment
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
<h2>Loan Category Name : 
  @if($loancategory->categories_id == 1)
  Speed Loan
@elseif($loancategory->categories_id == 2)
Business Loan
@else
Micro Loan
@endif


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
                                                <form class="form form-vertical"

                                                action="{{ route('store_loan_category_update',['id' => $loancategory->id]) }}"

                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="categories_id">Loan Category Name</label>
                                                                
                                                                    <select name="categories_id" class="form-control" id="categories_id">
                                                                        <option {{$loancategory->categories_id == 1 ? 'selected' : ''}} value="1">Speed Loan</option>
                                                                        <option {{$loancategory->categories_id == 2 ? 'selected' : ''}} value="2">Business Loan</option>
                                                                        <option {{$loancategory->categories_id == 3 ? 'selected' : ''}} value="3">Micro Loan</option>

                                                                    </select>



                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="loan_category_amount">Center Name</label>
                                                                <input type="text" class="form-control" id="loan_category_amount"
                                                                    name="loan_category_amount" value="{{ $loancategory->loan_category_amount }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                          <div class="form-group">
                                                              <label for="loan_interst_rate">Center Name</label>
                                                              <input type="text" class="form-control" id="loan_interst_rate"
                                                                  name="loan_interst_rate" value="{{ $loancategory->loan_interst_rate }}"
                                                                  required>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="loan_duration">Center Name</label>
                                                            <input type="text" class="form-control" id="loan_duration"
                                                                name="loan_duration" value="{{ $loancategory->loan_duration }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                      <div class="form-group">
                                                          <label for="loan_category_def_docharg">Center Name</label>
                                                          <input type="text" class="form-control" id="loan_category_def_docharg"
                                                              name="loan_category_def_docharg" value="{{ $loancategory->loan_category_def_docharg }}"
                                                              required>
                                                      </div>
                                                  </div>
                                                        <div class="col-12">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 waves-effect waves-float waves-light">Update</button>
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
