<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanCategory;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;

class LoanCategoryController extends Controller
{
    //
    public function loancategory(){
        $data = LoanCategory::all();
        return view('loan-category.all_loan_categories',compact('data'));
    }

    public function getLoanCategory()
    {

        $datas = LoanCategory::where('loan_category_status', 1)->orderBy('id', 'DESC')->get();
        return DataTables::of($datas)
            ->addColumn('DT_RowIndex', function () {
                static $index = 1;
                return $index++;
            })
            ->editColumn('categories_id', function(LoanCategory $data) {

                if($data->categories_id == 1){
                    return 'Speed Loan';
                }
                elseif($data->categories_id == 2){
                    return 'Business Loan';
                }

                elseif($data->categories_id == 3){
                    return 'Micro Loan';
                }
            })

            ->editColumn('loan_category_amount', function (LoanCategory $data) {

                return "Rs.$data->loan_category_amount";
                
            })

            ->editColumn('loan_category_def_docharg', function (LoanCategory $data) {

                return "Rs.$data->loan_category_def_docharg";
            })

            ->addColumn('actions', function (LoanCategory $data) {

                $DeleteUrl = route('loanCategory.remove', $data->id);
                //$ViewUrl = route('loanCategory.view', $data->id);
                $UpdateUrl = route('loanCategory.update', $data->id);

                if (Gate::any(['Loans Category edit']) && Gate::any(['Loans Category delete'])) {

                    return '<div class="ActionBtnList text-center">

                    <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
    
                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation(' . $data->id . ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </div>';

                }elseif(Gate::any(['Loans Category edit'])){
                    return '<div class="ActionBtnList text-center">
                    <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';
                }else{

                }

                // return '<div class="ActionBtnList text-center">

                // <a href="' . $UpdateUrl . '"><button type="button" class="btn btn-sm btn-warning waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                //     <button type="button" class="btn btn-sm btn-danger waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Delete" onClick="openDeleteConfirmation(' . $data->id . ')" data-target="#delectCenter" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                //     </div>
                
                // ';

            })
            ->rawColumns(['DT_RowIndex', 'categories_id', 'loan_category_amount', 'loan_interst_rate', 'loan_duration','loan_category_def_docharg' ,'actions'])
            ->toJson();
    }

    public function loanCategoryStoreUI()
    {
        //$centers = Center::with('branch')->where('center_status', 1)->get();
        return view('loan-category.new_loan_category');
    }

    public function loanCategoryStore(Request $request)
    {

        try {

            $validated = $request->validate([
                'categories_id' => 'required',
                'loan_category_amount' => 'required',
                'loan_interst_rate' => 'required',
                'loan_duration' => 'required',
                'loan_category_def_docharg' => 'required',

            ]);



            $loancategory = new LoanCategory;

            $loancategory->categories_id = $request->categories_id;
            $loancategory->loan_category_amount = $request->loan_category_amount;
            $loancategory->loan_interst_rate = $request->loan_interst_rate;
            $loancategory->loan_duration = $request->loan_duration;
            $loancategory->loan_category_def_docharg = $request->loan_category_def_docharg;
            $loancategory->loan_category_status = 1;

            $loancategory->save();

            return redirect('dashboard/loancategory')->with('success', "Loan Category created successfully !");
        } catch (\Exception $exception) {
            //var_dump($error);
            return redirect('dashboard/loancategory')->with('error', $exception->getMessage());
        }
    }

    public function removeLoanCategory($id)
    {
        try {

            $loancategory = LoanCategory::find($id);
            $loancategory->loan_category_status = 0;
            if ($loancategory->save()) {
                return back()->with('success', 'Loan Category deleted successfully !');
            } else {

                return back()->with('error', 'Could not Loan Category  !');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Error occured - ' . $exception->getMessage());
        }
    }

    public function viewLoanCategorySingle($id)
    {
        //$member = LoanCategory::with('center')->where('id', $id)->get()->first();
        $loancategory = LoanCategory::findOrFail($id);
        //return view('loanCategory.loan_category_view_update', compact('loancategory'));
        return view('loan-category.loan_category_single',compact('loancategory'));
    }


    public function updateLoanCategory(Request $request, $id)
    {
        try{
                $validated = $request->validate([
                    'categories_id' => 'required',
                    'loan_category_amount' => 'required',
                    'loan_interst_rate' => 'required',
                    'loan_duration' => 'required',
                    'loan_category_def_docharg' => 'required',
                ]);

               // $member = LoanCategory::where('id',$id)->get()->first();
                $loancategory = LoanCategory::where('id',$id)->get()->first();


                if($loancategory != null){



            $loancategory->categories_id = $request->categories_id;
            $loancategory->loan_category_amount = $request->loan_category_amount;
            $loancategory->loan_interst_rate = $request->loan_interst_rate;
            $loancategory->loan_duration = $request->loan_duration;
            $loancategory->loan_category_def_docharg = $request->loan_category_def_docharg;
            $loancategory->loan_category_status = 1;

                    $loancategory->save();

                    return redirect('dashboard/loancategory')->with('success', "Loan Category updated successfully !");

                }else{

                    return redirect('dashboard/loancategory')->with('error',"Could not find the Loan Category !");
                }

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }



}