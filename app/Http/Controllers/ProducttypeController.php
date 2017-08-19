<?php
namespace App\Http\Controllers;

use App\Producttype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProducttypeController extends Controller
{
    public function getIndex()
    {
        return view('producttype.index');
    }

    public function getList()
    {
        Session::put('producttype_search', Input::has('ok') ? Input::get('search') : (Session::has('producttype_search') ? Session::get('producttype_search') : ''));
        Session::put('producttype_field', Input::has('field') ? Input::get('field') : (Session::has('producttype_field') ? Session::get('producttype_field') : 'ProducttypeyName'));
        Session::put('producttype_sort', Input::has('sort') ? Input::get('sort') : (Session::has('producttype_sort') ? Session::get('producttype_sort') : 'asc'));
        $producttypes = Producttype::where('id', 'like', '%' . Session::get('producttype_search') . '%')
            ->orderBy(Session::get('producttype_field'), Session::get('producttype_sort'))->paginate(8);
        return view('producttype.list', ['producttypes' => $producttypes]);
    }

    public function getUpdate($id)
    {
        return view('producttype.update', ['producttype' => Producttype::find($id)]);
    }

    public function postUpdate($id)
    {
        $producttype = Producttype::find($id);
        $rules = ["ProducttypeyCode" => "required"];
        if ($producttype->ProducttypeyName != Input::get('ProducttypeyName'))
            $rules += ['ProducttypeyName' => 'required|unique:producttypes'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $producttype->ProducttypeyName = Input::get('ProducttypeyName');
        $producttype->ProducttypeyCode = Input::get('ProducttypeyCode');
        $producttype->ProductInstallments = Input::get('ProductInstallments');
        $producttype->ProductRate = Input::get('ProductRate');
        $producttype->save();
        return ['url' => 'producttype/list'];
    }

    public function getCreate()
    {
        return view('producttype.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "ProducttypeyName" => "required|unique:producttypes",
            "ProducttypeyCode" => "required|unique:producttypes",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $producttype = new Producttype();
        $producttype->ProducttypeyName = Input::get('ProducttypeyName');
        $producttype->ProducttypeyCode = Input::get('ProducttypeyCode');
        $producttype->ProductInstallments = Input::get('ProductInstallments');
        $producttype->ProductRate = Input::get('ProductRate');
        $producttype->save();
        return ['url' => 'producttype/list'];
    }

    public function getDelete($id)
    {
        Producttype::destroy($id);
        return Redirect('producttype/list');
    }

}