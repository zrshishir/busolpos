<?php
namespace App\Http\Controllers;

use App\District;
use App\Division;
use DB;
use App\Union;
use App\Thana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UnionController extends Controller
{
    public function getIndex()
    {
        return view('union.index');
    }

    public function getList()
    {
        Session::put('union_search', Input::has('ok') ? Input::get('search') : (Session::has('union_search') ? Session::get('union_search') : ''));
        Session::put('union_field', Input::has('field') ? Input::get('field') : (Session::has('union_field') ? Session::get('union_field') : 'UnionName'));
        Session::put('union_sort', Input::has('sort') ? Input::get('sort') : (Session::has('union_sort') ? Session::get('union_sort') : 'asc'));
        $unions = Union::where('UnionName', 'like', '%' . Session::get('union_search') . '%')
            ->orderBy(Session::get('union_field'), Session::get('union_sort'))->paginate(10);
//        $thana_data=DB::table('unions')
//            ->join('thanas', 'unions.ThanaId', '=', 'thanas.id')
//            ->select('*')
//            ->get();

        $UnionInfo = Union::select('*')
            ->join('districts', 'unions.DistrictId', '=', 'districts.id')
            ->join('thanas', 'unions.ThanaId', '=', 'thanas.id')
            ->join('divisions', 'unions.DivisionId', '=', 'divisions.id')
            ->where('UnionName', 'like', '%' . Session::get('union_search') . '%')
            ->orderBy(Session::get('union_field'), Session::get('union_sort'))->paginate(10);
        return view('union.list', ['unions' => $unions], ['UnionInfo' => $UnionInfo]);
    }

    public function getUpdate($id)
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $thana = Thana::lists('ThanaName', 'id');
        return view('union.update', ['union' => Union::find($id)])->with('thana', $thana)->with('DistrictInfo', $DistrictInfo)->with('DivisionInfo', $DivisionInfo);
    }

    public function postUpdate($id)
    {
        $union = Union::find($id);
        $rules = ["ThanaId" => "required"];
        if ($union->UnionName != Input::get('UnionName'))
            $rules += ['UnionName' => 'required|unique:unions'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $union->UnionName = Input::get('UnionName');
        $union->ThanaId = Input::get('ThanaId');
        $union->DivisionId = Input::get('DivisionId');
        $union->DistrictId = Input::get('DistrictId');
        $union->save();
        return ['url' => 'union/list'];
    }

    public function getCreate()
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $thana = Thana::lists('ThanaName', 'id');
        return view('union.create')->with('thana', $thana)->with('DistrictInfo', $DistrictInfo)->with('DivisionInfo', $DivisionInfo);
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [

            "ThanaId" => "required"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $union = new Union();
        $union->UnionName = Input::get('UnionName');
        $union->ThanaId = Input::get('ThanaId');
        $union->DivisionId = Input::get('DivisionId');
        $union->DistrictId = Input::get('DistrictId');
        $union->save();
        return ['url' => 'union/list'];
    }

    public function getDelete($id)
    {
        Union::destroy($id);
        return Redirect('union/list');
    }

}