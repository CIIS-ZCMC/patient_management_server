<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\PatientBiometric;

class PatientBiometricController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data = PatientBiometric::all();

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{ 
            $validator = Validator::make($request->all(), [
                'finger_1' => 'nullable|string|max:255',
                'finger_2' => 'required|string|max:255',
                'finger_3' => 'required|string|max:255',
                'FK_patient_ID' => 'required|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'finger_1' => $request->input('finger_1'),
                'finger_2' => $request->input('finger_2'),
                'finger_3' => $request->input('finger_3'),
                'FK_patient_ID' => $request->input('FK_patient_ID')
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data = new PatientBiometric;
            $data -> finger_1 = $clearData['finger_1'];
            $data -> finger_2 = $clearData['finger_2'];
            $data -> finger_3 = $clearData['finger_3'];
            $data -> FK_patient_ID = $clearData['FK_patient_ID'];
            $data -> created_at = now();
            $data -> updated_at = now();
            $data -> save();

            return response() -> json(["data" => "Success"], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function show($id, Request $request)
    {
        try{
            $data = PatientBiometric::find($id);

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function update($id,Request $request)
    {
        try{
            $data = PatientBiometric::find($id);
            
            $validator = Validator::make($request->all(), [
                'finger_1' => 'nullable|string|max:255',
                'finger_2' => 'required|string|max:255',
                'finger_3' => 'required|string|max:255',
                'FK_patient_ID' => 'required|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'finger_1' => $request->input('finger_1'),
                'finger_2' => $request->input('finger_2'),
                'finger_3' => $request->input('finger_3'),
                'FK_patient_ID' => $request->input('FK_patient_ID')
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data -> finger_1 = $clearData['finger_1'];
            $data -> finger_2 = $clearData['finger_2'];
            $data -> finger_3 = $clearData['finger_3'];
            $data -> FK_patient_ID = $clearData['FK_patient_ID'];
            $data -> updated_at = now();
            $data -> save();

            return response() -> json(["data" => "Success"], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }
    
    public function destroy($id, Request $request)
    {
        try{
            $data = PatientBiometric::findOrFail($id);
            $data -> deleted = TRUE;
            $data -> updated_at = now();
            $data -> save();

            return response() -> json(["data" => "Success"], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }
}
