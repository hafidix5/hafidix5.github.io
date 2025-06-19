<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kendaraans;
use Illuminate\Http\Request;
use Exception;

class KendaraansController extends Controller
{

    /**
     * Display a listing of the kendaraans.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $kendaraansObjects = kendaraans::paginate(25);

        return view('kendaraans.index', compact('kendaraansObjects'));
    }

    /**
     * Show the form for creating a new kendaraans.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('kendaraans.create');
    }

    /**
     * Store a new kendaraans in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            kendaraans::create($data);

            return redirect()->route('kendaraans.kendaraans.index')
                ->with('success_message', 'Kendaraans was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified kendaraans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $kendaraans = kendaraans::findOrFail($id);

        return view('kendaraans.show', compact('kendaraans'));
    }

    /**
     * Show the form for editing the specified kendaraans.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $kendaraans = kendaraans::findOrFail($id);
        

        return view('kendaraans.edit', compact('kendaraans'));
    }

    /**
     * Update the specified kendaraans in the storage.
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
            
            $kendaraans = kendaraans::findOrFail($id);
            $kendaraans->update($data);

            return redirect()->route('kendaraans.kendaraans.index')
                ->with('success_message', 'Kendaraans was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified kendaraans from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $kendaraans = kendaraans::findOrFail($id);
            $kendaraans->delete();

            return redirect()->route('kendaraans.kendaraans.index')
                ->with('success_message', 'Kendaraans was successfully deleted.');
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
                'id' => 'required|string|min:1|max:20',
                'jenis' => 'required|string|min:1|max:8',
            'pengguna' => 'required|string|min:1|max:40', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
