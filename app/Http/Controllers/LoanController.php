<?php
namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function getIndex()
    {
        return view('loan.index');
    }

    public function getList()
    {
        Session::put('loan_search', Input::has('ok') ? Input::get('search') : (Session::has('loan_search') ? Session::get('loan_search') : ''));
        Session::put('loan_field', Input::has('field') ? Input::get('field') : (Session::has('loan_field') ? Session::get('loan_field') : 'name'));
        Session::put('loan_sort', Input::has('sort') ? Input::get('sort') : (Session::has('loan_sort') ? Session::get('loan_sort') : 'asc'));
        $loans = Loan::where('name', 'like', '%' . Session::get('loan_search') . '%')
            ->orderBy(Session::get('loan_field'), Session::get('loan_sort'))->paginate(8);
        return view('loan.list', ['loans' => $loans]);
    }

    public function getUpdate($id)
    {
        return view('loan.update', ['loan' => Loan::find($id)]);
    }

    public function postUpdate($id)
    {
        $loan = Loan::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($loan->name != Input::get('name'))
            $rules += ['name' => 'required|unique:loans'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $loan->name = Input::get('name');
        $loan->LoanCode = Input::get('LoanCode');
        $loan->unitprice = Input::get('unitprice');
        $loan->save();
        return ['url' => 'loan/list'];
    }

    public function getCreate()
    {
        return view('loan.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:loans",
            "LoanCode" => "required|unique:loans",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $loan = new Loan();
        $loan->name = Input::get('name');
        $loan->LoanCode = Input::get('LoanCode');
        $loan->unitprice = Input::get('unitprice');
        $loan->save();
        return ['url' => 'loan/list'];
    }

    public function getDelete($id)
    {
        Loan::destroy($id);
        return Redirect('loan/list');
    }

}