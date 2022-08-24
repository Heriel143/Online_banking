<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInfo;
use Auth;

class PersonalInfoController extends Controller
{
    public function index(){
        return view('personalInfo');
    }

    public function addInfo(Request $request){
        $validatedData = $request->validate([
            'mobile_no' => 'required|max:13',
            'birth_date' => 'required',
            'nationality' => 'required',
            'physical_address' => 'required|max:255',
            'postal_address' => 'required|max:255',
            'id_card_type' => 'required|max:100',
            'id_no' => 'required|max:50',
        ]);

        // PersonalInfo::insert([
        //     'user_id' => Auth::user()->id,
        //     'mobile_no' => $request->mobile_no,
        //     'birth_date' => $request->birth_date,
        //     'nationality' => $request->nationality,
        //     'physical_address' => $request->physical_address,
        //     'postal_address' => $request->postal_address,
        //     'id_card_type' => $request->id_card_type,
        //     'id_no' => $request->id_no,
        // ]);
        
        $personalInfo = new PersonalInfo;
        $personalInfo->user_id = Auth::user()->id;
        $personalInfo->mobile_no = $request->mobile_no;
        $personalInfo->birth_date = $request->birth_date;
        $personalInfo->nationality = $request->nationality;
        $personalInfo->physical_address = $request->physical_address;
        $personalInfo->postal_address = $request->postal_address;
        $personalInfo->id_card_type = $request->id_card_type;
        $personalInfo->id_no = $request->id_no;
        $personalInfo->save();

        return Redirect('/account/create')->with('success', 'Submited successfully.');

    }
}
