<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Teacher;
use App\School;
use Auth;
use Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        return $id?Teacher::find($id):Teacher::all();
        // $teachers = Teacher::find($id);
        // return response()->json($teachers);
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
        $rules = array(
            "name"=>"required|min:13",
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            $schools = new School;
            $schools->name = $request->name;
            $schools->address = $request->address;
            $schools->phone_no = $request->phone_no;
            $schools->created_by = '13';
            $schools->save();
            if($schools){
                return ['result'=>'data is stored'];
            }else{
                return ['result'=>'error'];
            }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $datas = Teacher::find($request->id);
        $datas->name = $request->name;
        $datas->update();
        if($datas){
            return ['result'=>'data is updates'];
        }else{
            return ['result'=>'error'];
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
        $datas = Teacher::find($id);
        $datas->delete();
        if($datas){
            return ['result'=>'data is deleted'];
        }else{
            return ['result'=>'error'];
        }

    }
    public function search($name){
        $result = Teacher::where('name', 'like', '%'.$name.'%')->get();
        if(count($result)){
            return $result;
        } else {
            return array('No records found');
        }
        // return Teacher::where('name',"like","%".$name."%")->get();
    }
}
