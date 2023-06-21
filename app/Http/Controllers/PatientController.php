<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data = Patient::all();

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{ 
            $validator = Validator::make($request->all(), [
                'first_name' => 'nullable|string|max:255',
                'middle_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'extension_name' => 'nullable|string|max:255',
                'dob' => 'required|string|max:255',
                'sex' => 'required|string|max:255',
                'contact' => 'nullable|string|max:255',
                'religion' => 'nullable|string|max:255',
                'ethnicity' => 'required|string|max:255',
                'image_url' => 'nullable|string|max:255',
                'FK_address_ID' => 'nullable|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'extension_name' => $request->input('extension_name'),
                'dob' => $request->input('dob'),
                'sex' => $request->input('sex'),
                'contact' => $request->input('contact'),
                'religion' => $request->input('religion'),
                'ethnicity' => $request->input('ethnicity'),
                'image_url' => $request->input('image_url'),
                'FK_address_ID' => $request->input('FK_address_ID'),
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data = new Patient;
            $data -> first_name = $clearData['first_name'];
            $data -> middle_name = $clearData['middle_name'];
            $data -> last_name = $clearData['last_name'];
            $data -> extension_name = $clearData['extension_name'];
            $data -> dob = $clearData['dob'];
            $data -> sex = $clearData['sex'];
            $data -> contact = $clearData['contact'];
            $data -> religion = $clearData['religion'];
            $data -> ethnicity = $clearData['ethnicity'];
            $data -> image_url = $clearData['image_url'];
            $data -> FK_address_ID = $clearData['FK_address_ID'];
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
            $data = Patient::find($id);

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function update($id,Request $request)
    {
        try{
            $data = Patient::find($id);
            
            $validator = Validator::make($request->all(), [
                'first_name' => 'nullable|string|max:255',
                'middle_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'extension_name' => 'nullable|string|max:255',
                'dob' => 'required|string|max:255',
                'sex' => 'required|string|max:255',
                'contact' => 'nullable|string|max:255',
                'religion' => 'nullable|string|max:255',
                'ethnicity' => 'required|string|max:255',
                'image_url' => 'nullable|string|max:255',
                'FK_address_ID' => 'nullable|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'extension_name' => $request->input('extension_name'),
                'dob' => $request->input('dob'),
                'sex' => $request->input('sex'),
                'contact' => $request->input('contact'),
                'religion' => $request->input('religion'),
                'ethnicity' => $request->input('ethnicity'),
                'image_url' => $request->input('image_url'),
                'FK_address_ID' => $request->input('FK_address_ID'),
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data -> first_name = $clearData['first_name'];
            $data -> middle_name = $clearData['middle_name'];
            $data -> last_name = $clearData['last_name'];
            $data -> extension_name = $clearData['extension_name'];
            $data -> dob = $clearData['dob'];
            $data -> sex = $clearData['sex'];
            $data -> contact = $clearData['contact'];
            $data -> religion = $clearData['religion'];
            $data -> ethnicity = $clearData['ethnicity'];
            $data -> image_url = $clearData['image_url'];
            $data -> FK_address_ID = $clearData['FK_address_ID'];
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
            $data = Patient::findOrFail($id);
            $data -> deleted = TRUE;
            $data -> updated_at = now();
            $data -> save();

            return response() -> json(["data" => "Success"], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }
}
