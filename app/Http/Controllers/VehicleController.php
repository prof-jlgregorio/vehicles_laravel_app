<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..retrieve all vehicles from database
        //$vehicles = Vehicle::all();
        $vehicles = Vehicle::with('brand')->paginate(10);

        //..return the view with the retrieved data
        return view('vehicle.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = BrandController::getBrands();

        //..return the form to create a new vehicle
        return view('vehicle.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //..do the validation
        // $request->validate($this->getRules(), 
        //     $this->getRulesMessages()
        // );
        $request->validate($this->getRules());
        
        //dd($request);
        $vehicle = new Vehicle();
        $vehicle->name = $request->input('name');
        $vehicle->color = $request->input('color');
        $vehicle->year = $request->input('year');
        $vehicle->brand_id = $request->input('brand');
        $vehicle->save();
        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //..retrieve the resource from database
        $v = Vehicle::find($id);
        //..if the return exists, then...
        if($v){
            //..return a the view, with the data;
            return view('vehicle.show')->with('vehicle', $v);
        } else {
            //else return the page 404.
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //..retrive the vehicle using $id
        $v = Vehicle::find($id);

        //..retrive the brands
        $brands = BrandController::getBrands();

        //..return the view to edit the vehicle
        return view('vehicle.edit')
            ->with('vehicle', $v)
            ->with('brands', $brands);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate($this->getRules());
        
        //find the vehicle to update
        $v = Vehicle::find($id);
        //..update the values
        $v->name = $request->input('name');
        $v->year = $request->input('year');
        $v->color = $request->input('color');
        $v->brand_id = $request->input('brand');
        //..persist
        $v->save();
        //..redirect to 'index' route
        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..find the resource to delete
        $v = Vehicle::find($id);
        //..delete it!
        $v->delete();
        //..redirect to index
        return redirect(route('vehicles.index'));
    }

    //..get the validation rules
    public function getRules(){
        $rules = [
            'name' => 'required|max:50',
            'year' => 'required|numeric|digits:4',
            'color' => 'required|max:30' 
        ];
        return $rules;
    }

    //..get the validation error messages
    public function getRulesMessages(){
        $msg = [
            'name.*' => 'Digite um nome com até 50 caracteres.',
            'year.*' => 'Digite um ano com 4 dígitos.',
            'color.*' => 'Digite uma cor com até 30 caracteres.'
        ];
        return $msg;
    }

}
