<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\satuans;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SatuansController extends Controller
{

    /**
     * Display a listing of the satuans.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $satuansObjects = satuans::paginate(25);

        return view('satuans.index', compact('satuansObjects'));
    }

    /**
     * Show the form for creating a new satuans.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('satuans.create');
    }

    /**
     * Store a new satuans in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'satuans', 'field' => 'id', 'length' => 3, 'prefix' => 's']);
            $data['id'] = $id;
            satuans::create($data);

            return redirect()->route('satuans.satuans.index')
                ->with('success_message', 'Satuans was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified satuans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $satuans = satuans::findOrFail($id);

        return view('satuans.show', compact('satuans'));
    }

    /**
     * Show the form for editing the specified satuans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $satuans = satuans::findOrFail($id);
        

        return view('satuans.edit', compact('satuans'));
    }

    /**
     * Update the specified satuans in the storage.
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
            
            $satuans = satuans::findOrFail($id);
            $satuans->update($data);

            return redirect()->route('satuans.satuans.index')
                ->with('success_message', 'Satuans was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified satuans from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $satuans = satuans::findOrFail($id);
            $satuans->delete();

            return redirect()->route('satuans.satuans.index')
                ->with('success_message', 'Satuans was successfully deleted.');
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
                'nama' => 'required|string|min:1|max:20', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
