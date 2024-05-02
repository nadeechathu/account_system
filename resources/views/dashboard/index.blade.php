@extends('layouts.main')

@section('title')
    Dashboard | Smart Life Investment
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
  <div class="content-header row">
  </div>
  <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce ">
          <div class="row match-height">
              <!-- Statistics Card -->
              <div class="col-xl-12 col-md-12 col-12 d-none-mobile">
                  <div class="card card-statistics">
                      <div class="card-body statistics-body">
                          <div class="row">
                              <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                  <div class="media" style="background: linear-gradient(73deg, #136827 , #34b352);">
                                      <div class="avatar bg-light-primary mr-2">
                                          <div class="avatar-content av-cont">
                                              <i data-feather="trending-up" class="avatar-icon"></i>
                                          </div>
                                      </div>
                                      <div class="media-body my-auto">
                                          <h4 class="font-weight-bolder mb-0 f-color">{{ $totalBrnach }}</h4>
                                          <p class="card-text font-small-3 mb-0 topic-color">Branchs</p>
                                          {{-- <a class="re-dir-bt" href="">View <i data-feather='arrow-right'></i></a> --}}
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                  <div class="media" style="background: linear-gradient(73deg, #001f3f , #4558a0);">
                                      <div class="avatar bg-light-info mr-2">
                                          <div class="avatar-content av-cont">
                                              <i data-feather="user" class="avatar-icon"></i>
                                          </div>
                                      </div>
                                      <div class="media-body my-auto">
                                          <h4 class="font-weight-bolder mb-0 f-color">{{ $totalCenter }}</h4>
                                          <p class="card-text font-small-3 mb-0 topic-color">Centers</p>
                                          @canany('Center access','Center edit','Center create','Center delete')
                                          <a class="re-dir-bt" href="{{ route('dashboard.center') }}" style="font-weight: 600">View <i data-feather='arrow-right'></i></a>
                                          @endcanany
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                  <div class="media" style="background: linear-gradient(73deg, #9f2935 , #9f29359e);">
                                      <div class="avatar bg-light-danger mr-2">
                                          <div class="avatar-content av-cont">
                                              <i data-feather="box" class="avatar-icon"></i>
                                          </div>
                                      </div>
                                      <div class="media-body my-auto">
                                          <h4 class="font-weight-bolder mb-0 f-color">{{ $totalMember }}</h4>
                                          <p class="card-text font-small-3 mb-0 topic-color">Members</p>
                                          @canany('Member access','Member edit','Member create','Member delete')
                                          <a class="re-dir-bt" href="{{ route('dashboard.member') }}" style="font-weight: 600">View <i data-feather='arrow-right'></i></a>
                                          @endcanany
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-3 col-sm-6 col-12">
                                  <div class="media" style="background: linear-gradient(73deg, #ff9f43, #ff9f4396 );">
                                      <div class="avatar bg-light-success mr-2">
                                          <div class="avatar-content av-cont">
                                              <i data-feather="dollar-sign" class="avatar-icon"></i>
                                          </div>
                                      </div>
                                      <div class="media-body my-auto">
                                          <h4 class="font-weight-bolder mb-0 f-color">{{ $totalLoan }}</h4>
                                          <p class="card-text font-small-3 mb-0 topic-color">Issued Loan</p>
                                          @canany('Loans access', 'Loans edit', 'Loans create', 'Loans delete')
                                          <a class="re-dir-bt" href="{{ route('dashboard.loans') }}" style="font-weight: 600">View <i data-feather='arrow-right'></i></a>
                                          @endcanany
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--/ Statistics Card -->
          </div>
          <div class="row match-height d-none-mobile">
              <div class="col-lg-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Loan Calculator</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" id="loanForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Loan Amount</label>
                                        <input type="text" id="loanAmount" class="form-control" name="loanAmount" placeholder="Eg : 30,000">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Rate</label>
                                        <input type="text" id="interestRate" class="form-control" name="interestRate" placeholder="Eg : 38 %">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Settle Weeks</label>
                                        <input type="text" id="week" class="form-control" name="week" placeholder="Eg : 20 weeks">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Total Amount</label>
                                        <input type="text" id="totalAmount" class="form-control" name="totalAmount" placeholder="Eg : 69,0000" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Interest</label>
                                        <input type="text" id="intrest" class="form-control" name="intrest" placeholder="Eg : 19,000" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Weekly Installment</label>
                                        <input type="text" id="instalment" class="form-control" name="instalment" placeholder="Eg : 3450" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Calculate</button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
          <div class="row d-block d-sm-none">

            <div class="col-12 pt-4">
                <a  href="{{ route('collects.loanCollectCreate') }}" class="text-center border-2 btn btn-warning waves-effect waves-float waves-light w-100">Loan Collection</a>
            </div>

            <div class="col-12 pt-4">
                <a href="{{ route('mobile.bulkReport') }}" class="text-center border-2 btn btn-primary waves-effect waves-float waves-light w-100">Bulk Collection</a>
            </div>

            <div class="col-12 pt-4">
                <a href="{{ route('mobile.allMembers') }}" class="text-center border-2 btn btn-success waves-effect waves-float waves-light w-100">View Members</a>
            </div>
            <div class="col-12 pt-4">
                <a href="{{ route('dashboard.singalMemberReport') }}" class="text-center border-2 btn btn-info waves-effect waves-float waves-light w-100">Single Members Report</a>
            </div>          </div>
      </section>
      <!-- Dashboard Ecommerce ends -->
  </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('#loanForm').submit(function(e) {
        e.preventDefault();
        var loanAmount = parseFloat($('#loanAmount').val());
        var interestRate = parseFloat($('#interestRate').val());
        var week = parseFloat($('#week').val());

        var totalAmount = loanAmount + (loanAmount * interestRate / 100);
        var intrest = (loanAmount * interestRate / 100);
        var instalment = (totalAmount / week);
        $('#totalAmount').val(totalAmount.toFixed(2));
        $('#intrest').val(intrest.toFixed(2));
        $('#instalment').val(instalment.toFixed(2));
      });
    });
  </script>
