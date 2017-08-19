<?php
namespace App\Http\Controllers;

use App\Saving;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SavingController extends Controller
{
    public function getIndex()
    {

        return view('saving.index');

    }

    public function getList()
    {

        Session::put('saving_search', Input::has('ok') ? Input::get('search') : (Session::has('saving_search') ? Session::get('saving_search') : ''));

        Session::put('saving_field', Input::has('field') ? Input::get('field') : (Session::has('saving_field') ? Session::get('saving_field') : 'member_name'));

        Session::put('saving_sort', Input::has('sort') ? Input::get('sort') : (Session::has('saving_sort') ? Session::get('saving_sort') : 'asc'));
        
        $savings = Saving::where('member_name', 'like', '%' . Session::get('saving_search') . '%') 
            ->orderBy(Session::get('saving_field'), Session::get('saving_sort'))->paginate(8);
        return view('saving.list', ['savings' => $savings]);

    }

    public function getUpdate($id)
    {
        return view('saving.update', ['saving' => Saving::find($id)]);
    }

    public function postUpdate($id)
    {
        $saving = Saving::find($id);
        // // $rules = ["unitprice" => "required|numeric"];
        // if ($saving->member_name != Input::get('member_name'))
        //     $rules += ['member_name' => 'required|unique:savings'];
        // $validator = Validator::make(Input::all(), $rules);
        // if ($validator->fails()) {
        //     return array(
        //         'fail' => true,
        //         'errors' => $validator->getMessageBag()->toArray()
        //     );
        // }
        $saving-> serial_no = Input::get('serial_no');
        $saving-> member_id = Input::get('member_id');
        $saving-> member_name = Input::get('member_name');
        $saving-> mobile_no = Input::get('mobile_no');
        $saving-> saving_amount = Input::get('saving_amount');
        $saving-> withdrawal_amount = Input::get('withdrawal_amount');
        $saving-> created_at = Input::get('created_at');
        $saving-> updated_at = Input::get('updated_at');
        $saving->save();
       // $saving->serial_no = Input::get('serial_no');
       //  $saving->member_name = Input::get('member_name');       
       //  $saving->member_id = Input::get('member_id');
       //  $saving->mobile_no = Input::get('mobile_no');
       //  $saving->date       = Input::get('date');
       //  $saving->app_form = Input::get('app_form');
       //  $saving->passbook = Input::get('passbook');
       //  $saving->share_number = Input::get('share_number');
       //  $saving->share_amount = Input::get('share_amount');
       //  $saving->saving_amount = Input::get('saving_amount');   
       //  $saving->name = Input::get('name');       
       //  $saving->CompanyrajCode = Input::get('CompanyrajCode');
       //  $saving->unitprice = Input::get('unitprice');
       //  $saving->save();
        return ['url' => 'saving/list'];
    }

    public function getCreate()
    {
        return view('saving.create');
    }

    public function postCreate()
    {
        // $validator = Validator::make(Input::all(), [
        //     "name" => "required|unique:savings"
        //     // "CompanyrajCode" => "required|unique:savings",
        //     // "unitprice" => "required|numeric"
        // ]);
        // if ($validator->fails()) {
        //     return array(
        //         'fail' => true,
        //         'errors' => $validator->getMessageBag()->toArray()
        //     );
        // }
       
        
        $saving = new Saving();
        $saving-> serial_no = Input::get('serial_no');
        $saving-> member_id = Input::get('member_id');
        $saving-> member_name = Input::get('member_name');
        $saving-> mobile_no = Input::get('mobile_no');
        $saving-> saving_amount = Input::get('saving_amount');
        $saving-> withdrawal_amount = Input::get('withdrawal_amount');
        $saving-> created_at = Input::get('created_at');
        $saving-> updated_at = Input::get('updated_at');
        $saving->save();
        // $saving = new saving();
        // $saving->serial_no = Input::get('serial_no');
        // $saving->member_name = Input::get('member_name');       
        // $saving->member_id = Input::get('member_id');
        // $saving->mobile_no = Input::get('mobile_no');
        // $saving->date       = Input::get('date');
        // $saving->app_form = Input::get('app_form');
        // $saving->passbook = Input::get('passbook'); 
        // $saving->share_number = Input::get('share_number'); 
        // $saving->share_amount = Input::get('share_amount');
        // $saving->saving_amount = Input::get('saving_amount');  
        // $saving->name = Input::get('name');       
        // $saving->CompanyrajCode = Input::get('CompanyrajCode');
        // $saving->unitprice = Input::get('unitprice');
        // $saving->save();
        return ['url' => 'saving/list'];
    }

    public function getDelete($id)
    {
        Saving::destroy($id);
        return Redirect('saving/list');
    }

}