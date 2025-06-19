<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categorys;
use App\Models\satuans;
use App\Models\barangs;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Exports\barangsExport;
use App\Imports\barangsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class BarangsController extends Controller
{

    /**
     * Display a listing of the barangs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $barangsObjects = barangs::with('category','satuan')->get();

        return view('barangs.index', compact('barangsObjects'));
    }

    /**
     * Show the form for creating a new barangs.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Categories = categorys::pluck('nama','id')->all();
$Satuans = satuans::pluck('nama','id')->all();
        
        return view('barangs.create', compact('Categories','Satuans'));
    }

    /**
     * Store a new barangs in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'barangs', 'field' => 'id', 'length' => 20, 'prefix' => 'br-']);
            $data['id'] = $id;
            barangs::create($data);

            return redirect()->route('barangs.barangs.index')
                ->with('success_message', 'Barangs was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified barangs.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $barangs = barangs::with('category','satuan')->findOrFail($id);

        return view('barangs.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified barangs.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $barangs = barangs::findOrFail($id);
        $Categories = categorys::pluck('id','id')->all();
$Satuans = satuans::pluck('id','id')->all();

        return view('barangs.edit', compact('barangs','Categories','Satuans'));
    }

    /**
     * Update the specified barangs in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $barangs = barangs::findOrFail($id);
            $barangs->update($data);

            return redirect()->route('barangs.barangs.index')
                ->with('success_message', 'Barangs was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified barangs from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       // try {
            $barangs = barangs::findOrFail($id);
            $barangs->delete();

            return redirect()->route('barangs.barangs.index')
                ->with('success_message', 'Barangs was successfully deleted.');
       /*  } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        } */
    }

      /**

    * @return \Illuminate\Support\Collection

    */

    public function export() 

    {

        return Excel::download(new barangsExport, 'barangs.xlsx');

    }

       

    /**

    * @return \Illuminate\Support\Collection

    */

    public function import(Request $request) 

    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        try {
            Excel::import(new barangsImport(), storage_path('app/public/excel/'.$nama_file));
            Storage::delete($path);
            return redirect()->back()->with('success_message', 'Data imported successfully!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return back()->withErrors($failures);
        } catch (\Exception $e) {
            return redirect()->back()->with('success_message', 'Error importing file: ' . $e->getMessage());
        }
        
        /* // import data
        $import = Excel::import(new barangsImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
       

        if($import) {
            //redirect
            return redirect()->back()->with('success_message', 'Data imported successfully!');
        } else {
            //redirect
            return redirect()->back()->with('success_message', 'Error importing file: ' . $e->getMessage());
        } */


       // Excel::import(new barangsImport,request()->file('file'));
      /*  $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    try {
        Excel::import(new barangsImport, $request->file('file'));
        return redirect()->back()->with('success_message', 'Data imported successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('success_message', 'Error importing file: ' . $e->getMessage());
    } */

               

       // return back();

    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'nama' => 'required|string|min:1|max:40',
            'categorys_id' => 'required',
            'satuans_id' => 'required',
            'stok' => 'required|string|min:1|max:3',
            'harga' => 'required|string|min:1|max:10', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
