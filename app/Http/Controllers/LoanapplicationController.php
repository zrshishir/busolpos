<?php
namespace App\Http\Controllers;

use App\Loanapplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoanapplicationController extends Controller
{
    public function getIndex()
    {
        return view('loanapplication.index');
    }

    public function getList()
    {
        Session::put('loanapplication_search', Input::has('ok') ? Input::get('search') : (Session::has('loanapplication_search') ? Session::get('loanapplication_search') : ''));
        Session::put('loanapplication_field', Input::has('field') ? Input::get('field') : (Session::has('loanapplication_field') ? Session::get('loanapplication_field') : 'name'));
        Session::put('loanapplication_sort', Input::has('sort') ? Input::get('sort') : (Session::has('loanapplication_sort') ? Session::get('loanapplication_sort') : 'asc'));
        $loanapplications = Loanapplication::where('name', 'like', '%' . Session::get('loanapplication_search') . '%')
            ->orderBy(Session::get('loanapplication_field'), Session::get('loanapplication_sort'))->paginate(8);
        return view('loanapplication.list', ['loanapplications' => $loanapplications]);
    }

    public function getUpdate($id)
    {
        return view('loanapplication.update', ['loanapplication' => Loanapplication::find($id)]);
    }

    public function postUpdate($id)
    {
        $loanapplication = Loanapplication::find($id);
        $rules = ["unitprice" => "required|numeric"];
        if ($loanapplication->name != Input::get('name'))
            $rules += ['name' => 'required|unique:loanapplications'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $loanapplication->name = Input::get('name');
        $loanapplication->LoanapplicationCode = Input::get('LoanapplicationCode');
        $loanapplication->unitprice = Input::get('unitprice');
        $loanapplication->save();
        return ['url' => 'loanapplication/list'];
    }

    public function getCreate()
    {
        return view('loanapplication.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "name" => "required|unique:loanapplications",
            "LoanapplicationCode" => "required|unique:loanapplications",
            "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $loanapplication = new Loanapplication();
        $loanapplication->name = Input::get('name');
        $loanapplication->LoanapplicationCode = Input::get('LoanapplicationCode');
        $loanapplication->unitprice = Input::get('unitprice');
        $loanapplication->save();
        return ['url' => 'loanapplication/list'];
    }

    public function getDelete($id)
    {
        Loanapplication::destroy($id);
        return Redirect('loanapplication/list');
    }

}