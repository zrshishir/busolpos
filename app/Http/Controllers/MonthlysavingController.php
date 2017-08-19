<?php
namespace App\Http\Controllers;

use App\Monthlysaving;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MonthlysavingController extends Controller
{
    public function getIndex()
    {

        return view('monthlysaving.index');

    }

    public function getList()
    {

        Session::put('monthlysaving_search', Input::has('ok') ? Input::get('search') : (Session::has('monthlysaving_search') ? Session::get('monthlysaving_search') : ''));

        Session::put('monthlysaving_field', Input::has('field') ? Input::get('field') : (Session::has('monthlysaving_field') ? Session::get('monthlysaving_field') : 'member_name'));

        Session::put('monthlysaving_sort', Input::has('sort') ? Input::get('sort') : (Session::has('monthlysaving_sort') ? Session::get('monthlysaving_sort') : 'asc'));

        $monthlysavings = Monthlysaving::where('member_name', 'like', '%' . Session::get('monthlysaving_search') . '%') 
            ->orderBy(Session::get('monthlysaving_field'), Session::get('monthlysaving_sort'))->paginate(8);

        return view('monthlysaving.list', ['monthlysavings' => $monthlysavings]);

    }

    public function getUpdate($id)
    {
        return view('monthlysaving.update', ['monthlysaving' => Monthlysaving::find($id)]);
    }

    public function postUpdate($id)
    {
        $monthlysaving = Monthlysaving::find($id);
        // // $rules = ["unitprice" => "required|numeric"];
        // if ($monthlysaving->member_name != Input::get('member_name'))
        //     $rules += ['member_name' => 'required|unique:monthlysavings'];
        // $validator = Validator::make(Input::all(), $rules);
        // if ($validator->fails()) {
        //     return array(
        //         'fail' => true,
        //         'errors' => $validator->getMessageBag()->toArray()
        //     );
        // }
        $monthlysaving-> serial_no = Input::get('serial_no');
        $monthlysaving-> member_id = Input::get('member_id');
        $monthlysaving-> member_name = Input::get('member_name');
        $monthlysaving-> mobile_no = Input::get('mobile_no');
        $monthlysaving-> saving_amount = Input::get('saving_amount');
        $monthlysaving-> withdrawal_amount = Input::get('withdrawal_amount');
        $monthlysaving-> created_at = Input::get('created_at');
        $monthlysaving-> updated_at = Input::get('updated_at');
        $monthlysaving->save();
       // $monthlysaving->serial_no = Input::get('serial_no');
       //  $monthlysaving->member_name = Input::get('member_name');       
       //  $monthlysaving->member_id = Input::get('member_id');
       //  $monthlysaving->mobile_no = Input::get('mobile_no');
       //  $monthlysaving->date       = Input::get('date');
       //  $monthlysaving->app_form = Input::get('app_form');
       //  $monthlysaving->passbook = Input::get('passbook');
       //  $monthlysaving->share_number = Input::get('share_number');
       //  $monthlysaving->share_amount = Input::get('share_amount');
       //  $monthlysaving->saving_amount = Input::get('saving_amount');   
       //  $monthlysaving->name = Input::get('name');       
       //  $monthlysaving->CompanyrajCode = Input::get('CompanyrajCode');
       //  $monthlysaving->unitprice = Input::get('unitprice');
       //  $monthlysaving->save();
        return ['url' => 'monthlysaving/list'];
    }

    public function getCreate()
    {
        return view('monthlysaving.create');
    }

    public function postCreate()
    {
        // $validator = Validator::make(Input::all(), [
        //     "name" => "required|unique:monthlysavings"
        //     // "CompanyrajCode" => "required|unique:monthlysavings",
        //     // "unitprice" => "required|numeric"
        // ]);
        // if ($validator->fails()) {
        //     return array(
        //         'fail' => true,
        //         'errors' => $validator->getMessageBag()->toArray()
        //     );
        // }
       
        
        $monthlysaving = new Monthlysaving();
        $monthlysaving-> serial_no = Input::get('serial_no');
        $monthlysaving-> member_id = Input::get('member_id');
        $monthlysaving-> member_name = Input::get('member_name');
        $monthlysaving-> mobile_no = Input::get('mobile_no');
        $monthlysaving-> saving_amount = Input::get('saving_amount');
        $monthlysaving-> withdrawal_amount = Input::get('withdrawal_amount');
        $monthlysaving-> created_at = Input::get('created_at');
        $monthlysaving-> updated_at = Input::get('updated_at');
        $monthlysaving->save();
        // $monthlysaving = new monthlysaving();
        // $monthlysaving->serial_no = Input::get('serial_no');
        // $monthlysaving->member_name = Input::get('member_name');       
        // $monthlysaving->member_id = Input::get('member_id');
        // $monthlysaving->mobile_no = Input::get('mobile_no');
        // $monthlysaving->date       = Input::get('date');
        // $monthlysaving->app_form = Input::get('app_form');
        // $monthlysaving->passbook = Input::get('passbook'); 
        // $monthlysaving->share_number = Input::get('share_number'); 
        // $monthlysaving->share_amount = Input::get('share_amount');
        // $monthlysaving->saving_amount = Input::get('saving_amount');  
        // $monthlysaving->name = Input::get('name');       
        // $monthlysaving->CompanyrajCode = Input::get('CompanyrajCode');
        // $monthlysaving->unitprice = Input::get('unitprice');
        // $monthlysaving->save();
        return ['url' => 'monthlysaving/list'];
    }

    public function getDelete($id)
    {
        Monthlysaving::destroy($id);
        return Redirect('monthlysaving/list');
    }

}