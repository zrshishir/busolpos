<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
class BranchController extends Controller
{
    public function getIndex()
    {
        return view('branch.index');
    }

    public function getList()
    {
        Session::put('branch_search', Input::has('ok') ? Input::get('search') : (Session::has('branch_search') ? Session::get('branch_search') : ''));
        Session::put('branch_field', Input::has('field') ? Input::get('field') : (Session::has('branch_field') ? Session::get('branch_field') : 'name'));
        Session::put('branch_sort', Input::has('sort') ? Input::get('sort') : (Session::has('branch_sort') ? Session::get('branch_sort') : 'asc'));
        $branches = Branch::where('name', 'like', '%' . Session::get('branch_search') . '%')
                            ->paginate(25);

        return view('branch.list', ['branches' => $branches]);
    }

    public function getUpdate($id)
    {
        
        return view('branch.update', ['branch' => Branch::find($id)]);
    }

    public function postUpdate($id)
    {
        $branch = Branch::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($branch->BranchName != Input::get('BranchName'))
            $rules += ['BranchName' => 'required|unique:branchs'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $branch->name = Input::get('name');
        $branch->address = Input::get('address');
        $branch->save();
        return ['url' => 'branch/list'];
    }

    public function getCreate()
    {
        
        return view('branch.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "BranchName" => "required|unique:branchs",
            "BranchNameBangla" => "required|unique:branchs",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $branch = new Branch();
       $branch->name = Input::get('name');
        $branch->address = Input::get('address');
        $branch->save();
        return ['url' => 'branch/list'];
    }

    public function getDelete($id)
    {
        Branch::destroy($id);
        return Redirect('branch/list');
    }

}