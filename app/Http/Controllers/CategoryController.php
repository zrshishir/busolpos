<?php
namespace App\Http\Controllers;

use App\Zone;
use DB;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Division;
class CategoryController extends Controller
{
    public function getIndex()
    {
        return view('category.index');
    }

    public function getList()
    {
        Session::put('category_search', Input::has('ok') ? Input::get('search') : (Session::has('category_search') ? Session::get('category_search') : ''));
        Session::put('category_field', Input::has('field') ? Input::get('field') : (Session::has('category_field') ? Session::get('category_field') : 'name'));
        Session::put('category_sort', Input::has('sort') ? Input::get('sort') : (Session::has('category_sort') ? Session::get('category_sort') : 'asc'));
        $categories = Category::where('name', 'like', '%' . Session::get('category_search') . '%')
                            ->paginate(25);

        return view('category.list', ['categories' => $categories]);
    }

    public function getUpdate($id)
    {
        
        return view('category.update', ['category' => Category::find($id)]);
    }

    public function postUpdate($id)
    {
        $category = Category::find($id);
        /*$rules = ["DivisionId" => "required"];
        if ($category->CategoryName != Input::get('CategoryName'))
            $rules += ['CategoryName' => 'required|unique:categorys'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $category->name = Input::get('name');
        $category->address = Input::get('address');
        $category->save();
        return ['url' => 'category/list'];
    }

    public function getCreate()
    {
        
        return view('category.create');
    }

    public function postCreate()
    {
        /*$validator = Validator::make(Input::all(), [
            "DivisionId" => "required",
            "CategoryName" => "required|unique:categorys",
            "CategoryNameBangla" => "required|unique:categorys",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/
        $category = new Category();
        $category->name = Input::get('name');
        $category->address = Input::get('address');
        $category->save();
        return ['url' => 'category/list'];
    }

    public function getDelete($id)
    {
        Category::destroy($id);
        return Redirect('category/list');
    }

}