<?php
namespace App\Http\Controllers;

use App\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MonthController extends Controller
{
    public function getIndex()
    {
        return view('month.index');
    }

    public function getList()
    {
        Session::put('month_search', Input::has('ok') ? Input::get('search') : (Session::has('month_search') ? Session::get('month_search') : ''));
        Session::put('month_field', Input::has('field') ? Input::get('field') : (Session::has('month_field') ? Session::get('month_field') : 'id'));
        Session::put('month_sort', Input::has('sort') ? Input::get('sort') : (Session::has('month_sort') ? Session::get('month_sort') : 'asc'));
        $months = Month::where('id', 'like', '%' . Session::get('month_search') . '%')
            ->orderBy(Session::get('month_field'), Session::get('month_sort'))->paginate(12);
        return view('month.list', ['months' => $months]);
    }

    public function getUpdate($id)
    {
        return view('month.update', ['month' => Month::find($id)]);
    }

    public function postUpdate($id)
    {
        $month = Month::find($id);
        $rules = ["MonthName" => "required"];
        if ($month->MonthName != Input::get('MonthName'))
            $rules += ['MonthName' => 'required|unique:months'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $month->MonthName = Input::get('MonthName');
        $month->save();
        return ['url' => 'month/list'];
    }

    public function getCreate()
    {
        return view('month.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "MonthName" => "required|unique:months",
            
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        $month = new Month();
        $month->MonthName = Input::get('MonthName');
        $month->save();

        return ['url' => 'month/list'];
    }

    public function getDelete($id)
    {
        Month::destroy($id);
        return Redirect('month/list');
    }

}