<?php
namespace App\Http\Controllers;

use App\Saving2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Saving2Controller extends Controller
{
    public function getIndex()
    {
        return view('saving2.index');
    }

    public function getList()
    {
        Session::put('saving2_search', Input::has('ok') ? Input::get('search') : (Session::has('saving2_search') ? Session::get('saving2_search') : ''));
        Session::put('saving2_field', Input::has('field') ? Input::get('field') : (Session::has('saving2_field') ? Session::get('saving2_field') : 'member_name'));
        Session::put('saving2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('saving2_sort') ? Session::get('saving2_sort') : 'asc'));
        $saving2s = Saving2::where('id', 'like', '%' . Session::get('saving2_search') . '%')
            ->orderBy(Session::get('saving2_field'), Session::get('saving2_sort'))->paginate(8);
        return view('saving2.list', ['saving2s' => $saving2s]);
    }

    public function getUpdate($id)
    {
        return view('saving2.update', ['saving2' => Saving2::find($id)]);
    }

    public function postUpdate($id)
    {
        $saving2 = Saving2::find($id);
        /*$rules = ["unitprice" => "required|numeric"];
        if ($saving2->name != Input::get('name'))
            $rules += ['name' => 'required|unique:saving2s'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $saving2->serial_no = Input::get('serial_no');
        $saving2->noor = Input::get('noor');
        $saving2->member_name = Input::get('member_name');
        $saving2->member_id = Input::get('member_id');
        $saving2->mobile_no = Input::get('mobile_no');
        $saving2->date12       = Input::get('date12');
        $saving2->saving2_number = Input::get('saving2_number');
        $saving2->saving2_amount = Input::get('saving2_amount'); 
        $saving2->save();
        return ['url' => 'saving2/list'];
    }

    public function getCreate()
    {
        return view('saving2.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            //"name" => "required|unique:saving2s",
            //"Saving2Code" => "required|unique:saving2s",
            //"unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $saving2 = new Saving2();

        $saving2->serial_no = Input::get('serial_no');
        $saving2->noor = Input::get('noor');
        $saving2->member_name = Input::get('member_name');
        $saving2->member_id = Input::get('member_id');
        $saving2->mobile_no = Input::get('mobile_no');
        $saving2->date12       = Input::get('date12');
        $saving2->saving2_number = Input::get('saving2_number');
        $saving2->saving2_amount = Input::get('saving2_amount'); 

        //$saving2->name = Input::get('name');
        //$saving2->Saving2Code = Input::get('Saving2Code');
        //$saving2->unitprice = Input::get('unitprice');
        $saving2->save();
        return ['url' => 'saving2/list'];
    }

    public function getDelete($id)
    {
        Saving2::destroy($id);
        return Redirect('saving2/list');
    }

}