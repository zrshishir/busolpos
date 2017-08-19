<?php
namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    public function getIndex()
    {
        return view('domain.index');
    }

    public function getList()
    {
        Session::put('domain_search', Input::has('ok') ? Input::get('search') : (Session::has('domain_search') ? Session::get('domain_search') : ''));
        Session::put('domain_field', Input::has('field') ? Input::get('field') : (Session::has('domain_field') ? Session::get('domain_field') : 'id'));
        Session::put('domain_sort', Input::has('sort') ? Input::get('sort') : (Session::has('domain_sort') ? Session::get('domain_sort') : 'asc'));
        $domains = Domain::where('id', 'like', '%' . Session::get('domain_search') . '%')
            ->orderBy(Session::get('domain_field'), Session::get('domain_sort'))->paginate(8);
        return view('domain.list', ['domains' => $domains]);
    }

    public function getUpdate($id)
    {
        return view('domain.update', ['domain' => Domain::find($id)]);
    }

    public function postUpdate($id)
    {
        $domain = Domain::find($id);
        $rules = ["DomainNameBangla" => "required"];
        if ($domain->DomainName != Input::get('DomainName'))
            $rules += ['DomainName' => 'required|unique:domains'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $domain->DomainName = Input::get('DomainName');
        $domain->DomainNameBangla = Input::get('DomainNameBangla');
        $domain->save();
        return ['url' => 'domain/list'];
    }

    public function getCreate()
    {
        return view('domain.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "DomainName" => "required|unique:domains",
            "DomainNameBangla" => "required|unique:domains",
        ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }


        $domain = new Domain();
//        $domain->file('image')->move($destinationPath, $fileName);

        $domain->DomainName = Input::get('DomainName');
        $domain->DomainNameBangla = Input::get('DomainNameBangla');
        $domain->save();

        return ['url' => 'domain/list'];
    }

    public function getDelete($id)
    {
        Domain::destroy($id);
        return Redirect('domain/list');
    }

}