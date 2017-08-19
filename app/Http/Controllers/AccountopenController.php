<?php
namespace App\Http\Controllers;

use App\Accountopen;
use App\Share;
use App\User;
use App\Addshare;
use App\Domain;
use App\Zone;
use App\Area;
use App\Brn;
use App\Product;
use App\Duration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountopenController extends Controller
{
    public function getIndex()
    {

        return view('accountopen.index');

    }

    public function getList()
    {

        Session::put('accountopen_search', Input::has('ok') ? Input::get('search') : (Session::has('accountopen_search') ? Session::get('accountopen_search') : ''));

        Session::put('accountopen_field', Input::has('field') ? Input::get('field') : (Session::has('accountopen_field') ? Session::get('accountopen_field') : 'MemberId'));

        Session::put('accountopen_sort', Input::has('sort') ? Input::get('sort') : (Session::has('accountopen_sort') ? Session::get('accountopen_sort') : 'asc'));

        $accountopens = Accountopen::where('MemberId', 'like', '%' . Session::get('accountopen_search') . '%') ->paginate(25);
            // ->orderBy(Session::get('accountopen_field'), Session::get('accountopen_sort'))
        return view('accountopen.list', ['accountopens' => $accountopens]);

    }

    public function getUpdate($id)
    {
        $DomainInfo     = ['' => '--select--'] + Domain::lists('DomainName', 'id')->all();
        $ZoneInfo       = ['' => '--select--'] + Zone::lists('ZoneName', 'id')->all();
        $AreaInfo       = ['' => '--select--'] + Area::lists('AreaName', 'id')->all();
        $BranchInfo     = ['' => '--select--'] + Brn::lists('BranchName', 'id')->all();
        $ProductInfo     = ['' => '--select--'] + Product::lists('ProductName', 'id')->all();
        $DurationInfo     = ['' => '--select--'] + Duration::lists('DurationName', 'id')->all();
         return view('accountopen.create', ['accountopen' => Accountopen::find($id)])->with('DomainInfo', $DomainInfo)->with('ZoneInfo',$ZoneInfo)->with('AreaInfo',$AreaInfo)->with('BranchInfo',$BranchInfo)->with('ProductInfo', $ProductInfo)->with('DurationInfo', $DurationInfo);
    }

    public function postUpdate($id)
    {
        $user_id = Auth::user()->id;
        $accountopen = Accountopen::find($id);
        $accountopen->serial_no = Input::get('serial_no');
        $accountopen->MemberId = Input::get('MemberId');       
        $accountopen->member_id = Input::get('member_id');
        $accountopen->mobile_no = Input::get('mobile_no');
        $accountopen->date       = Input::get('date');
        $accountopen->app_form = Input::get('app_form');
        $accountopen->passbook = Input::get('passbook');
        $accountopen->saving_amount = Input::get('saving_amount'); 
        $accountopen->share_number = Input::get('share_number');
        $accountopen->share_amount = Input::get('share_amount');          
        $accountopen->name = Input::get('name');       
        $accountopen->unitprice = Input::get('unitprice');
        $accountopen->created_by = $user_id;
        $accountopen->save();

        
        return ['url' => 'accountopen/list'];
    }

    public function getCreate()
    {
        $DomainInfo     = ['' => '--select--'] + Domain::lists('DomainName', 'id')->all();
        $ZoneInfo       = ['' => '--select--'] + Zone::lists('ZoneName', 'id')->all();
        $AreaInfo       = ['' => '--select--'] + Area::lists('AreaName', 'id')->all();
        $BranchInfo     = ['' => '--select--'] + Brn::lists('BranchName', 'id')->all();
        $ProductInfo     = ['' => '--select--'] + Product::lists('ProductName', 'id')->all();
        $DurationInfo     = ['' => '--select--'] + Duration::lists('DurationName', 'id')->all();
         return view('accountopen.create')->with('DomainInfo', $DomainInfo)->with('ZoneInfo',$ZoneInfo)->with('AreaInfo',$AreaInfo)->with('BranchInfo',$BranchInfo)->with('ProductInfo', $ProductInfo)->with('DurationInfo', $DurationInfo);
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "member_id" => "required|unique:accountopens"
            // "CompanyrajCode" => "required|unique:accountopens",
            // "unitprice" => "required|numeric"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $user_id = Auth::user()->id;
        $accountopen = new Accountopen();
        $accountopen->serial_no     = Input::get('serial_no');
        $accountopen->MemberId      = Input::get('MemberId');       
        $accountopen->member_id     = Input::get('member_id');
        $accountopen->mobile_no     = Input::get('mobile_no');
        $accountopen->date          = Input::get('date');
        $accountopen->app_form      = Input::get('app_form');
        $accountopen->passbook      = Input::get('passbook');
        $accountopen->saving_amount = Input::get('saving_amount'); 
        $accountopen->share_number  = Input::get('share_number');
        $accountopen->share_amount  = Input::get('share_amount');          
        $accountopen->name          = Input::get('name');       
        $accountopen->unitprice     = Input::get('unitprice');
        $accountopen->created_by    = $user_id;
        $accountopen->save();

       
        return ['url' => 'accountopen/list'];
    }

    public function getDelete($id)
    {
        $deletingId = $id;
        $member_id = Accountopen::select('member_id')
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
        Accountopen::destroy($deletingId);
        return Redirect('accountopen/list');
    }

}