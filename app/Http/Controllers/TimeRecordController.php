<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\TimeRecord;

class TimeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TimeRecord::get()->keyBy('id');

        $user = JWTAuth::parseToken()->authenticate();
        return $user->timeRecords()->get()->keyBy('id');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =[
            'date' => $request->input('date'),
            'timezone' => $request->input('timezone'),
            'category_ids' => $request->input('category_ids'),

        ];
        $user = JWTAuth::parseToken()->authenticate();
        $user->timeRecords()->create($data)->save();

        return redirect('api/timerecords');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user->timerecords()->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =[
            'date' => $request->input('date'),
            'timezone' => $request->input('timezone'),
            'category_ids' => $request->input('category_ids'),

        ];
        $user = JWTAuth::parseToken()->authenticate();
        $user->timerecords()->find($id)->fill($data)->save();
        return "success!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
