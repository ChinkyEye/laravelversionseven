<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\School;
use Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::get();
        return view('backend.school.index', compact('schools'));
    }

    public function getAllSchool(Request $request){
        $columns = array(
            0 =>'id', 
            1 =>'name', 
            2 =>'address',
            3 =>'phone_no',
            4 =>'action',
        );
        $totalData = School::where('is_active','1')->orderBy('id','asc')->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {            
            $posts = School::where('is_active','1')->offset($start)
            // ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $posts = School::where('name', 'LIKE',"%{$search}%")
            // ->orWhere('name', 'LIKE',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = School::where('is_active','1')
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

    public function getAllBook(Request $request)
    {
        $columns = array(
            0 =>'id', 
            1 =>'name',
            2 =>'address',
            3 =>'phone_no',
            4 =>'action',
        );
        $totalData = School::where('is_active','1')->orderBy('id','desc')->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $posts = School::where('is_active','1')->offset($start)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $posts = School::where('name', 'LIKE',"%{$search}%")
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = School::where('is_active','1')
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
                $nestedData['action'] = " ";
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
        return view('backend.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schools = School::create([
            'name'=> $request->name,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('school.index');
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
