<?php
namespace App\Http\Controllers;

use App\Dpsapplication;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DpsapplicationController extends Controller
{
    public function getIndex()
    {
        return view('dpsapplication.index');
    }

    public function getList()
    {
        Session::put('dpsapplication_search', Input::has('ok') ? Input::get('search') : (Session::has('dpsapplication_search') ? Session::get('dpsapplication_search') : ''));
        Session::put('dpsapplication_field', Input::has('field') ? Input::get('field') : (Session::has('dpsapplication_field') ? Session::get('dpsapplication_field') : 'id'));
        Session::put('dpsapplication_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dpsapplication_sort') ? Session::get('dpsapplication_sort') : 'asc'));
        $dpsapplications = Dpsapplication::where('id', 'like', '%' . Session::get('dpsapplication_search') . '%')
            ->orderBy(Session::get('dpsapplication_field'), Session::get('dpsapplication_sort'))->paginate(8);
        return view('dpsapplication.list', ['dpsapplications' => $dpsapplications]);
    }

    public function getUpdate($id)
    {
        $Product_info = Product::lists('ProductName', 'id');
        return view('dpsapplication.update', ['dpsapplication' => Dpsapplication::find($id)],['Product_info' => $Product_info]);
    }

    public function postUpdate($id)
    {
        $dpsapplication = Dpsapplication::find($id);
        $rules = ["DpsProductId" => "required"];
        if ($dpsapplication->DpsAmount != Input::get('DpsAmount'))
            $rules += ['DpsAmount' => 'required'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dpsapplication->DpsProductId = Input::get('DpsProductId');
        $dpsapplication->Memberid = Input::get('Memberid');
        $dpsapplication->DpsAmount = Input::get('DpsAmount');
        $dpsapplication->DpsDepositDate = Input::get('DpsDepositDate');
        $dpsapplication->save();
        return ['url' => 'dpsapplication/list'];
    }

    public function getCreate()
    {
        $Product_info = Product::lists('ProductName', 'id');
        return view('dpsapplication.create',compact('Product_info'));
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "DpsCollection" => "required",
            "DpsAmount" => "required",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dpsapplication = new Dpsapplication();
        $dpsapplication->DpsProductId = Input::get('DpsProductId');
        $dpsapplication->Memberid = Input::get('Memberid');
        $dpsapplication->DpsAmount = Input::get('DpsAmount');
        $dpsapplication->DpsDepositDate = Input::get('DpsDepositDate');
        $dpsapplication->save();
        return ['url' => 'dpsapplication/list'];
    }

    public function getDelete($id)
    {
        Dpsapplication::destroy($id);
        return Redirect('dpsapplication/list');
    }

}