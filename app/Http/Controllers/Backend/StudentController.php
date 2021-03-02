<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use Auth;
use Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('backend.student.index', compact('students'));
    }

    public function getAllStudent(Request $request)
    {
        $columns = array(
            0 =>'id', 
            1 =>'name', 
            2 =>'address',
            3 =>'phone_no',
            4 =>'action',
        );
        $totalData = Student::where('is_active','1')->orderBy('id','asc')->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {            
            $posts = Student::where('is_active','1')->offset($start)
            // ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $posts = Student::where('name', 'LIKE',"%{$search}%")
            // ->orWhere('name', 'LIKE',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = Student::where('is_active','1')
            ->orWhere('name', 'LIKE',"%{$search}%")
            // ->orWhere('address', 'LIKE',"%{$search}%")
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uppdf = $request->file('image');
        if($uppdf != ""){
            $destinationPath = 'images/teacher/';
            $extension = $uppdf->getClientOriginalExtension();
            $fileName = md5(mt_rand()).'.'.$extension;
            $uppdf->move($destinationPath, $fileName);
            // $file_path = $destinationPath.'/'.$fileName;
            // $staff->photo = $uppdf->getClientOriginalName();
        }
        // var_dump($uppdf); die();
        $students = Student::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone_no' => $request['phone_no'],
            'image' => $fileName,
            'created_by' =>Auth::user()->id,
        ]);
        return redirect()->route('student.index');
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
        $students = Student::where('id',$id)->get();
        return view('backend.student.edit', compact('students'));
        // var_dump($students); die();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $main_data = $request->all();
        var_dump($main_data); die();
        $main_data['updated_by'] = Auth::user()->id;
        $student->update($main_data);
        return redirect()->route('student.index');
    }
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }
    // public function destroy($id)
    // {
    //     var_dump($id); die();
    // }
}
