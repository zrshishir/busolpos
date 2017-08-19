<?php
namespace App\Http\Controllers;

use App\Sharecertificate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SharecertificateController extends Controller
{
	public function getIndex()
	{


		return view('sharecertificate.index');
	}
	public function getList()
	{

		Session::put('sharecertificate_search', Input::has('ok') ? Input::get('search') : (Session::has('sharecertificate_search') ? Session::get('sharecertificate_search') : ''));

		Session::put('sharecertificate_field', Input::has('field') ? Input::get('field') : (Session::has('sharecertificate_field') ? Session::get('sharecertificate_field') : 'sharecertificate_id'));

		Session::put('sharecertificate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('sharecertificate_sort') ? Session::get('sharecertificate_sort') : 'asc'));

		$sharecertificates = Sharecertificate::where('member_name', 'like', '%' . Session::get('sharecertificate_search') . '%')
			->orderBy(Session::get('sharecertificate_field'), Session::get('sharecertificate_sort'))->paginate(8);

		return view('sharecertificate.list', ['sharecertificates' => $sharecertificates]);
	}
}