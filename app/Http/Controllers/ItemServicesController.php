<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\item_services;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ItemServicesController extends Controller
{

    /**
     * Display a listing of the item services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $itemServicesObjects = item_services::paginate(25);

        return view('item_services.index', compact('itemServicesObjects'));
    }

    /**
     * Show the form for creating a new item services.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('item_services.create');
    }

    /**
     * Store a new item services in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'item_services', 'field' => 'id', 'length' => 3, 'prefix' => 'i']);
            $data['id'] = $id;
            item_services::create($data);

            return redirect()->route('item_services.item_services.index')
                ->with('success_message', 'Item Services was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified item services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $itemServices = item_services::findOrFail($id);

        return view('item_services.show', compact('itemServices'));
    }

    /**
     * Show the form for editing the specified item services.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $itemServices = item_services::findOrFail($id);
        

        return view('item_services.edit', compact('itemServices'));
    }

    /**
     * Update the specified item services in the storage.
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
            
            $itemServices = item_services::findOrFail($id);
            $itemServices->update($data);

            return redirect()->route('item_services.item_services.index')
                ->with('success_message', 'Item Services was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified item services from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $itemServices = item_services::findOrFail($id);
            $itemServices->delete();

            return redirect()->route('item_services.item_services.index')
                ->with('success_message', 'Item Services was successfully deleted.');
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
                'nama' => 'required|string|min:1|max:50', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
