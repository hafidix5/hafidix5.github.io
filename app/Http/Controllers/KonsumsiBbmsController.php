<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bbms;
use App\Models\kendaraans;
use App\Models\konsumsi_bbms;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KonsumsiBbmsController extends Controller
{

    /**
     * Display a listing of the konsumsi bbms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $konsumsiBbmsObjects = konsumsi_bbms::with('kendaraan','bbm')->paginate(25);

        return view('konsumsi_bbms.index', compact('konsumsiBbmsObjects'));
    }

    /**
     * Show the form for creating a new konsumsi bbms.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Kendaraans = kendaraans::pluck('id','id')->all();
        $Bbms = bbms::pluck('nama','id')->all();
        
        return view('konsumsi_bbms.create', compact('Kendaraans','Bbms'));
    }

    public function cekbbm(Request $request)
    {
        $data['bbms_id'] = bbms::where('id', $request->bbms_idx)
            ->pluck('hargaperliter')
            ->first();

        return response()->json($data);
    }

    /**
     * Store a new konsumsi bbms in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'konsumsi_bbms', 'field' => 'id', 'length' => 10, 'prefix' => 'bbm-']);
            $data['id'] = $id;
            konsumsi_bbms::create($data);

            return redirect()->route('konsumsi_bbms.konsumsi_bbms.index')
                ->with('success_message', 'Konsumsi Bbms was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified konsumsi bbms.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $konsumsiBbms = konsumsi_bbms::with('kendaraan','bbm')->findOrFail($id);

        return view('konsumsi_bbms.show', compact('konsumsiBbms'));
    }

    /**
     * Show the form for editing the specified konsumsi bbms.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $konsumsiBbms = konsumsi_bbms::findOrFail($id);
        $Kendaraans = kendaraans::pluck('jenis','id')->all();
$Bbms = bbms::pluck('nama','id')->all();

        return view('konsumsi_bbms.edit', compact('konsumsiBbms','Kendaraans','Bbms'));
    }

    /**
     * Update the specified konsumsi bbms in the storage.
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
            
            $konsumsiBbms = konsumsi_bbms::findOrFail($id);
            $konsumsiBbms->update($data);

            return redirect()->route('konsumsi_bbms.konsumsi_bbms.index')
                ->with('success_message', 'Konsumsi Bbms was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified konsumsi bbms from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $konsumsiBbms = konsumsi_bbms::findOrFail($id);
            $konsumsiBbms->delete();

            return redirect()->route('konsumsi_bbms.konsumsi_bbms.index')
                ->with('success_message', 'Konsumsi Bbms was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
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
            'tanggal' => 'required',
            'kendaraans_id' => 'required',
            'bbms_id' => 'required',
            'jumlah' => 'required|numeric|min:-2147483648|max:2147483647',
            'total_harga' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
