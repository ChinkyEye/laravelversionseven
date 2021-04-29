<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Librarian;
use Auth;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function getLibrarian(){
       $librarians = Librarian::all();
       return request()->json(200, $librarians);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $librarians = Librarian::create($request->all());
        $librarians['created_by'] = Auth::user()->id;
        // $librarians->save();
        if($librarians->save()){
            $librarianss=Librarian::all();
            return request()->json(200, $librarianss);
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
        $librarians = Librarian::where('id', $id)->get();
        return request()->json(200 , $librarians);
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
        $librarians = Librarian::find($id);
        $librarians->name = $request->name;
        $librarians->address = $request->address;
        $librarians->phone_no = $request->phone_no;
        $librarians->gmail= $request->gmail;
        if($librarians->update()){
            $librarians = Librarian::all();
            return request()->json(200, $librarians);   
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
        $librarians = Librarian::where('id', $id);
        if($librarians->delete()){
            $librarianss = Librarian::all();
            return request()->json(200, $librarianss);
        }
    }
}
