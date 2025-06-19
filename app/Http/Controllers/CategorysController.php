<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categorys;
use Illuminate\Http\Request;
use Exception;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CategorysController extends Controller
{

    /**
     * Display a listing of the categorys.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categorysObjects = categorys::get();

        return view('categorys.index', compact('categorysObjects'));
    }

    /**
     * Show the form for creating a new categorys.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('categorys.create');
    }

    /**
     * Store a new categorys in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'categorys', 'field' => 'id', 'length' => 3, 'prefix' => 'c']);
            $data['id'] = $id;
            categorys::create($data);

            return redirect()->route('categorys.categorys.index')
                ->with('success_message', 'Categorys was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified categorys.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $categorys = categorys::findOrFail($id);

        return view('categorys.show', compact('categorys'));
    }

    /**
     * Show the form for editing the specified categorys.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categorys = categorys::findOrFail($id);
        

        return view('categorys.edit', compact('categorys'));
    }

    /**
     * Update the specified categorys in the storage.
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
            
            $categorys = categorys::findOrFail($id);
            $categorys->update($data);

            return redirect()->route('categorys.categorys.index')
                ->with('success_message', 'Categorys was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified categorys from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $categorys = categorys::findOrFail($id);
            $categorys->delete();

            return redirect()->route('categorys.categorys.index')
                ->with('success_message', 'Categorys was successfully deleted.');
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
                'nama' => 'required|string|min:1|max:40', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
