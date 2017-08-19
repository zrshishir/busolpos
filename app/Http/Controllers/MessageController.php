<?php
/**
 * Created by PhpStorm.
 * User: Shishir
 * Date: 1/23/2017
 * Time: 5:42 PM
 */

namespace App\Http\Controllers;


class MessageController extends Controller
{
    public function getIndex(){
        return view('message.list');
    }

    public function getList()
    {
        Session::put('message_search', Input::has('ok') ? Input::get('search') : (Session::has('message_search') ? Session::get('message_search') : ''));
        Session::put('message_field', Input::has('field') ? Input::get('field') : (Session::has('message_field') ? Session::get('message_field') : 'name'));
        Session::put('message_sort', Input::has('sort') ? Input::get('sort') : (Session::has('message_sort') ? Session::get('message_sort') : 'asc'));
        $messages = message::where('name', 'like', '%' . Session::get('message_search') . '%')
            ->orderBy(Session::get('message_field'), Session::get('message_sort'))->paginate(8);
        return view('message.list', ['messages' => $messages]);
    }
}