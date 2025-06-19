<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bbms;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BbmsController extends Controller
{

    /**
     * Display a listing of the bbms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bbmsObjects = bbms::paginate(25);

        return view('bbms.index', compact('bbmsObjects'));
    }

    /**
     * Show the form for creating a new bbms.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('bbms.create');
    }

    /**
     * Store a new bbms in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'bbms', 'field' => 'id', 'length' => 2, 'prefix' => 'b']);
            $data['id'] = $id;
            bbms::create($data);

            return redirect()->route('bbms.bbms.index')
                ->with('success_message', 'Bbms was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified bbms.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $bbms = bbms::findOrFail($id);

        return view('bbms.show', compact('bbms'));
    }

    /**
     * Show the form for editing the specified bbms.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $bbms = bbms::findOrFail($id);
        

        return view('bbms.edit', compact('bbms'));
    }

    /**
     * Update the specified bbms in the storage.
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
            
            $bbms = bbms::findOrFail($id);
            $bbms->update($data);

            return redirect()->route('bbms.bbms.index')
                ->with('success_message', 'Bbms was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified bbms from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bbms = bbms::findOrFail($id);
            $bbms->delete();

            return redirect()->route('bbms.bbms.index')
                ->with('success_message', 'Bbms was successfully deleted.');
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
                'nama' => 'required|string|min:1|max:10',
            'hargaperliter' => 'required|string|min:1|max:8', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
