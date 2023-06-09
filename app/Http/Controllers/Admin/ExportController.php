<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Export;
use App\Models\Side;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $export = Export::select()->get();
        return view('export.index',compact('export'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $side = Side::select()->get();
        return view('export.create',compact('side'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = array();
        $export_attatch[]="";

        if ($files = $request->file('export_file')){
            foreach ($files as $ctr=>$file){
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time().'.'.$ext;
                $path = 'export-files';
                $file -> move($path, $file_name);
                $export_attatch[$ctr]= $file_name;
            }
        }
        try{
            Export:: create(([
            'export_name' => $request['export_name'],
            'export_id' => $request['export_id'],
            'export_date' => $request['export_date'],
            'export_side' =>$request['export_side'],
            'export_note' =>$request['export_note'],
            'export_file' => implode('|',$export_attatch)
            ]));
            return redirect()->route('export')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('export')-> with(['error' => 'خطأ'.$ex]);
        }
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
        $side = Side::select()->get();
        $export = Export::select()->find($id);
        return view('export.edit',compact('export','side'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        try{
            $export = Export ::select()->where('id',$id)->find($id);
            //return redirect()->route('sewage.list') -> with(['success' => '--> ' . $project->pdate->project_id]);
            if(!$export){
                return redirect()->route('export')->with(['error' => 'وارد غير موجود']);
            }

            $export-> update(([
             'export_id' => $request['export_id'],
             'export_name' => $request['export_name'],
             'export_side' => $request['export_side'],

             ]));

            return redirect()->route('export')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('export')-> with(['error' => 'خطأ'.$ex]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $export = Export::find($id);
        $export->delete();
        return redirect()->route('export')->with(['success' => 'تم الحذف بنجاح']);
    }
}
