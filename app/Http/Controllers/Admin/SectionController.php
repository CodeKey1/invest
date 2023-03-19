<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\C_license;
use App\Models\Category;
use App\Models\License;
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

        $category   = SubCategory::select()->with('supcate')->where('category_id',1)->get();
        $category_1 = SubCategory::select()->with('supcate')->where('category_id',2)->get();
        $category_2 = SubCategory::select()->with('supcate')->where('category_id',3)->get();
        $category_3 = SubCategory::select()->with('supcate')->where('category_id',4)->get();
        $category_4 = SubCategory::select()->with('supcate')->where('category_id',5)->get();
        return view('investment.section.index',compact('category','category_1','category_2','category_3','category_4','clicense'
        ,'clicense2','clicense3','clicense4','clicense5'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $license = License::select()->get();
        $category   = Category::select()->get();
        return view('investment.section.create',compact('category','license'));
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
