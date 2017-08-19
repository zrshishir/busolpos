<?php
namespace App\Http\Controllers;

use App\Savingaccounts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SavingaccountsController extends Controller
{
    public function getIndex()
    {
        return view('savingaccounts.index');
    }

    public function getList()
    {
        Session::put('savingaccounts_search', Input::has('ok') ? Input::get('search') : (Session::has('savingaccounts_search') ? Session::get('savingaccounts_search') : ''));
        Session::put('savingaccounts_field', Input::has('field') ? Input::get('field') : (Session::has('savingaccounts_field') ? Session::get('savingaccounts_field') : 'id'));
        Session::put('savingaccounts_sort', Input::has('sort') ? Input::get('sort') : (Session::has('savingaccounts_sort') ? Session::get('savingaccounts_sort') : 'asc'));
        $savingaccountss = Savingaccounts::where('id', 'like', '%' . Session::get('savingaccounts_search') . '%')
            ->orderBy(Session::get('savingaccounts_field'), Session::get('savingaccounts_sort'))->paginate(8);
        return view('savingaccounts.list', ['savingaccountss' => $savingaccountss]);
    }

    public function getUpdate($id)
    {
        return view('savingaccounts.update', ['savingaccounts' => Savingaccounts::find($id)]);
    }

    public function postUpdate($id)
    {
        $savingaccounts = Savingaccounts::find($id);
        $rules = ["AccountType" => "required"];
        if ($savingaccounts->AccountCode != Input::get('AccountCode'))
            $rules += ['AccountCode' => 'required|unique:savingaccountss'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $savingaccounts->AccountCode = Input::get('AccountCode');
        $savingaccounts->AccountType = Input::get('AccountType');
        $savingaccounts->save();
        return ['url' => 'savingaccounts/list'];
    }

    public function getCreate()
    {
        return view('savingaccounts.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "AccountCode" => "required|unique:savingaccountss",
            "AccountType" => "required|unique:savingaccountss",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }


        $savingaccounts = new Savingaccounts();
        $savingaccounts->AccountCode = Input::get('AccountCode');
        $savingaccounts->AccountType = Input::get('AccountType');
        $savingaccounts->save();

        return ['url' => 'savingaccounts/list'];
    }

    public function getDelete($id)
    {
        Savingaccounts::destroy($id);
        return Redirect('savingaccounts/list');
    }

}