<?php
namespace App\Http\Controllers;

use App\Division;
use App\Mikrofdivision;
use App\Postoffice;
use App\Union;
use App\Ward;
use App\Zone;
use DB;
use App\District;
use App\Thana;
use App\Brn;
use App\Area;
use App\Domain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BrnController extends Controller
{
    public function getIndex()
    {
        return view('brn.index');
    }

    public function getList()
    {
        Session::put('brn_search', Input::has('ok') ? Input::get('search') : (Session::has('brn_search') ? Session::get('brn_search') : ''));
        Session::put('brn_field', Input::has('field') ? Input::get('field') : (Session::has('brn_field') ? Session::get('brn_field') : 'id'));
        Session::put('brn_sort', Input::has('sort') ? Input::get('sort') : (Session::has('brn_sort') ? Session::get('brn_sort') : 'asc'));

        $brns = Brn::select('*')
            ->join('areas', 'brns.AreaId', '=','areas.id')
            ->where('BranchName', 'like', '%' . Session::get('brn_search') . '%')
            ->paginate(8);
        return view('brn.list', ['brns' => $brns]);

    }

    public function getUpdate($id)
    {
        $DomainInfo = [''=>'--select--'] + Domain::lists('DomainName', 'id')->all();
        $DivisionOfficeInfo = [''=>'--select--'] + Mikrofdivision::lists('DivisionOfficeName', 'id')->all();
        $area =[''=>'--select--'] +  Area::lists('AreaName', 'id')->all();
        $Zone_info =[''=>'--select--'] +  Zone::lists('ZoneName', 'id')->all();
        $ThanaInfo =[''=>'--select--'] +  Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo =[''=>'--select--'] +  Division::lists('DivisionName', 'id')->all();
        $UnionInfo =[''=>'--select--'] +  Union::lists('UnionName', 'id')->all();
        $WardInfo =[''=>'--select--'] +  Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo =[''=>'--select--'] +  Postoffice::lists('PostofficeName', 'id')->all();
        $district_info =[''=>'--select--'] +  District::lists('DistrictName', 'id')->all();
        return view('brn.update', ['brn' => Brn::find($id)])->with('area',$area)->with('Zone_info',$Zone_info)->with('ThanaInfo',$ThanaInfo)->with('district_info',$district_info)->with('DivisionInfo',$DivisionInfo)
            ->with('UnionInfo',$UnionInfo)->with('PostOfficeInfo',$PostOfficeInfo)->with('WardInfo',$WardInfo)->with('DivisionOfficeInfo',$DivisionOfficeInfo)->with('DomainInfo', $DomainInfo);
    }

    public function postUpdate($id)
    {
        $brn = Brn::find($id);
        /*$rules = ["BranchCode" => "required"];
        if ($brn->BranchName != Input::get('BranchName'))
            $rules += ['BranchName' => 'required|unique:brns'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $brn->DomainName = Input::get('DomainName');
        $brn->DivisionOfficeId = Input::get('DivisionOfficeId');
        $brn->ZoneId = Input::get('ZoneId');
        $brn->AreaId = Input::get('AreaId');
        $brn->BranchName = Input::get('BranchName');
        $brn->BranchCode = Input::get('BranchCode');
        $brn->OpeningDate = Input::get('OpeningDate');
        $brn->BranchAddress = Input::get('BranchAddress');
        $brn->BranchMobileNo = Input::get('BranchMobileNo');
        $brn->BranchEmail = Input::get('BranchEmail');
        $brn->BranchDistrictId = Input::get('BranchDistrictId');
        $brn->BranchThanaId = Input::get('BranchThanaId');
        $brn->BranchDivisionId = Input::get('BranchDivisionId');
        $brn->BranchUnionId = Input::get('BranchUnionId');
        $brn->BranchWardId = Input::get('BranchWardId');
        $brn->BranchPostOfficeId = Input::get('BranchPostOfficeId');
        $brn->save();
        return ['url' => 'brn/list'];
    }

    public function getCreate()
    {   
        $DomainInfo = [''=>'--select--'] + Domain::lists('DomainName', 'id')->all();
        $DivisionOfficeInfo = [''=>'--select--'] + Mikrofdivision::lists('DivisionOfficeName', 'id')->all();
        $area =[''=>'--select--'] +  Area::lists('AreaName', 'id')->all();
        $Zone_info =[''=>'--select--'] +  Zone::lists('ZoneName', 'id')->all();
        $ThanaInfo =[''=>'--select--'] +  Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo =[''=>'--select--'] +  Division::lists('DivisionName', 'id')->all();
        $UnionInfo =[''=>'--select--'] +  Union::lists('UnionName', 'id')->all();
        $WardInfo =[''=>'--select--'] +  Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo =[''=>'--select--'] +  Postoffice::lists('PostofficeName', 'id')->all();
        $district_info =[''=>'--select--'] +  District::lists('DistrictName', 'id')->all();
        return view('brn.create')->with('area',$area)->with('Zone_info',$Zone_info)->with('ThanaInfo',$ThanaInfo)->with('district_info',$district_info)->with('DivisionInfo',$DivisionInfo)
            ->with('UnionInfo',$UnionInfo)->with('PostOfficeInfo',$PostOfficeInfo)->with('WardInfo',$WardInfo)->with('DivisionOfficeInfo',$DivisionOfficeInfo)->with('DomainInfo', $DomainInfo);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "AreaId" => "required",
            "BranchName" => "required|unique:brns",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $brn = new Brn();
        $brn->DomainName = Input::get('DomainName');
        $brn->DivisionOfficeId = Input::get('DivisionOfficeId');
        $brn->ZoneId = Input::get('ZoneId');
        $brn->AreaId = Input::get('AreaId');
        $brn->BranchName = Input::get('BranchName');
        $brn->BranchCode = Input::get('BranchCode');
        $brn->OpeningDate = Input::get('OpeningDate');
        $brn->BranchAddress = Input::get('BranchAddress');
        $brn->BranchMobileNo = Input::get('BranchMobileNo');
        $brn->BranchEmail = Input::get('BranchEmail');
        $brn->BranchDistrictId = Input::get('BranchDistrictId');
        $brn->BranchThanaId = Input::get('BranchThanaId');
        $brn->BranchDivisionId = Input::get('BranchDivisionId');
        $brn->BranchUnionId = Input::get('BranchUnionId');
        $brn->BranchWardId = Input::get('BranchWardId');
        $brn->BranchPostOfficeId = Input::get('BranchPostOfficeId');
        $brn->save();
        return ['url' => 'brn/list'];
    }

    public function getDelete($id)
    {
        Brn::destroy($id);
        return Redirect('brn/list');
    }

}