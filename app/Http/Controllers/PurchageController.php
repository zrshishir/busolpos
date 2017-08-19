<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Purchage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
use App\Branch;
use App\Branchproduct;

class PurchageController extends Controller
{
    public function getIndex()
    {
        return view('purchage.index');
    }

    public function getList()
    {
        Session::put('purchage_search', Input::has('ok') ? Input::get('search') : (Session::has('purchage_search') ? Session::get('purchage_search') : ''));
        Session::put('purchage_field', Input::has('field') ? Input::get('field') : (Session::has('purchage_field') ? Session::get('purchage_field') : 'quantity'));
        Session::put('purchage_sort', Input::has('sort') ? Input::get('sort') : (Session::has('purchage_sort') ? Session::get('purchage_sort') : 'asc'));
        $purchages = Purchage::where('id', 'like', '%' . Session::get('purchage_search') . '%')
                            ->paginate(25);

        return view('purchage.list', ['purchages' => $purchages]);
    }

    public function getUpdate($id)
    {
        
        $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
        $branch_product_info = [''=>'--select--'] + Branchproduct::lists('product_id', 'id')->all();
         return view('purchage.update', ['purchage' => Purchage::find($id)])->with('branch_info', $branch_info)->with('branch_product_info', $branch_product_info);
    }

    public function postUpdate($id)
    {
        $purchage = PurchageController::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($purchage->PurchageControllerName != Input::get('PurchageControllerName'))
            $rules += ['PurchageControllerName' => 'required|unique:purchages'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $purchage->branch_id = Input::get('branch_id');
        $purchage->branch_product_id = Input::get('branch_product_id');
        $purchage->quantity = Input::get('quantity');
        $purchage->unit = Input::get('unit');
        $purchage->date = Input::get('date');
        $purchage->cost = Input::get('cost');
        $purchage->sell_price = Input::get('sell_price');
        $purchage->save();
        return ['url' => 'purchage/list'];
    }

    public function getCreate()
    {
        
        $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
        $branch_product_info = [''=>'--select--'] + Branchproduct::lists('product_id', 'id')->all();
         return view('purchage.create')->with('branch_info', $branch_info)->with('branch_product_info', $branch_product_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "PurchageControllerName" => "required|unique:purchages",
            "PurchageControllerNameBangla" => "required|unique:purchages",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $purchage = new PurchageController();
        $purchage->branch_id = Input::get('branch_id');
        $purchage->branch_product_id = Input::get('branch_product_id');
        $purchage->quantity = Input::get('quantity');
        $purchage->unit = Input::get('unit');
        $purchage->date = Input::get('date');
        $purchage->cost = Input::get('cost');
        $purchage->sell_price = Input::get('sell_price');
        $purchage->save();
        return ['url' => 'purchage/list'];
    }

    public function getDelete($id)
    {
        PurchageController::destroy($id);
        return Redirect('purchage/list');
    }

}