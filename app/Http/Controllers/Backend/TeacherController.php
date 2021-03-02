<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // var_dump(expression); die();
        return view('backend.teacher.create');
    }

    public function getAllTeacher(Request $request){
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'address',
            3 => 'phone_no',
            4 => 'subject',
            5 => 'action',
        );
        $totalData = Teacher::where('is_active','1')->orderBy('id','asc')->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {            
            $posts = Teacher::where('is_active','1')->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $posts = Student::where('name', 'LIKE',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = Student::where('is_active','1')
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->count();
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $index=>$post)
            {
                $nestedData['id'] = $index+1;
                $nestedData['name'] = $post->name;
                $nestedData['address'] = $post->address;
                $nestedData['phone_no'] = $post->phone_no;
                $nestedData['subject'] = $post->subject;
                $nestedData['action'] = "";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        echo json_encode($json_data); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('image');
        if($photo != ""){
            $destinationPath = 'images/student/';
            $extension = $photo->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $photo->move($destinationPath, $fileName);
        }
        $teacher=Teacher::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone_no' => $request['phone_no'],
            'subject' => $request['subject'],
            'image' => $fileName,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('teacher.index');
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
    public function update(Request $request, $id)
    {
        //
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
