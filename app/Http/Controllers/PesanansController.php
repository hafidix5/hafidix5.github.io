<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pesanans;
use App\Models\detail_pesanans;
use App\Models\barangs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PesanansController extends Controller
{

    /**
     * Display a listing of the pesanans.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pesanansObjects = pesanans::paginate(25);

        return view('pesanans.index', compact('pesanansObjects'));
    }

    /**
     * Show the form for creating a new pesanans.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('pesanans.create');
    }
    public function detail($request)
    {
        
        session(['pesanan_id' => $request]);
        $Barangs = barangs::pluck('nama','id')->all();
       // $v= session('pesanan_id');
        return view('detail_pesanans.create',compact('Barangs'));
    }
    public function detail_list($request)
    {
        session(['pesanan_id' => $request]);
        $detailPesanansObjects = detail_pesanans::with('pesanan', 'barang')->where('pesanans_id',$request)->paginate(25);
        $idpesanan=$request;
        return view('detail_pesanans.index', compact('detailPesanansObjects','idpesanan'));
    }

    /**
     * Store a new pesanans in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'pesanans', 'field' => 'id', 'length' => 8, 'prefix' => 'ps-']);
            $data['id'] = $id;
            pesanans::create($data);

            return redirect()->route('pesanans.pesanans.index')
                ->with('success_message', 'Pesanans was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified pesanans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pesanans = pesanans::findOrFail($id);

        return view('pesanans.show', compact('pesanans'));
    }

    /**
     * Show the form for editing the specified pesanans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pesanans = pesanans::findOrFail($id);
        

        return view('pesanans.edit', compact('pesanans'));
    }

    /**
     * Update the specified pesanans in the storage.
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
            if ($request->file('file_pesanan')) {
                $data_file = $request->file('file_pesanan');
                $data_ekstensi = $data_file->extension();
                $data_nama = date('ymdhis') . '.' . $data_ekstensi;
                $data_file->move(public_path('pesanan'), $data_nama);
    
                $data['file_pesanan'] = $data_nama;
            }
            $pesanans = pesanans::findOrFail($id);
            $pesanans->update($data);

            return redirect()->route('pesanans.pesanans.index')
                ->with('success_message', 'Pesanans was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified pesanans from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $pesanans = pesanans::findOrFail($id);
            $pesanans->delete();

            return redirect()->route('pesanans.pesanans.index')
                ->with('success_message', 'Pesanans was successfully deleted.');
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
            'toko' => 'required|string|min:1|max:40',
            'pemesan' => 'required|string|min:1|max:40',
            'file_pesanan' => 'nullable|mimes:pdf|max:2048',
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
