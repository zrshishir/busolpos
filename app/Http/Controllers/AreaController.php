<?php
namespace App\Http\Controllers;

use App\Domain;
use App\Division;
use App\Mikrofdivision;
use App\Postoffice;
use App\Union;
use App\Ward;
use DB;
use App\District;
use App\Thana;
use App\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Zone;
class AreaController extends Controller
{
    public function getIndex()
    {
        return view('area.index');
    }

    public function getList()
    {
        Session::put('area_search', Input::has('ok') ? Input::get('search') : (Session::has('area_search') ? Session::get('area_search') : ''));
        Session::put('area_field', Input::has('field') ? Input::get('field') : (Session::has('area_field') ? Session::get('area_field') : 'AreaName'));
        Session::put('area_sort', Input::has('sort') ? Input::get('sort') : (Session::has('area_sort') ? Session::get('area_sort') : 'asc'));
        $areas = Area::select('*')
            -> join('zones', 'areas.ZoneId', '=','zones.id')
            ->where('AreaName', 'like', '%' . Session::get('area_search') . '%')
            ->orderBy(Session::get('area_field'), Session::get('area_sort'))->paginate(8);
        return view('area.list', ['areas' => $areas]);
        //return view('area.list')->with('areas', $areas)->with('zone_data',$zone_data);
    }

    public function getUpdate($id)
    {
        // $data = Zone::all();
        $DomainInfo = [''=>'--select--'] + Domain::lists('DomainName', 'id')->all();
        $DivisionOfficeInfo = [''=>'--select--'] + Mikrofdivision::lists('DivisionOfficeName', 'id')->all();
        $Zone_info = [''=>'--select--'] + Zone::lists('ZoneName', 'id')->all();
        $ThanaInfo =[''=>'--select--'] + Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo =[''=>'--select--'] + Division::lists('DivisionName', 'id')->all();
        $UnionInfo =[''=>'--select--'] + Union::lists('UnionName', 'id')->all();
        $WardInfo =[''=>'--select--'] + Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo =[''=>'--select--'] + Postoffice::lists('PostofficeName', 'id')->all();
        $district_info =[''=>'--select--'] + District::lists('DistrictName', 'id')->all();
        return view('area.update',['area' => Area::find($id)])->with('Zone_info',$Zone_info)->with('ThanaInfo',$ThanaInfo)->with('district_info',$district_info)->with('DivisionInfo',$DivisionInfo)
            ->with('UnionInfo',$UnionInfo)->with('PostOfficeInfo',$PostOfficeInfo)->with('WardInfo',$WardInfo)->with('DivisionOfficeInfo',$DivisionOfficeInfo)->with('DomainInfo', $DomainInfo);

    }

    public function postUpdate($id)
    {
        $area = Area::find($id);

        $rules = ["AreaName" => "required"];
        if ($area->AreaName != Input::get('AreaName'))
            $rules += ['AreaName' => 'required|unique:areas'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $area->DomainName = Input::get('DomainName');
        $area->ZoneId = Input::get('ZoneId');
        $area->AreaName = Input::get('AreaName');
        $area->AreaCode = Input::get('AreaCode');
        $area->AreaAddress = Input::get('AreaAddress');
        $area->AreaMobileNo = Input::get('AreaMobileNo');
        $area->AreaDivisionOfficeId = Input::get('AreaDivisionOfficeId');
        $area->AreaDistrictId = Input::get('AreaDistrictId');
        $area->AreaThanaId = Input::get('AreaThanaId');
        $area->AreaDivisionId = Input::get('AreaDivisionId');
        $area->AreaUnionId = Input::get('AreaUnionId');
        $area->AreaWardId = Input::get('AreaWardId');
        $area->AreaPostOfficeId = Input::get('AreaPostOfficeId');
        $area->AreaEmail = Input::get('AreaEmail');
        $area->save();
        return ['url' => 'area/list'];
    }

//    public function test()
//    {
//
//        $data = Zone::all();
//var_dump($data);
//        return view('area.create',compact('data'));
//    }


    public function getCreate()
    {
        $DomainInfo = [''=>'--select--'] + Domain::lists('DomainName', 'id')->all();
        $DivisionOfficeInfo = [''=>'--select--'] + Mikrofdivision::lists('DivisionOfficeName', 'id')->all();
        $Zone_info = [''=>'--select--'] + Zone::lists('ZoneName', 'id')->all();
        $ThanaInfo =[''=>'--select--'] + Thana::lists('ThanaName', 'id')->all();
        $DivisionInfo =[''=>'--select--'] + Division::lists('DivisionName', 'id')->all();
        $UnionInfo =[''=>'--select--'] + Union::lists('UnionName', 'id')->all();
        $WardInfo =[''=>'--select--'] + Ward::lists('WardName', 'id')->all();
        $PostOfficeInfo =[''=>'--select--'] + Postoffice::lists('PostofficeName', 'id')->all();
        $district_info =[''=>'--select--'] + District::lists('DistrictName', 'id')->all();
        return view('area.create')->with('Zone_info',$Zone_info)->with('ThanaInfo',$ThanaInfo)->with('district_info',$district_info)->with('DivisionInfo',$DivisionInfo)
            ->with('UnionInfo',$UnionInfo)->with('PostOfficeInfo',$PostOfficeInfo)->with('WardInfo',$WardInfo)->with('DivisionOfficeInfo',$DivisionOfficeInfo)->with('DomainInfo', $DomainInfo);

      
    }
    public function postCreate()
    {
//        $validator = Validator::make(Input::all(), [
//            "ZoneId" => "required",
//            "AreaName" => "required|unique:areas",
//        ]);
//        if ($validator->fails()) {
//            return array(
//                'fail' => true,
//                'errors' => $validator->getMessageBag()->toArray()
//            );
//        }
        $area = new Area();
        $area->DomainName = Input::get('DomainName');
        $area->ZoneId = Input::get('ZoneId');
        $area->AreaName = Input::get('AreaName');
        $area->AreaCode = Input::get('AreaCode');
        $area->AreaAddress = Input::get('AreaAddress');
        $area->AreaMobileNo = Input::get('AreaMobileNo');
        $area->AreaDivisionOfficeId = Input::get('AreaDivisionOfficeId');
        $area->AreaDistrictId = Input::get('AreaDistrictId');
        $area->AreaThanaId = Input::get('AreaThanaId');
        $area->AreaDivisionId = Input::get('AreaDivisionId');
        $area->AreaUnionId = Input::get('AreaUnionId');
        $area->AreaWardId = Input::get('AreaWardId');
        $area->AreaPostOfficeId = Input::get('AreaPostOfficeId');
        $area->AreaEmail = Input::get('AreaEmail');
        $area->save();
        return ['url' => 'area/list'];
    }

    public function getData(Request $request)
    {
        $input = $request->all();
        var_dump($input);
        return $input;
//        $area= Input::get('search1');
//     echo $area;
        // echo $id;
        //die();

        //return ['url' => 'area/list'];
    }
    public function GetArray()
    {
        $areas1 = Zone::where('id', 'like', '%' . Session::get('area_search') . '%');
        $Zone_info = Zone::lists('ZoneName', 'id');
        return view('area.create', ['areas1' => $areas1],['Zone_info' => $Zone_info]);
    }

    public function getDelete($id)
    {
        Area::destroy($id);
        return Redirect('area/list');
    }

}