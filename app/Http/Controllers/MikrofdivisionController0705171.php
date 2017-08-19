<?php
namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Postoffice;
use App\Thana;
use App\Union;
use App\Ward;
use App\Zone;
use App\Mikrofdivision;
use App\Domain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MikrofdivisionController extends Controller
{
    public function getIndex()
    {
        return view('mikrofdivision.index');
    }

    public function getList()
    {
        Session::put('mikrofdivision_search', Input::has('ok') ? Input::get('search') : (Session::has('mikrofdivision_search') ? Session::get('mikrofdivision_search') : ''));
        Session::put('mikrofdivision_field', Input::has('field') ? Input::get('field') : (Session::has('mikrofdivision_field') ? Session::get('mikrofdivision_field') : 'id'));
        Session::put('mikrofdivision_sort', Input::has('sort') ? Input::get('sort') : (Session::has('mikrofdivision_sort') ? Session::get('mikrofdivision_sort') : 'asc'));
        $mikrofdivisions = Mikrofdivision::where('id', 'like', '%' . Session::get('mikrofdivision_search') . '%')
            ->orderBy(Session::get('mikrofdivision_field'), Session::get('mikrofdivision_sort'))->paginate(8);
        return view('mikrofdivision.list', ['mikrofdivisions' => $mikrofdivisions]);
    }

    public function getUpdate($id)
    {
        $ThanaInfo = [''=>'--select--'] + Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo = [''=>'--select--'] + Division::lists('DivisionName', 'id')->all();
        $UnionInfo = [''=>'--select--'] +  Union::lists('UnionName', 'id')->all();
        $WardInfo = [''=>'--select--'] + Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo = [''=>'--select--'] + Postoffice::lists('PostofficeName', 'id')->all();
        $district_info = [''=>'--select--'] + District::lists('DistrictName', 'id')->all();
        return view('mikrofdivision.update', ['mikrofdivision' => Mikrofdivision::find($id)])->with('ThanaInfo', $ThanaInfo)->with('district_info', $district_info)->with('DivisionInfo', $DivisionInfo)
            ->with('UnionInfo', $UnionInfo)->with('PostOfficeInfo', $PostOfficeInfo)->with('WardInfo', $WardInfo);

    }

    public function postUpdate($id)
    {
        $mikrofdivision = Mikrofdivision::find($id);
        $rules = ["DivisionOfficeCode" => "required"];
        if ($mikrofdivision->DivisionOfficeCode != Input::get('DivisionOfficeCode'))
            $rules += ['DivisionOfficeCode' => 'required|unique:mikrofdivisions'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $mikrofdivision->DivisionOfficeName = Input::get('DivisionOfficeName');
        $mikrofdivision->DivisionOfficeNameBangla = Input::get('DivisionOfficeNameBangla');
        $mikrofdivision->DivisionOfficeCode = Input::get('DivisionOfficeCode');
        $mikrofdivision->DivisionOfficeAddress = Input::get('DivisionOfficeAddress');
        $mikrofdivision->DivisionOfficeMobileNo = Input::get('DivisionOfficeMobileNo');
        $mikrofdivision->DivisionOfficeEmail = Input::get('DivisionOfficeEmail');
        $mikrofdivision->DivisionOfficeDivisionId = Input::get('DivisionOfficeDivisionId');
        $mikrofdivision->DivisionOfficeDistrictId = Input::get('DivisionOfficeDistrictId');
        $mikrofdivision->DivisionOfficeThanaId = Input::get('DivisionOfficeThanaId');
        $mikrofdivision->DivisionOfficeUnionId = Input::get('DivisionOfficeUnionId');
        $mikrofdivision->DivisionOfficeWardId = Input::get('DivisionOfficeWardId');
        $mikrofdivision->DivisionOfficeRoadNo = Input::get('DivisionOfficeRoadNo');
        $mikrofdivision->DivisionOfficePostOfficeId = Input::get('DivisionOfficePostOfficeId');
        $mikrofdivision->save();
        return ['url' => 'mikrofdivision/list'];
    }

    public function getCreate()
    {
        $DomainInfo = [''=>'--select--'] + Doamin::lists('DomainName', 'id')->all();
        $ThanaInfo = [''=>'--select--'] + Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo = [''=>'--select--'] + Division::lists('DivisionName', 'id')->all();
        $UnionInfo = [''=>'--select--'] +  Union::lists('UnionName', 'id')->all();
        $WardInfo = [''=>'--select--'] + Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo = [''=>'--select--'] + Postoffice::lists('PostofficeName', 'id')->all();
        $district_info = [''=>'--select--'] + District::lists('DistrictName', 'id')->all();
        return view('mikrofdivision.create')->with('ThanaInfo', $ThanaInfo)->with('district_info', $district_info)->with('DivisionInfo', $DivisionInfo)
            ->with('UnionInfo', $UnionInfo)->with('PostOfficeInfo', $PostOfficeInfo)->with('WardInfo', $WardInfo);

//        return view('mikrofdivision.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "DivisionOfficeCode" => "required|unique:mikrofdivisions"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $mikrofdivision = new Mikrofdivision();
        $mikrofdivision->DivisionOfficeName = Input::get('DivisionOfficeName');
        $mikrofdivision->DivisionOfficeNameBangla = Input::get('DivisionOfficeNameBangla');
        $mikrofdivision->DivisionOfficeCode = Input::get('DivisionOfficeCode');
        $mikrofdivision->DivisionOfficeAddress = Input::get('DivisionOfficeAddress');
        $mikrofdivision->DivisionOfficeMobileNo = Input::get('DivisionOfficeMobileNo');
        $mikrofdivision->DivisionOfficeEmail = Input::get('DivisionOfficeEmail');
        $mikrofdivision->DivisionOfficeDivisionId = Input::get('DivisionOfficeDivisionId');
        $mikrofdivision->DivisionOfficeDistrictId = Input::get('DivisionOfficeDistrictId');
        $mikrofdivision->DivisionOfficeThanaId = Input::get('DivisionOfficeThanaId');
        $mikrofdivision->DivisionOfficeUnionId = Input::get('DivisionOfficeUnionId');
        $mikrofdivision->DivisionOfficeWardId = Input::get('DivisionOfficeWardId');
        $mikrofdivision->DivisionOfficeRoadNo = Input::get('DivisionOfficeRoadNo');
        $mikrofdivision->DivisionOfficePostOfficeId = Input::get('DivisionOfficePostOfficeId');
        $mikrofdivision->DomainId = Input::get('DomainId');
        $mikrofdivision->save();
        return ['url' => 'mikrofdivision/list'];
    }

    public function getDelete($id)
    {
        Mikrofdivision::destroy($id);
        return Redirect('mikrofdivision/list');
    }

}