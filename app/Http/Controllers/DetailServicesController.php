<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\item_services;
use App\Models\services;
use App\Models\detail_services;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DetailServicesController extends Controller
{
    /**
     * Display a listing of the detail services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $detailServicesObjects = detail_services::with('itemservice', 'service')->paginate(25);

        return view('detail_services.index', compact('detailServicesObjects'));
    }

    /**
     * Show the form for creating a new detail services.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $ItemServices = item_services::pluck('nama', 'id')->all();

        return view('detail_services.create', compact('ItemServices'));
    }

    /**
     * Store a new detail services in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       // try {
            $data = $this->getData($request);

            $id = IdGenerator::generate(['table' => 'detail_services', 'field' => 'id', 'length' => 18, 'prefix' => 'ds-']);
            $data['id'] = $id;
            $data['services_id'] = session('service_id');
            detail_services::create($data);

            return redirect()->route('detail_services.detail_services.index')->with('success_message', 'Detail Services was successfully added.');
        /* } catch (Exception $exception) {
            return back()
                ->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        } */
    }

    /**
     * Display the specified detail services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $detailServices = detail_services::with('itemservice', 'service')->findOrFail($id);

        return view('detail_services.show', compact('detailServices'));
    }

    /**
     * Show the form for editing the specified detail services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $detailServices = detail_services::findOrFail($id);
        $ItemServices = item_services::pluck('nama', 'id')->all();
        $Services = services::pluck('nama', 'id')->all();

        return view('detail_services.edit', compact('detailServices', 'ItemServices', 'Services'));
    }

    /**
     * Update the specified detail services in the storage.
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

            $detailServices = detail_services::findOrFail($id);
            $detailServices->update($data);

            return redirect()->route('detail_services.detail_services.index')->with('success_message', 'Detail Services was successfully updated.');
        } catch (Exception $exception) {
            return back()
                ->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Remove the specified detail services from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $detailServices = detail_services::findOrFail($id);
            $detailServices->delete();

            return redirect()->route('detail_services.detail_services.index')->with('success_message', 'Detail Services was successfully deleted.');
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
            'item_services_id' => 'required',
            'biaya' => 'required|numeric|min:-2147483648|max:2147483647',
            'services_id' => 'nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }
}
