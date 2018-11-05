<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $supplier=Supplier::all();
       return response()->json([
           'suppliers'=>$supplier

       ]);
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
        $supplier=Supplier::create($request->all());
        $message='A new supplier has been added';
        return response()->json([

            'message'=>$message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editsupplier=Supplier::find($id);
        return response()->json([

            'editsupplier'=>$editsupplier

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatesupplier=Supplier::find($id);
        $updatesupplier->update($request->all());
        $message='The record has been updated successfully';

        return response()->json([

            'message'=>$message

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletesupplier=Supplier::find($id);
        $deletesupplier->destroy($id);
        $message='The record has been deleted successfully';
        return response()->json([
            'message'=>$message

        ]);
    }
}
