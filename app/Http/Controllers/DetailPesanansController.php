<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\barangs;
use App\Models\pesanans;
use App\Models\detail_pesanans;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DetailPesanansController extends Controller
{
    /**
     * Display a listing of the detail pesanans.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $detailPesanansObjects = detail_pesanans::with('pesanan', 'barang')->where('pesanans_id', session('pesanan_id'))->paginate(25);

        return view('detail_pesanans.index', compact('detailPesanansObjects'));
    }

    /**
     * Show the form for creating a new detail pesanans.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Barangs = barangs::pluck('nama', 'id')->all();

        return view('detail_pesanans.create', compact('Barangs'));
    }

    /**
     * Store a new detail pesanans in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
       // try {
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'detail_pesanans', 'field' => 'id', 'length' => 20, 'prefix' => 'dp-']);
            $data['id'] = $id;
            $data['pesanans_id'] = session('pesanan_id');
            detail_pesanans::create($data);

            return redirect()->route('detail_pesanans.detail_pesanans.index')->with('success_message', 'Detail Pesanans was successfully added.');
       /*  } catch (Exception $exception) {
            return back()
                ->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        } */
    }

    /**
     * Display the specified detail pesanans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $detailPesanans = detail_pesanans::with('pesanan', 'barang')->findOrFail($id);

        return view('detail_pesanans.show', compact('detailPesanans'));
    }

    /**
     * Show the form for editing the specified detail pesanans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $detailPesanans = detail_pesanans::findOrFail($id);
        $Barangs = barangs::pluck('nama', 'id')->all();

        return view('detail_pesanans.edit', compact('detailPesanans', 'Barangs'));
    }

    /**
     * Update the specified detail pesanans in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
       // try {
            $data = $this->getData($request);
            if((int)$data['jumlah_diterima']==(int)$data['jumlah_dipesan'])
            {
                $updatestok=barangs::where('id', $data['barangs_id'])->increment('stok', $data['jumlah_diterima']);

            }
            $detailPesanans = detail_pesanans::findOrFail($id);
            $detailPesanans->update($data);

            return redirect()->route('detail_pesanans.detail_pesanans.index')->with('success_message', 'Detail Pesanans was successfully updated.');
        /* } catch (Exception $exception) {
            return back()
                ->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        } */
    }

    /**
     * Remove the specified detail pesanans from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $detailPesanans = detail_pesanans::findOrFail($id);
            $detailPesanans->delete();

            return redirect()->route('detail_pesanans.detail_pesanans.index')->with('success_message', 'Detail Pesanans was successfully deleted.');
        } catch (Exception $exception) {
            return back()
                ->withInput()
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
            'pesanans_id' => 'nullable',
            'barangs_id' => 'nullable',
            'jumlah_dipesan' => 'nullable|string|min:1|max:4',
            'jumlah_diterima' => 'nullable|string|min:0|max:4',
        ];

        $data = $request->validate($rules);

        return $data;
    }
}
