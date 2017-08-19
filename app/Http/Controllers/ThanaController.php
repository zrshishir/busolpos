<?php
namespace App\Http\Controllers;

use App\Division;
use DB;
use App\Thana;
use App\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ThanaController extends Controller
{
    public function getIndex()
    {
        return view('thana.index');
    }

    public function getList()
    {
        Session::put('thana_search', Input::has('ok') ? Input::get('search') : (Session::has('thana_search') ? Session::get('thana_search') : ''));
        Session::put('thana_field', Input::has('field') ? Input::get('field') : (Session::has('thana_field') ? Session::get('thana_field') : 'ThanaName'));
        Session::put('thana_sort', Input::has('sort') ? Input::get('sort') : (Session::has('thana_sort') ? Session::get('thana_sort') : 'asc'));
        $thanas = Thana::where('ThanaName', 'like', '%' . Session::get('thana_search') . '%')
            ->orderBy(Session::get('thana_field'), Session::get('thana_sort'))->paginate(8);

//        $district_info=DB::table('thanas')
//            ->join('districts', 'thanas.DistrictId', '=', 'districts.id')
//            ->select('*')
//            ->get();
        $ThanaInfo = Thana::select('*')
            -> join('districts', 'thanas.DistrictId', '=', 'districts.id')
            ->where('ThanaName', 'like', '%' . Session::get('thana_search') . '%')
            ->orderBy(Session::get('thana_field'), Session::get('thana_sort'))
//            ->select('*')
            ->paginate(8);
        return view('thana.list', ['thanas' => $thanas],['ThanaInfo'=>$ThanaInfo]);
    }

    public function getUpdate($id)
    {
        $DivisionInfo = Division::all();
       // $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        return view('thana.update', ['thana' => Thana::find($id)],['DistrictInfo' => $DistrictInfo],['DivisionInfo' => $DivisionInfo]);
    }

    public function postUpdate($id)
    {
        $thana = Thana::find($id);
        $rules = ["DistrictId" => "required"];
        if ($thana->ThanaName != Input::get('ThanaName'))
            $rules += ['ThanaName' => 'required|unique:thanas'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $thana->ThanaName = Input::get('ThanaName');
        $thana->ThanaNameBangla = Input::get('ThanaNameBangla');
        $thana->DistrictId = Input::get('DistrictId');
        $thana->DivisionId = Input::get('DivisionId');

        $thana->save();
        return ['url' => 'thana/list'];
    }

    public function getCreate()
    {

//        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DivisionInfo = Division::all();
        $DistrictInfo = District::all();
        //return view('thana.create',compact('district_info'));
        return view('thana.create',['DistrictInfo' => $DistrictInfo],['DivisionInfo' => $DivisionInfo]);

    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "ThanaName" => "required|unique:thanas",
            "ThanaNameBangla" => "required|unique:thanas",
            "DistrictId" => "required"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $thana = new Thana();
        $thana->ThanaName = Input::get('ThanaName');
        $thana->DistrictId = Input::get('DistrictId');
        $thana->DivisionId = Input::get('DivisionId');
        $thana->ThanaNameBangla = Input::get('ThanaNameBangla');
        $thana->save();
        return ['url' => 'thana/list'];
    }

    public function getDelete($id)
    {
        Thana::destroy($id);
        return Redirect('thana/list');
    }

//    public function getthana($id)
//    {
//        //Thana::destroy($id);
//        $ThanaName_info = $id;
//        return '$ThanaName_info';
//    }

}