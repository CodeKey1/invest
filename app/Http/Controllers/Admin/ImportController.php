<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\Side;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $import = Import:: select()->get();
        return view('import.index',compact('import'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $side = Side::select()->get();
        return view('import.create',compact('side'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = array();
        $import_attatch[]="";

        if ($files = $request->file('import_file')){
         foreach ($files as $ctr=>$file){
            $ext = strtolower($file->getClientOriginalName());
            $file_name = time().'.'.$ext;
            $path = 'import-files';
            $file -> move($path, $file_name);
            $import_attatch[$ctr]= $file_name;
         }

        }
        else{

            $import_attatch[] = "";

         }

        try{
             Import:: create(([
             'import_name' => $request['import_name'],
             'import_id' => $request['import_id'],
             'import_date' => $request['import_date'],
             'import_side' =>$request['import_side'],
             'import_note' =>$request['import_note'],
             'import_file' => implode('|',$import_attatch)
             ]));

            return redirect()->route('import')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('import')-> with(['error' => 'خطأ'.$ex]);
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
        $import = Import::select()->find($id);
        return view('import.edit',compact('import','side'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{
            $import = Import ::select()->where('id',$id)->find($id);
            //return redirect()->route('sewage.list') -> with(['success' => '--> ' . $project->pdate->project_id]);
            if(!$import){
                return redirect()->route('import')->with(['error' => 'وارد غير موجود']);
            }

            $import-> update(([
             'import_id' => $request['import_id'],
             'import_name' => $request['import_name'],
             'import_side' => $request['import_side'],

             ]));

            return redirect()->route('import')-> with(['success' => 'تم التسجيل بنجاح']);
        }catch(\Exception $ex){
            return redirect()->route('import')-> with(['error' => 'خطأ'.$ex]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $import = Import::find($id);
        $import->delete();
        return redirect()->route('import')->with(['success' => 'تم الحذف بنجاح']);
    }
}
