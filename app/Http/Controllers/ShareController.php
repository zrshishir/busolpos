<?php
namespace App\Http\Controllers;

use App\Share;
use App\Appformandpassbook;
use App\Addshare;
use App\Withdrawshare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ShareController extends Controller
{
    public function getIndex()
    {

        return view('share.index');

    }

    public function getList()
    {

        Session::put('share_search', Input::has('ok') ? Input::get('search') : (Session::has('share_search') ? Session::get('share_search') : ''));

        Session::put('share_field', Input::has('field') ? Input::get('field') : (Session::has('share_field') ? Session::get('share_field') : 'member_id'));

        Session::put('share_sort', Input::has('sort') ? Input::get('sort') : (Session::has('share_sort') ? Session::get('share_sort') : 'asc'));

        $shares = Share::where('id', 'like', '%' . Session::get('share_search') . '%') 
            ->orderBy(Session::get('share_field'), Session::get('share_sort'))->paginate(10);
        return view('share.list', ['shares' => $shares]);

    }

    public function getUpdate($member_id)
    {
        
        $share = Share::find($member_id);
        return view('share.update', ['share' => $share]);
    }

    public function postUpdate($id)
    {
        


        $share = Share::find($id);
        $member_id    = Input::get('member_id');
        $share->date  = Input::get('date');
        $add_share_number    = Input::get('share_number');
        $share->add_share_number = $add_share_number; 
        $add_share_amount = Input::get('share_amount');       
        $share->add_share_amount = $add_share_amount;
        

                $shares_data = Share::where('member_id', $member_id)->get();
                 foreach($shares_data as $key=>$share_data){
                    $present_share_number = $share_data->present_share_number;
                    $present_share_amount = $share_data->present_share_amount;
                 }
        $present_share_number = ($present_share_number + $add_share_number);
        $present_share_amount = $present_share_amount + $add_share_amount;
        $share->present_share_number = $present_share_number;
        $share->present_share_amount = $present_share_amount;
        $share->created_at   = Input::get('created_at');
        $share->updated_at   = Input::get('updated_at');
        $share->save();

        $addshare = new Addshare();
        $addshare->serial_no = Input::get('serial_no');
        $addshare->member_id = Input::get('member_id');
        $addshare->date = Input::get('date');
        $addshare->share_number = Input::get('share_number');
        $addshare->share_amount = Input::get('share_amount');
        $addshare->save();

        // $share = Share::find($id);
        // $share->present_share_number += $add_share_number;
        // $share->present_share_amount += $add_share_amount;
        // $share->save();
        return ['url' => 'share/list'];
    }

    public function getCreate($member_id)
    {
         return view('share.create', ['share' => Share::find($member_id)]);
        // return view('share.create');
    }

    public function postCreate($id)
    {
        $share = Share::find($id);
        $member_id    = Input::get('member_id');
        $share->date  = Input::get('date');
        $withdraw_share_number    = Input::get('share_number');
        $share->withdraw_share_number = $withdraw_share_number; 
        $withdraw_share_amount = Input::get('share_amount');       
        $share->withdraw_share_amount = $withdraw_share_amount;
        

                $shares_data = Share::where('member_id', $member_id)->get();
                 foreach($shares_data as $key=>$share_data){
                    $present_share_number = $share_data->present_share_number;
                    $present_share_amount = $share_data->present_share_amount;
                 }
        $present_share_number = ($present_share_number - $withdraw_share_number);
        $present_share_amount = $present_share_amount - $withdraw_share_amount;
        $share->present_share_number = $present_share_number;
        $share->present_share_amount = $present_share_amount;
        $share->created_at   = Input::get('created_at');
        $share->updated_at   = Input::get('updated_at');
        $share->save();

        $withdrawshare = new Withdrawshare();
        $withdrawshare->serial_no = Input::get('serial_no');
        $withdrawshare->member_id = Input::get('member_id');
        $withdrawshare->date = Input::get('date');
        $withdrawshare->share_number = Input::get('share_number');
        $withdrawshare->share_amount = Input::get('share_amount');
        $withdrawshare->save();
        return ['url' => 'share/list'];
       
        // $share = new Share();
        // $share->member_id    = Input::get('member_id');
        // $share->date  = Input::get('date');
        // $withdraw_share_number = Input::get('share_number');
        // $share->withdraw_share_number = $withdraw_share_number;
        // $withdraw_share_amount = Input::get('share_amount');
        // $share->withdraw_share_amount = $withdraw_share_amount;
        // $share->created_at = Input::get('created_at');
        // $share->updated_at = Input::get('updated_at');
        // $share->save();
        // return ['url' => 'share/list'];
    }

    public function getDelete($id)
    {
        Share::destroy($id);
        return Redirect('share/list');
    }

}