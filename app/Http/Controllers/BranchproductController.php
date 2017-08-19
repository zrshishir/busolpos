<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Branchbranchproduct;
use App\Category;
use App\Product;
use App\Branch;
use App\Branchproduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
class BranchproductController extends Controller
{
    public function getIndex()
    {
        return view('branchproduct.index');
    }

    public function getList()
    {
        Session::put('branchproduct_search', Input::has('ok') ? Input::get('search') : (Session::has('branchproduct_search') ? Session::get('branchproduct_search') : ''));
        Session::put('branchproduct_field', Input::has('field') ? Input::get('field') : (Session::has('branchproduct_field') ? Session::get('branchproduct_field') : 'quantity'));
        Session::put('branchproduct_sort', Input::has('sort') ? Input::get('sort') : (Session::has('branchproduct_sort') ? Session::get('branchproduct_sort') : 'asc'));
        $branchproducts = Branchproduct::where('quantity', 'like', '%' . Session::get('branchproduct_search') . '%')
                            ->paginate(25);

        return view('branchproduct.list', ['branchproducts' => $branchproducts]);
    }

    public function getUpdate($id)
    {
         $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
         $product_info = [''=>'--select--'] + Product::lists('name', 'id')->all();
         return view('branchproduct.update', ['branchproduct' => Branchproduct::find($id)])->with('branch_info', $branch_info)->with('product_info', $product_info);
    }

    public function postUpdate($id)
    {
        $branchproduct = Branchproduct::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($branchproduct->BranchbranchproductName != Input::get('BranchbranchproductName'))
            $rules += ['BranchbranchproductName' => 'required|unique:branchproducts'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $branchproduct->category_id = Input::get('category_id');
        $branchproduct->name = Input::get('name');
        $branchproduct->company_name = Input::get('company_name');
        $branchproduct->details = Input::get('details');
        $branchproduct->cost_buy = Input::get('cost_buy');
        $branchproduct->cost_sale = Input::get('cost_sale');
        $branchproduct->save();
        return ['url' => 'branchproduct/list'];
    }

    public function getCreate()
    {
        $branch_info = [''=>'--select--'] + Branch::lists('name', 'id')->all();
         $product_info = [''=>'--select--'] + Product::lists('name', 'id')->all();
         return view('branchproduct.create')->with('branch_info', $branch_info)->with('product_info', $product_info);
        
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "BranchbranchproductName" => "required|unique:branchproducts",
            "BranchbranchproductNameBangla" => "required|unique:branchproducts",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $branchproduct = new Branchproduct();
        $branchproduct->branch_id = Input::get('branch_id');
        $branchproduct->product_id = Input::get('product_id');
        $branchproduct->quantity = Input::get('quantity');
        $branchproduct->unit = Input::get('unit');
        $branchproduct->save();
        return ['url' => 'branchproduct/list'];
    }

    public function getDelete($id)
    {
        Branchproduct::destroy($id);
        return Redirect('branchproduct/list');
    }

}