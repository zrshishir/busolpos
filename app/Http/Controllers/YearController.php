<?php
namespace App\Http\Controllers;

use App\Year;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class YearController extends Controller
{
    public function getIndex()
    {
        return view('year.index');
    }

    public function getList()
    {
        Session::put('year_search', Input::has('ok') ? Input::get('search') : (Session::has('year_search') ? Session::get('year_search') : ''));
        Session::put('year_field', Input::has('field') ? Input::get('field') : (Session::has('year_field') ? Session::get('year_field') : 'id'));
        Session::put('year_sort', Input::has('sort') ? Input::get('sort') : (Session::has('year_sort') ? Session::get('year_sort') : 'asc'));
        $years = Year::where('id', 'like', '%' . Session::get('year_search') . '%')
            ->orderBy(Session::get('year_field'), Session::get('year_sort'))->paginate(25);
        return view('year.list', ['years' => $years]);
    }

    public function getUpdate($id)
    {
        return view('year.update', ['year' => Year::find($id)]);
    }

    public function postUpdate($id)
    {
        $year = Year::find($id);
        $rules = ["YearName" => "required"];
        if ($year->YearName != Input::get('YearName'))
            $rules += ['YearName' => 'required|unique:years'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $year->YearName = Input::get('YearName');
        $year->save();
        return ['url' => 'year/list'];
    }

    public function getCreate()
    {
        return view('year.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "YearName" => "required|unique:years",
            
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        $year = new Year();
        $year->YearName = Input::get('YearName');
        $year->save();

        return ['url' => 'year/list'];
    }

    public function getDelete($id)
    {
        Year::destroy($id);
        return Redirect('year/list');
    }

}