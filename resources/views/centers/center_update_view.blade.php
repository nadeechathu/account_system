@extends('layouts.main')

@section('title')
    Centers Details Update | Smart Life Investment
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
                                            <h2>Center Name : {{ $center->center_name }}</h2>
                                            </div>
                                                <div class="col-3">
                                                    @include('centers.components.new_center')
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
                                                action="{{ route('store_center_update',['id' => $center->id]) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label for="branch_id">Branch Name</label>
                                                            <select class="form-control" id="branch_id" name="branch_id">
                                                        @foreach ($branchs as $branchType)
                                                                <option  {{$branchType->id == $center->branch_id ? 'selected':''}} value="{{ $branchType->id}}">{{ $branchType->branch_name }}</option>
                                                        @endforeach
                                                        </select>

                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="center_code">Center Code</label>

                                                                <input type="text" class="form-control" id="center_code"
                                                                    name="center_code" value="{{ $center->center_code }}"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="center_name">Center Name</label>
                                                                <input type="text" class="form-control" id="center_name"
                                                                    name="center_name" value="{{ $center->center_name }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="center_allocate_date">Center Allocate Date</label>
                                                                  <select name="center_allocate_date" class="form-control" id="center_allocate_date">
                                                                    <option {{$center->center_allocate_date == 1 ? 'selected' : ''}} value="1">Monday</option>
                                                                    <option {{$center->center_allocate_date == 2 ? 'selected' : ''}} value="2">Tuesday</option>
                                                                    <option {{$center->center_allocate_date == 3 ? 'selected' : ''}} value="3">Wednesday</option>
                                                                    <option {{$center->center_allocate_date == 4 ? 'selected' : ''}} value="4">Thursday</option>
                                                                    <option {{$center->center_allocate_date == 5 ? 'selected' : ''}} value="5">Friday</option>
                                                                    <option {{$center->center_allocate_date == 6 ? 'selected' : ''}} value="6">Saturday</option>
                                                                    <option {{$center->center_allocate_date == 7 ? 'selected' : ''}} value="7">Sunday</option>
                                                                </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="executive_person">Executive Person</label>
                                                                      <select name="executive_person" class="form-control" id="executive_person">
                                                                        <option {{$center->executive_person == 1 ? 'selected' : ''}} value="1">Thiwanka Senarath</option>
                                                                        <option {{$center->executive_person == 2 ? 'selected' : ''}} value="2">Indika Anura</option>
                                                                        <option {{$center->executive_person == 3 ? 'selected' : ''}} value="3">Tharindu Dilshan</option>
                                                                        <option {{$center->executive_person == 4 ? 'selected' : ''}} value="4">Visuka Gayashan</option>
                                                                    </select>
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
