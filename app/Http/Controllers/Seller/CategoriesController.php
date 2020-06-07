<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductModel;
use App\Model\CategoryModel;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = CategoryModel::all();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product = new CategoryModel();            

        $cek = CategoryModel::where('category_name', $request->category_name)->first();
        if ($cek) {
            return redirect(route('admin.categories.index'))->with('error', 'Categories already exist !');            
        }else{
            $product->category_name = $request->input('category_name');
            $file = $request->file('icon');
            $destinationPath = 'images/icon/'; // upload path
            $photo_name = uniqid() . '.'. $file->getClientOriginalExtension();
            $request->file('icon')->move($destinationPath, $photo_name);            
            $product->icon = $photo_name;
            $product->save();

            return redirect(route('admin.categories.index'))->with('message', 'Categories success Added !');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = CategoryModel::find($id);

        return view('admin.categories.edit', $data);        
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
        $product = CategoryModel::find($id);            

        $product->category_name = $request->input('category_name');

        if ($request->hasFile('icon') && $request->file('icon')->isValid()) {
            $file = $request->file('icon');
            $destinationPath = 'images/icon/'; // upload path
            $photo_name = uniqid() . '.'. $file->getClientOriginalExtension();
            $request->file('icon')->move($destinationPath, $photo_name);            
            $product->icon = $photo_name;
            $product->update();
        }else{
            $product->update();
        }     
        

        return redirect(route('admin.categories.index'))->with('message', 'Categories success Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = CategoryModel::find($id)->delete();
        return redirect(route('admin.categories.index'))->with('message', 'Categories success Deleted !');

    }
}
