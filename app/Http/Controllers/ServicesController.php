<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kendaraans;
use App\Models\services;
use App\Models\item_services;
use App\Models\detail_services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;

class ServicesController extends Controller
{

    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $servicesObjects = services::with('kendaraan')->paginate(25);
       

      /*   $itemsWithTotalPrice = detail_services::with('itemservice', 'service')
    ->selectRaw('SUM(detail_services.biaya) as total_biaya')
    ->addSelect('services.tanggal', 'services.kendaraans_id')
    ->join('services', 'detail_services.services_id', '=', 'services.id') // Ensure services table is joined
    ->groupBy('detail_services.services_id', 'services.tanggal', 'services.kendaraans_id')
    ->get(); */
    //$servicesObjects = services::with('kendaraan')->paginate(25);
    $servicesObjects = detail_services::with('itemservice', 'service')
    ->selectRaw('
        SUM(detail_services.biaya) as total_biaya,
        services.tanggal as tanggal,
        services.kendaraans_id as kendaraan,
        services.toko as toko,
        services.alamat as alamat,
        services.faktur as faktur,
        services.id as id
    ')
    ->join('services', 'detail_services.services_id', '=', 'services.id') // Ensure the join is correct
    ->groupBy('services.tanggal', 'services.kendaraans_id') // Group by non-aggregated columns
    ->get();

        return view('services.index', compact('servicesObjects'));
    }

    /**
     * Show the form for creating a new services.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Kendaraans = kendaraans::pluck('id','id')->all();
        
        return view('services.create', compact('Kendaraans'));
    }

    /**
     * Store a new services in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'services', 'field' => 'id', 'length' => 20, 'prefix' => 'svr-']);
            $data['id'] = $id;
            services::create($data);

            return redirect()->route('services.services.index')
                ->with('success_message', 'Services was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $services = services::with('kendaraan')->findOrFail($id);

        return view('services.show', compact('services'));
    }

    /**
     * Show the form for editing the specified services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $services = services::findOrFail($id);
        $Kendaraans = kendaraans::pluck('jenis','id')->all();

        return view('services.edit', compact('services','Kendaraans'));
    }

    /**
     * Update the specified services in the storage.
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
            if ($request->file('faktur')) {
                $data_file = $request->file('faktur');
                $data_ekstensi = $data_file->extension();
                $data_nama = date('ymdhis') . '.' . $data_ekstensi;
                $data_file->move(public_path('service'), $data_nama);
    
                $data['faktur'] = $data_nama;
               
            }
            
            $services = services::findOrFail($id);
            $services->update($data);

            return redirect()->route('services.services.index')
                ->with('success_message', 'Services was successfully updated.');
       /*  } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }    */     
    }

    public function detail_list($request)
    {
        session(['service_id' => $request]);
        $service_id=$request;
        $detailServicesObjects = detail_services::with('itemservice', 'service')->where('services_id',$request)->paginate(25);

        return view('detail_services.index', compact('detailServicesObjects','service_id'));
    }

    public function detail($request)
    {
        session(['service_id' => $request]);
        $ItemServices = item_services::pluck('nama', 'id')->all();
        $Services = services::pluck('id', 'id')->all();
        return view('detail_services.create',compact('ItemServices', 'Services'));
    }

    /**
     * Remove the specified services from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $services = services::findOrFail($id);
            $services->delete();

            return redirect()->route('services.services.index')
                ->with('success_message', 'Services was successfully deleted.');
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
            'toko' => 'required|string|min:1|max:20',
            'alamat' => 'required|string|min:1|max:50',
            'total_biaya' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'faktur' => 'nullable|mimes:pdf|max:2048',
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
