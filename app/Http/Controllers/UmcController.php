<?php

namespace App\Http\Controllers;
use App\Models\UMC;

use Illuminate\Http\Request;

class UmcController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addUmc',['heading' => 'Add UMC Case']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUMC(Request $request)
    {
        $request->validate([
            'roll_number'=>'required'
        ]);
        $umc = new UMC();
        $umc->roll_number = $request->input('roll_number');
        $umc->save();
        return redirect()->route('umc.show')->with('info', 'UMC has been Added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $umc = UMC::all();
        return view('umc',['heading' => 'All UMC Cases','umc_all' => $umc]);
    }


    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $umc = UMC::find($id);
        $umc->delete();
        return redirect()->route('umc.show')->with('info', 'UMC is deleted successfully.');
    }
}
