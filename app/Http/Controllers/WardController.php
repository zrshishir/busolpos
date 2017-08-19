<?php
namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Thana;
use DB;
use App\Ward;
use App\Union;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WardController extends Controller
{
    public function getIndex()
    {
        return view('ward.index');
    }

    public function getList()
    {
        Session::put('ward_search', Input::has('ok') ? Input::get('search') : (Session::has('ward_search') ? Session::get('ward_search') : ''));
        Session::put('ward_field', Input::has('field') ? Input::get('field') : (Session::has('ward_field') ? Session::get('ward_field') : 'id'));
        Session::put('ward_sort', Input::has('sort') ? Input::get('sort') : (Session::has('ward_sort') ? Session::get('ward_sort') : 'asc'));
        $wards = Ward::where('id', 'like', '%' . Session::get('ward_search') . '%')
            ->orderBy(Session::get('ward_field'), Session::get('ward_sort'))->paginate(8);
        $union_data=DB::table('wards')
            ->join('unions', 'wards.UnionId', '=', 'unions.id')
            ->select('*')
            ->get();
        return view('ward.list', ['wards' => $wards],['union_data'=>$union_data]);
    }

    public function getUpdate($id)
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $Thana = Thana::lists('ThanaName', 'id');
        $Union = Union::lists('UnionName', 'id');
        return view('ward.update', ['ward' => Ward::find($id)])->with('Union',$Union)->with('Thana',$Thana)->with('DistrictInfo',$DistrictInfo)->with('DivisionInfo',$DivisionInfo);
    }

    public function postUpdate($id)
    {
        $ward = Ward::find($id);
        $rules = ["UnionId" => "required"];
        if ($ward->WardName != Input::get('WardName'))
            $rules += ['WardName' => 'required'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $ward->WardName = Input::get('WardName');
        $ward->UnionId = Input::get('UnionId');
        $ward->ThanaId = Input::get('ThanaId');
        $ward->DistrictId = Input::get('DistrictId');
        $ward->DivisionId = Input::get('DivisionId');
        $ward->save();
        return ['url' => 'ward/list'];
    }

    public function getCreate()
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $Thana = Thana::lists('ThanaName', 'id');
        $Union = Union::lists('UnionName', 'id');
        return view('ward.create')->with('Union',$Union)->with('Thana',$Thana)->with('DistrictInfo',$DistrictInfo)->with('DivisionInfo',$DivisionInfo);
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "WardName" => "required",
            "UnionId" => "required"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $ward = new Ward();
        $ward->WardName = Input::get('WardName');
        $ward->UnionId = Input::get('UnionId');
        $ward->ThanaId = Input::get('ThanaId');
        $ward->DistrictId = Input::get('DistrictId');
        $ward->DivisionId = Input::get('DivisionId');
        $ward->save();
        return ['url' => 'ward/list'];
    }

    public function getDelete($id)
    {
        Ward::destroy($id);
        return Redirect('ward/list');
    }

}