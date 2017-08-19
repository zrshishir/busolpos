<?php
namespace App\Http\Controllers;

use App\Savingsmoneyreceipt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SavingsmoneyreceiptController extends Controller
{
    public function getIndex()
    {
        return view('savingsmoneyreceipt.index');
    }

    public function getList()
    {
        Session::put('savingsmoneyreceipt_search', Input::has('ok') ? Input::get('search') : (Session::has('savingsmoneyreceipt_search') ? Session::get('savingsmoneyreceipt_search') : ''));
        Session::put('savingsmoneyreceipt_field', Input::has('field') ? Input::get('field') : (Session::has('savingsmoneyreceipt_field') ? Session::get('savingsmoneyreceipt_field') : 'name'));
        Session::put('savingsmoneyreceipt_sort', Input::has('sort') ? Input::get('sort') : (Session::has('savingsmoneyreceipt_sort') ? Session::get('savingsmoneyreceipt_sort') : 'asc'));
        $savingsmoneyreceipts = Savingsmoneyreceipts::where('name', 'like', '%' . Session::get('loanapplicationmoneyreceipt_search') . '%')
            ->orderBy(Session::get('savingsmoneyreceipt_field'), Session::get('savingsmoneyreceipt_sort'))->paginate(8);
        return view('savingsmoneyreceipt.list', ['savingsmoneyreceipts' => $savingsmoneyreceipts]);
    }

    public function getUpdate($id)
    {
        return view('savingsmoneyreceipt.update', ['savingsmoneyreceipt' => Savingsmoneyreceipt::find($id)]);
    }

    public function postUpdate($id)
    {
        $savingsmoneyreceipt = Savingsmoneyreceipt::find($id);
        $rules = ["form_fee" => "required|numeric"];
        if ($savingsmoneyreceipt->name != Input::get('name'))
            $rules += ['name' => 'required|unique:savingsmoneyreceipts'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $savingsmoneyreceipt                = new Savingsmoneyreceipt();
        $savingsmoneyreceipt->serial_no     = Input::get('serial_no');
        $savingsmoneyreceipt->name          = Input::get('name');
        $savingsmoneyreceipt->CSMId         = Input::get('member_id');
        $savingsmoneyreceipt->moblie_no     = Input::get('moblie_no');
        $savingsmoneyreceipt->date          = Input::get('date');
        $savingsmoneyreceipt->form_fee      = Input::get('form_fee');
        $savingsmoneyreceipt->save();
        return ['url' => 'savingsmoneyreceipt/list'];
    }

    public function getCreate()
    {
        return view('savingsmoneyreceipt.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name"      => "required|unique:savingsmoneyreceipts",
            "member_id"     => "required|unique:member_id",
            "form_fee"  => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $savingsmoneyreceipt                = new Savingsmoneyreceipt();
        $savingsmoneyreceipt->serial_no     = Input::get('serial_no');
        $savingsmoneyreceipt->name          = Input::get('name');
        $savingsmoneyreceipt->CSMId         = Input::get('member_id');
        $savingsmoneyreceipt->moblie_no     = Input::get('moblie_no');
        $savingsmoneyreceipt->date          = Input::get('date');
        $savingsmoneyreceipt->form_fee      = Input::get('form_fee');
        $savingsmoneyreceipt->save();
        return ['url' => 'savingsmoneyreceipt/list'];
    }

    public function getDelete($id)
    {
        Savingsmoneyreceipt::destroy($id);
        return Redirect('savingsmoneyreceipt/list');
    }

}