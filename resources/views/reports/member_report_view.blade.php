@extends('layouts.main')

@section('title')
    Member Report Page | Smart Life Investment
@endsection

<style>
  @media print {
    body * {
        visibility: hidden;
    }
    
    #printTableContainer,
    #printTableContainer * {
        visibility: visible;
    }
    
    #printTableContainer {
        position: absolute;
        left: 0;
        top: 0;
    }
    
    #printTableContainer table {
        width: 100%;
        border-collapse: collapse;
    }
    
    #printTableContainer table th,
    #printTableContainer table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    
    #printTableContainer table th {
        background-color: #f2f2f2;
    }
}

</style>

@section('content')
<div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
  <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Bootstrap Tables</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Table Bootstrap
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Table Basic</h4>
                                <button onclick="printTableData()">Print Beautiful Table</button>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
                                    can use any example of below table for your table and it can be use with any type of bootstrap tables.
                                </p>
                            </div>
                            <div class="table-responsive">
                              <div id="printTableContainer">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Branch</th>
                                            <th>Center</th>
                                            <th>Member Code</th>
                                            <th>Member Name</th>
                                            <th>NIC</th>
                                            <th>Address</th>
                                            <th>Group No</th>
                                            <th>Register Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>Kegalla</td>
                                        <td>Thalagamuwa</td>
                                        <td>S01/BL/001</td>
                                        <td>Supun Adikari</td>
                                        <td>9304778V</td>
                                        <td>no74 , Haggalla , Ellakala</td>
                                        <td>1</td>
                                        <td>20223-08-07</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Kegalla</td>
                                        <td>Thalagamuwa</td>
                                        <td>S01/BL/001</td>
                                        <td>Supun Adikari</td>
                                        <td>9304778V</td>
                                        <td>no74 , Haggalla , Ellakala</td>
                                        <td>1</td>
                                        <td>20223-08-07</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Kegalla</td>
                                        <td>Thalagamuwa</td>
                                        <td>S01/BL/001</td>
                                        <td>Supun Adikari</td>
                                        <td>9304778V</td>
                                        <td>no74 , Haggalla , Ellakala,Nittabuwa</td>
                                        <td>1</td>
                                        <td>20223-08-07</td>
                                      </tr>
                                      <tr>
                                        <td>1</td>
                                        <td>Kegalla</td>
                                        <td>Thalagamuwa</td>
                                        <td>S01/BL/001</td>
                                        <td>Supun Adikari</td>
                                        <td>9304778V</td>
                                        <td>no74 , Haggalla , Ellakala</td>
                                        <td>1</td>
                                        <td>20223-08-07</td>
                                      </tr>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->

            </div>
        </div>

@endsection

<script>
  function printTableData() {
      var table = document.querySelector('#printTableContainer table').outerHTML;

      var printWindow = window.open('', '_blank');
      printWindow.document.write('<html><head><title>Print Beautiful Table</title></head><body>');
      printWindow.document.write('<style>@media print { body * { visibility: hidden; } #printTableContainer, #printTableContainer * { visibility: visible; } }</style>');
      printWindow.document.write('<div id="printTableContainer">' + table + '</div>');
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();
  }
</script>

