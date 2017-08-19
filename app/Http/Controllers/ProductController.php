<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
class ProductController extends Controller
{
    public function getIndex()
    {
        return view('product.index');
    }

    public function getList()
    {
        Session::put('product_search', Input::has('ok') ? Input::get('search') : (Session::has('product_search') ? Session::get('product_search') : ''));
        Session::put('product_field', Input::has('field') ? Input::get('field') : (Session::has('product_field') ? Session::get('product_field') : 'name'));
        Session::put('product_sort', Input::has('sort') ? Input::get('sort') : (Session::has('product_sort') ? Session::get('product_sort') : 'asc'));
        $products = Product::where('name', 'like', '%' . Session::get('product_search') . '%')
                            ->paginate(25);

        return view('product.list', ['products' => $products]);
    }

    public function getUpdate($id)
    {
         $category_info = [''=>'--select--'] + Category::lists('name', 'id')->all();
        return view('product.update', ['product' => Product::find($id)])->with('category_info', $category_info);
    }

    public function postUpdate($id)
    {
        $product = Product::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($product->ProductName != Input::get('ProductName'))
            $rules += ['ProductName' => 'required|unique:products'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $product->category_id = Input::get('category_id');
        $product->name = Input::get('name');
        $product->company_name = Input::get('company_name');
        $product->details = Input::get('details');
        $product->cost_buy = Input::get('cost_buy');
        $product->cost_sale = Input::get('cost_sale');
        $product->save();
        return ['url' => 'product/list'];
    }

    public function getCreate()
    {
        $category_info = [''=>'--select--'] + Category::lists('name', 'id')->all();
        return view('product.create')->with('category_info', $category_info);
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "ProductName" => "required|unique:products",
            "ProductNameBangla" => "required|unique:products",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $product = new Product();
        $product->category_id = Input::get('category_id');
        $product->name = Input::get('name');
        $product->company_name = Input::get('company_name');
        $product->details = Input::get('details');
        $product->cost_buy = Input::get('cost_buy');
        $product->cost_sale = Input::get('cost_sale');
        $product->save();
        return ['url' => 'product/list'];
    }

    public function getDelete($id)
    {
        Product::destroy($id);
        return Redirect('product/list');
    }

}