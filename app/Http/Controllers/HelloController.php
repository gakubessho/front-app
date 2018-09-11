<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request){
        // $data = [
        //     "msg" => "これはBladeを利用したサンプルです"
        // ];
        $id = $request->id;
        $items = DB::table("people")->where("id",$id)->first();
        return view("hello.index",["items"=>$items]);
    }

    public function post(HelloRequest $request){
        return view("hello.index",["msg"=>"正しく入力されました！"]);
    }
}
