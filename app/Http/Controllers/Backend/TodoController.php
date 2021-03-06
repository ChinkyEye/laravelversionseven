<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use Response;
use Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.task.index');
    }

    public function getData(){
        $teachers=Teacher::all();
        return request()->json(200, $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacherss = Teacher::create($request->all());
        $teacherss['created_by'] = Auth::user()->id;
        if($teacherss->save()){
            $teachers=Teacher::all();
            return request()->json(200, $teachers);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers= Teacher::where('id', $id)->get();
        return request()->json(200, $teachers);
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
        $teachers = Teacher::find($id);
        $teachers->name = $request->name;
        $teachers->address = $request->address;
        $teachers->phone_no = $request->phone_no;
        $teachers->subject = $request->subject;
        if($teachers->update()){
            $teachers = Teacher::all();
            return request()->json(200, $teachers);   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = Teacher::where('id', $id);
        if($teachers->delete()){
            $teachers=Teacher::all();
            return request()->json(200, $teachers);
        }
    }
}
