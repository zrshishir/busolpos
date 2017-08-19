<?php
namespace App\Http\Controllers;

use App\Duration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DurationController extends Controller
{
    public function getIndex()
    {
        return view('duration.index');
    }

    public function getList()
    {
        Session::put('duration_search', Input::has('ok') ? Input::get('search') : (Session::has('duration_search') ? Session::get('duration_search') : ''));
        Session::put('duration_field', Input::has('field') ? Input::get('field') : (Session::has('duration_field') ? Session::get('duration_field') : 'id'));
        Session::put('duration_sort', Input::has('sort') ? Input::get('sort') : (Session::has('duration_sort') ? Session::get('duration_sort') : 'asc'));
        $durations = Duration::where('id', 'like', '%' . Session::get('duration_search') . '%')
            ->orderBy(Session::get('duration_field'), Session::get('duration_sort'))->paginate(8);
        return view('duration.list', ['durations' => $durations]);
    }

    public function getUpdate($id)
    {
        return view('duration.update', ['duration' => Duration::find($id)]);
    }

    public function postUpdate($id)
    {
        $duration = Duration::find($id);
        $rules = ["DurationName" => "required"];
        if ($duration->DurationName != Input::get('DurationName'))
            $rules += ['DurationName' => 'required|unique:durations'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $duration->DurationName = Input::get('DurationName');
        $duration->save();
        return ['url' => 'duration/list'];
    }

    public function getCreate()
    {
        return view('duration.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "DurationName" => "required|unique:durations",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }


        $duration = new Duration();
//        $duration->file('image')->move($destinationPath, $fileName);

        $duration->DurationName = Input::get('DurationName');
        $duration->save();

        return ['url' => 'duration/list'];
    }

    public function getDelete($id)
    {
        Duration::destroy($id);
        return Redirect('duration/list');
    }

}