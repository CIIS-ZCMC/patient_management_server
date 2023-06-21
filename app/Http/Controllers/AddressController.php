<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data = Address::all();

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{ 
            $validator = Validator::make($request->all(), [
                'bldg_no' => 'nullable|string|max:255',
                'street' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'zipcode' => 'required|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'bldg_no' => $request->input('bldg_no'),
                'street' => $request->input('street'),
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'zipcode' => $request->input('zipcode'),
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data = new Address;
            $data -> bldg_no = $clearData['bldg_no'];
            $data -> street = $clearData['street'];
            $data -> barangay = $clearData['barangay'];
            $data -> city = $clearData['city'];
            $data -> country = $clearData['country'];
            $data -> zipcode = $clearData['zipcode'];
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
            $data = Address::find($id);

            return response() -> json(["data" => $data], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }

    public function update($id,Request $request)
    {
        try{
            $data = Address::find($id);
            
            $validator = Validator::make($request->all(), [
                'bldg_no' => 'nullable|string|max:255',
                'street' => 'required|string|max:255',
                'barangay' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'zipcode' => 'required|string|max:255'
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $data = [
                'bldg_no' => $request->input('bldg_no'),
                'street' => $request->input('street'),
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'zipcode' => $request->input('zipcode'),
            ];
            
            $cleanData = [];

            foreach ($data as $key => $value) {
                $cleanData[$key] = strip_tags($value); 
            }

            $data -> bldg_no = $clearData['bldg_no'];
            $data -> street = $clearData['street'];
            $data -> barangay = $clearData['barangay'];
            $data -> city = $clearData['city'];
            $data -> country = $clearData['country'];
            $data -> zipcode = $clearData['zipcode'];
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
            $data = Address::findOrFail($id);
            $data -> deleted = TRUE;
            $data -> updated_at = now();
            $data -> save();

            return response() -> json(["data" => "Success"], 200);
        }catch(\Throwable $th){
            return response() -> json(['message' => $th -> getMessage()], 500);
        }
    }
}
