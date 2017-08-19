<?php
namespace App\Http\Controllers;

use App\District;
use App\Division;
use DB;
use App\Postoffice;
use App\Thana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostofficeController extends Controller
{
    public function getIndex()
    {
        return view('postoffice.index');
    }

    public function getList()
    {
        Session::put('postoffice_search', Input::has('ok') ? Input::get('search') : (Session::has('postoffice_search') ? Session::get('postoffice_search') : ''));
        Session::put('postoffice_field', Input::has('field') ? Input::get('field') : (Session::has('postoffice_field') ? Session::get('postoffice_field') : 'id'));
        Session::put('postoffice_sort', Input::has('sort') ? Input::get('sort') : (Session::has('postoffice_sort') ? Session::get('postoffice_sort') : 'asc'));
        $postoffices = Postoffice::where('id', 'like', '%' . Session::get('postoffice_search') . '%')
            ->orderBy(Session::get('postoffice_field'), Session::get('postoffice_sort'))->paginate(8);
        //return view('postoffice.list', ['postoffices' => $postoffices]);
        $thana_data=DB::table('postoffices')
            ->join('thanas', 'postoffices.ThanaId', '=', 'thanas.id')
            ->select('*')
            ->get();
        return view('postoffice.list', ['postoffices' => $postoffices],['thana_data'=>$thana_data]);
    }


    public function getUpdate($id)
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $thana = Thana::lists('ThanaName', 'id');
        return view('postoffice.update', ['postoffice' => Postoffice::find($id)])->with('thana', $thana)->with('DivisionInfo',$DivisionInfo)->with('DistrictInfo',$DistrictInfo);
    }

    public function postUpdate($id)
    {
        $postoffice = Postoffice::find($id);
        $rules = ["ThanaId" => "required"];
        if ($postoffice->PostofficeName != Input::get('PostofficeName'))
            $rules += ['PostofficeName' => 'required'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $postoffice->PostofficeName = Input::get('PostofficeName');
        $postoffice->ThanaId = Input::get('ThanaId');
        $postoffice->DivisionId = Input::get('DivisionId');
        $postoffice->DistrictId = Input::get('DistrictId');
        $postoffice->save();
        return ['url' => 'postoffice/list'];
    }

    public function getCreate()
    {
        $DivisionInfo = Division::lists('DivisionName', 'id');
        $DistrictInfo = District::lists('DistrictName', 'id');
        $thana = Thana::lists('ThanaName', 'id');
        return view('postoffice.create')->with('thana', $thana)->with('DivisionInfo',$DivisionInfo)->with('DistrictInfo',$DistrictInfo);
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "PostofficeName" => "required",
            "ThanaId" => "required"
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $postoffice = new Postoffice();
        $postoffice->PostofficeName = Input::get('PostofficeName');
        $postoffice->ThanaId = Input::get('ThanaId');
        $postoffice->DivisionId = Input::get('DivisionId');
        $postoffice->DistrictId = Input::get('DistrictId');
        $postoffice->save();
        return ['url' => 'postoffice/list'];
    }

    public function getDelete($id)
    {
        Postoffice::destroy($id);
        return Redirect('postoffice/list');
    }

}