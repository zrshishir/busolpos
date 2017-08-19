<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
use App\Branch;
use App\Branchproduct;

class SaleController extends Controller
{
    public function getIndex()
    {
        return view('sale.index');
    }

    public function getList()
    {
        Session::put('sale_search', Input::has('ok') ? Input::get('search') : (Session::has('sale_search') ? Session::get('sale_search') : ''));
        Session::put('sale_field', Input::has('field') ? Input::get('field') : (Session::has('sale_field') ? Session::get('sale_field') : 'quantity'));
        Session::put('sale_sort', Input::has('sort') ? Input::get('sort') : (Session::has('sale_sort') ? Session::get('sale_sort') : 'asc'));
        $sales = Sale::where('id', 'like', '%' . Session::get('sale_search') . '%')
                            ->paginate(25);

        return view('sale.list', ['sales' => $sales]);
    }

    public function getUpdate($id)
    {
        
        $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
        $branch_product_info = [''=>'--select--'] + Branchproduct::lists('product_id', 'id')->all();
         return view('sale.update', ['sale' => Sale::find($id)])->with('branch_info', $branch_info)->with('branch_product_info', $branch_product_info);
    }

    public function postUpdate($id)
    {
        $sale = SaleController::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($sale->SaleControllerName != Input::get('SaleControllerName'))
            $rules += ['SaleControllerName' => 'required|unique:sales'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $sale->branch_id = Input::get('branch_id');
        $sale->branch_product_id = Input::get('branch_product_id');
        $sale->quantity = Input::get('quantity');
        $sale->unit = Input::get('unit');
        $sale->date = Input::get('date');
        $sale->price = Input::get('price');
        $sale->profit = Input::get('profit');
        $sale->save();
        return ['url' => 'sale/list'];
    }

    public function getCreate()
    {
        
        $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
        $branch_product_info = [''=>'--select--'] + Branchproduct::lists('product_id', 'id')->all();
         return view('sale.create')->with('branch_info', $branch_info)->with('branch_product_info', $branch_product_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "SaleControllerName" => "required|unique:sales",
            "SaleControllerNameBangla" => "required|unique:sales",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $sale = new SaleController();
        $sale->branch_id = Input::get('branch_id');
        $sale->branch_product_id = Input::get('branch_product_id');
        $sale->quantity = Input::get('quantity');
        $sale->unit = Input::get('unit');
        $sale->date = Input::get('date');
        $sale->price = Input::get('price');
        $sale->profit = Input::get('profit');
        $sale->save();
        return ['url' => 'sale/list'];
    }

    public function getDelete($id)
    {
        SaleController::destroy($id);
        return Redirect('sale/list');
    }

}