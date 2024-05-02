<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{{$loanCollection->member_code}} Details</title>

		<style>
            .heading {
                line-height:40px;
                font-size:16px;
            }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 10px;
				/* border: 1px solid #eee; */
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 2px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 25px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 10px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

            


			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

			.address-heading {
				padding-top:15px;
				font-size:1.1rem;
				font-weight:bold;
			}
          
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<header>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    <div style="float:left">
                                    <img src="{{$logo}}" style="width: 75%; max-width: 300px" /><br>
                                    </div>
                                    <div style="text-align:left;font-size:25px;padding-top:35px;">
                                    <b></b>
                                </div>
									
								</td>

								<td>														
                                    Printed On: {{date('Y-m-d H:i:s')}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>
		</header>
        <br>
		<hr>
        <br>
        <h2 style="text-align:left;"><u>Loan Collection Report :
			{{ $loanCollection->member->member_name }} - {{ $loanCollection->member->member_code }}</u></h2>
        <br>
        <table border="0" style="width:100%">
            <tr>
                <td style="width:15%; text-align:left">Member Code</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_code}}</td>
            </tr>
            {{-- <tr>
                <td style="width:15%; text-align:left">Loan Category</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">
                @if($loanCollection->loanCategory->categories_id == 1)
                Speed Loan
                @elseif($loanCollection->loanCategory->categories_id == 2)
                Business Loan
                @else
                Micro Loan
                @endif
                </td>
            </tr> --}}
            <tr>
                <td style="width:15%; text-align:left">Member Name</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_name}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Member Phone</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_phone_no}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Member NIC</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_nic}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Member Address</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_address}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Member Group</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->member->member_group_no}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Loan Amount</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">Rs : {{$loanCollection->member->loanCategory->loan_category_amount}}</td>
            </tr>
			<tr>
                <td style="width:15%; text-align:left">Loan Rental</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">Rs : {{ $loanCollection->loan_rental}}</td>
            </tr>
			<tr>
                <td style="width:15%; text-align:left">Loan Balance</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">Rs : {{ $loanCollection->loan_collected}}</td>
            </tr>
            {{-- <tr>
                <td style="width:15%; text-align:left">Branch</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->center != null ? ($loanCollection->center->branch != null ? $loanCollection->center->branch->branch_name : 'N/A') : 'N/A'}}</td>
            </tr>
            <tr>
                <td style="width:15%; text-align:left">Center</td>
                <td style="width:5%; text-align:left">-</td>
                <td style="width:50%">{{$loanCollection->center != null ? $loanCollection->center->center_name : 'N/A'}}</td>
            </tr> --}}
        </table>

        <hr>
		</div>
	</body>
</html>