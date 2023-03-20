<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\C_license;
use App\Models\Category;
use App\Models\License;
use App\Models\R_license;
use App\Models\RequestP;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clicense   = C_license::select()->with('license_cate','license')->where('category_id',1)->get();
        $clicense2   = C_license::select()->with('license_cate','license')->where('category_id',2)->get();
        $clicense3   = C_license::select()->with('license_cate','license')->where('category_id',3)->get();
        $clicense4   = C_license::select()->with('license_cate','license')->where('category_id',4)->get();
        $clicense5   = C_license::select()->with('license_cate','license')->where('category_id',5)->get();

        $category   = SubCategory::select()->with('cat_name')->where('category_id',1)->get();
        $category_1 = SubCategory::select()->with('cat_name')->where('category_id',2)->get();
        $category_2 = SubCategory::select()->with('cat_name')->where('category_id',3)->get();
        $category_3 = SubCategory::select()->with('cat_name')->where('category_id',4)->get();
        $category_4 = SubCategory::select()->with('cat_name')->where('category_id',5)->get();
        return view('investment.section.index',compact('category','category_1','category_2','category_3','category_4','clicense'
        ,'clicense2','clicense3','clicense4','clicense5'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id,$id1)
    {
        //
        $request = RequestP::select()->with('categoryname','city','subCat')->find($id);
        $r_license =R_license::select()->with('L_Lisense','R_Lisense')->where('request_id',$id)->get();
        $license = C_license::select()->with('license_cat','license')->where('category_id',$id1)->get();
        $category   = Category::select()->with('cat_license')->where('id',$id1)->get();
        return view('investment.section.create',compact('category','license','request','r_license'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
