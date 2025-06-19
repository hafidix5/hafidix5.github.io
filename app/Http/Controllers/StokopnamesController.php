<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\barangs;
use App\Models\stokopnames;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StokopnamesController extends Controller
{

    /**
     * Display a listing of the stokopnames.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $stokopnamesObjects = stokopnames::with('barang')->paginate(25);

        return view('stokopnames.index', compact('stokopnamesObjects'));
    }
    public function index_masuk()
    {

        $stokopnamesObjects = DB::table('pesanans as p')
        ->join('detail_pesanans as d', 'p.id', '=', 'd.pesanans_id')
        ->join('barangs as b', 'd.barangs_id', '=', 'b.id')
        ->join('stokopnames as s', 'b.id', '=', 's.barangs_id')
        ->select('p.tanggal', 'p.toko', 'p.pemesan', 'b.nama as barang', 'd.jumlah_diterima as masuk')
        ->whereColumn('d.jumlah_dipesan', 'd.jumlah_diterima') // Ensure both columns match
        ->get();
        return view('stokopnames_masuk.index', compact('stokopnamesObjects'));
    }

    /**
     * Show the form for creating a new stokopnames.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Barangs = barangs::pluck('nama','id')->all();
        
        return view('stokopnames.create', compact('Barangs'));
    }

    /**
     * Store a new stokopnames in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $updatebarang = barangs::findOrFail($data['barangs_id']);

            if ($updatebarang->stok < $data['jumlah_keluar']) {
                return redirect()->route('stokopnames.stokopnames.index')
                ->with('danger_message', 'barang tersedia kurang');
            }
        
            $updatebarang->decrement('stok', $data['jumlah_keluar']);
            $id = IdGenerator::generate(['table' => 'stokopnames', 'field' => 'id', 'length' => 20, 'prefix' => 'so-']);
            $data['id'] = $id;
            stokopnames::create($data);

            return redirect()->route('stokopnames.stokopnames.index')
                ->with('success_message', 'Stokopnames was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function cekstok(Request $request)
    {
        $data['stok'] = barangs::where('id', $request->barangs_idx)
            ->pluck('stok')
            ->first();

        return response()->json($data);
    }

    /**
     * Display the specified stokopnames.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $stokopnames = stokopnames::with('barang')->findOrFail($id);

        return view('stokopnames.show', compact('stokopnames'));
    }

    /**
     * Show the form for editing the specified stokopnames.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $stokopnames = stokopnames::findOrFail($id);
        $Barangs = barangs::pluck('nama','id')->all();

        return view('stokopnames.edit', compact('stokopnames','Barangs'));
    }

    /**
     * Update the specified stokopnames in the storage.
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
            
            $stokopnames = stokopnames::findOrFail($id);
            $stokopnames->update($data);

            return redirect()->route('stokopnames.stokopnames.index')
                ->with('success_message', 'Stokopnames was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified stokopnames from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $stokopnames = stokopnames::findOrFail($id);
            $stokopnames->delete();

            return redirect()->route('stokopnames.stokopnames.index')
                ->with('success_message', 'Stokopnames was successfully deleted.');
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
            'barangs_id' => 'required',
            'penerima' => 'required|string|min:1|max:40',
            'jumlah_masuk' => 'nullable|string',
            'jumlah_keluar' => 'required|string', 
            'stok' => 'nullable|string', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
