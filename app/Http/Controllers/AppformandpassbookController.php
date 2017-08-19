<?php
namespace App\Http\Controllers;

use App\Appformandpassbook;
use App\Share;
use App\User;
use App\Addshare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AppformandpassbookController extends Controller
{
    public function getIndex()
    {

        return view('appformandpassbook.index');

    }

    public function getList()
    {

        Session::put('appformandpassbook_search', Input::has('ok') ? Input::get('search') : (Session::has('appformandpassbook_search') ? Session::get('appformandpassbook_search') : ''));

        Session::put('appformandpassbook_field', Input::has('field') ? Input::get('field') : (Session::has('appformandpassbook_field') ? Session::get('appformandpassbook_field') : 'member_name'));

        Session::put('appformandpassbook_sort', Input::has('sort') ? Input::get('sort') : (Session::has('appformandpassbook_sort') ? Session::get('appformandpassbook_sort') : 'asc'));

        $appformandpassbooks = Appformandpassbook::where('member_name', 'like', '%' . Session::get('appformandpassbook_search') . '%') 
            ->orderBy(Session::get('appformandpassbook_field'), Session::get('appformandpassbook_sort'))->paginate(8);
        return view('appformandpassbook.list', ['appformandpassbooks' => $appformandpassbooks]);

    }

    public function getUpdate($id)
    {
        return view('appformandpassbook.update', ['appformandpassbook' => Appformandpassbook::find($id)]);
    }

    public function postUpdate($id)
    {
        $user_id = Auth::user()->id;
        $appformandpassbook = Appformandpassbook::find($id);
        $appformandpassbook->serial_no = Input::get('serial_no');
        $appformandpassbook->member_name = Input::get('member_name');       
        $appformandpassbook->member_id = Input::get('member_id');
        $appformandpassbook->mobile_no = Input::get('mobile_no');
        $appformandpassbook->date       = Input::get('date');
        $appformandpassbook->app_form = Input::get('app_form');
        $appformandpassbook->passbook = Input::get('passbook');
        $appformandpassbook->saving_amount = Input::get('saving_amount'); 
        $appformandpassbook->share_number = Input::get('share_number');
        $appformandpassbook->share_amount = Input::get('share_amount');          
        $appformandpassbook->name = Input::get('name');       
        $appformandpassbook->unitprice = Input::get('unitprice');
        $appformandpassbook->created_by = $user_id;
        $appformandpassbook->save();

        $addshare = new Addshare();
        $addshare->serial_no = Input::get('serial_no');
        $addshare->member_id = Input::get('member_id');
        $addshare->date = Input::get('date');
        $addshare->share_number = Input::get('share_number');
        $addshare->share_amount = Input::get('share_amount');
        $addshare->save();

        $share = new Share();
        $share->serial_no    = Input::get('serial_no');
        $share->member_id  = Input::get('member_id');       
        $share->member_name    = Input::get('member_name');
        $share->mobile_no         = Input::get('mobile_no');
        $share->base_share_number = Input::get('share_number'); 
        $share->base_share_amount = Input::get('share_amount');
        $share->present_share_number = Input::get('share_number'); 
        $share->present_share_amount = Input::get('share_amount');
        $share->date           = Input::get('date');
        $share->save();
        return ['url' => 'appformandpassbook/list'];
    }

    public function getCreate()
    {
        return view('appformandpassbook.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "member_id" => "required|unique:appformandpassbooks"
            // "CompanyrajCode" => "required|unique:appformandpassbooks",
            // "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $user_id = Auth::user()->id;
        $appformandpassbook = new Appformandpassbook();
        $appformandpassbook->serial_no = Input::get('serial_no');
        $appformandpassbook->member_name = Input::get('member_name');       
        $appformandpassbook->member_id = Input::get('member_id');
        $appformandpassbook->mobile_no = Input::get('mobile_no');
        $appformandpassbook->date       = Input::get('date');
        $appformandpassbook->app_form = Input::get('app_form');
        $appformandpassbook->passbook = Input::get('passbook');
        $appformandpassbook->saving_amount = Input::get('saving_amount'); 
        $appformandpassbook->share_number = Input::get('share_number');
        $appformandpassbook->share_amount = Input::get('share_amount');          
        $appformandpassbook->name = Input::get('name');       
        $appformandpassbook->unitprice = Input::get('unitprice');
        $appformandpassbook->created_by = $user_id;
        $appformandpassbook->save();

        $addshare = new Addshare();
        $addshare->serial_no = Input::get('serial_no');
        $addshare->member_id = Input::get('member_id');
        $addshare->date = Input::get('date');
        $addshare->share_number = Input::get('share_number');
        $addshare->share_amount = Input::get('share_amount');
        $addshare->save();

        $share = new Share();
        $share->serial_no    = Input::get('serial_no');
        $share->member_id  = Input::get('member_id');       
        $share->member_name    = Input::get('member_name');
        $share->mobile_no         = Input::get('mobile_no');
        $share->base_share_number = Input::get('share_number'); 
        $share->base_share_amount = Input::get('share_amount');
        $share->present_share_number = Input::get('share_number'); 
        $share->present_share_amount = Input::get('share_amount');
        $share->date           = Input::get('date');
        $share->save();
        return ['url' => 'appformandpassbook/list'];
    }

    public function getDelete($id)
    {
        $deletingId = $id;
        $member_id = Appformandpassbook::select('member_id')
                    ->where('id', $id)->get();
        foreach ($member_id as $key => $value) {
            $MemId = $value->member_id;
        }

         $AddshareId = Addshare::select('id')
                    ->where('member_id', $MemId)->get();
                foreach ($AddshareId as $key => $value) {
                    $id = $value->id;
                    Addshare::destroy($id);
                }        
                

                $ShareId = Share::select('id')
                            ->where('member_id', $MemId)->get();
                foreach ($ShareId as $key => $value) {
                    $id = $value->id;
                    Share::destroy($id);
                }        
                

        Appformandpassbook::destroy($deletingId);

        

        
        return Redirect('appformandpassbook/list');
    }

}