<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $brandShow  = Brand::all();

            return response()->json([

                    'brandShow'=> $brandShow

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

        $brandList = Brand::create($request->all());

        $brandMessege = 'Brand Create Successfully';

        return response()->json([

            'brandMessege'=> $brandMessege


        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editBrand = Brand::find($id);

        return response()->json([

            'pullBrand'=>$editBrand

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $updateBrand = Brand::find($id);

        $updateBrand->update($request->all());

        return response()->json([


            'updateMessege'=>'Updated Successfully'


        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleteBrand = Brand::find($id);
        $deleteBrand->destroy($id);


        $deleteMessege = "Brand Delete Successfully";

        return response()->json([

            'deleteMessege'=>$deleteMessege


        ]);


    }
}
