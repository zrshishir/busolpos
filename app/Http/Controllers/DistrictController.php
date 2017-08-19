<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
class DistrictController extends Controller
{
    public function getIndex()
    {
        return view('district.index');
    }

    public function getList()
    {
        Session::put('district_search', Input::has('ok') ? Input::get('search') : (Session::has('district_search') ? Session::get('district_search') : ''));
        Session::put('district_field', Input::has('field') ? Input::get('field') : (Session::has('district_field') ? Session::get('district_field') : 'DistrictName'));
        Session::put('district_sort', Input::has('sort') ? Input::get('sort') : (Session::has('district_sort') ? Session::get('district_sort') : 'asc'));
        $districts = District::where('DistrictName', 'like', '%' . Session::get('district_search') . '%')
            ->orderBy(Session::get('district_field'), Session::get('district_sort'))->paginate(8);

        /*$zone_data=DB::table('areas')
            ->join('zones', 'areas.ZoneId', '=', 'zones.id')
            ->select('*')
            ->get();
        return view('area.list', ['areas' => $areas],['zone_data' => $zone_data]);*/

        $DistrictInfo = District::select('*')
            -> join('divisions', 'districts.DivisionId', '=','divisions.id')
           ->where('DistrictName', 'like', '%' . Session::get('district_search') . '%')
            ->orderBy(Session::get('district_field'), Session::get('district_sort'))
//            ->select('*')
            ->paginate(8);
      //return $DivInfo;
        return view('district.list', ['districts' => $districts], ['DistrictInfo' => $DistrictInfo]);
    }

    public function getUpdate($id)
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        return view('district.update', ['district' => District::find($id)],['DivisionInfo'=>$DivisionInfo]);
    }

    public function postUpdate($id)
    {
        $district = District::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($district->DistrictName != Input::get('DistrictName'))
            $rules += ['DistrictName' => 'required|unique:districts'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $district->DivisionId = Input::get('DivisionId');
        $district->DistrictName = Input::get('DistrictName');
        $district->DistrictNameBangla = Input::get('DistrictNameBangla');
        $district->Latitude = Input::get('Latitude');
        $district->Longitude = Input::get('Longitude');
        $district->Website = Input::get('Website');
        $district->save();
        return ['url' => 'district/list'];
    }

    public function getCreate()
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        return view('district.create',compact('DivisionInfo'));
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "DistrictName" => "required|unique:districts",
            "DistrictNameBangla" => "required|unique:districts",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $district = new District();
        $district->DivisionId = Input::get('DivisionId');
        $district->DistrictName = Input::get('DistrictName');
        $district->DistrictNameBangla = Input::get('DistrictNameBangla');
        $district->Latitude = Input::get('Latitude');
        $district->Longitude = Input::get('Longitude');
        $district->Website = Input::get('Website');
        $district->save();
        return ['url' => 'district/list'];
    }

    public function getDelete($id)
    {
        District::destroy($id);
        return Redirect('district/list');
    }

}