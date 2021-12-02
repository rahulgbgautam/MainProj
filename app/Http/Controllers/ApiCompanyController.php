<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class ApiCompanyController extends Controller
{
    public $successStatus = 200;

	 public function index()
    {   
        $company = company::latest('id')->paginate(10);
        return response()->json([
        		'status' => true,
        		'message' => "All companies record.",
        		'data' => $company,
        	]);
        
    }


    
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
	        'name'=>'required|max:50',
            'website'=>'required|max:50',
            'email'=>'required|email|unique:companies',
            'logo'=>'required|image|mimes:jpg,png,jpeg'
        ]);

        if(!$validator->fails()){

        	if($request->file('logo')){
            	$img_path = uploadImage($request->file('logo'));
	        }
	        $data = new company;
	        $data->name = $request->name;
	        $data->email = $request->email;
	        $data->website = $request->website;
	        $data->logo = $img_path;
	        $data->save();
        	return response()->json([
        		'status' => true,
        		'message' => "Company Added Successfully.",
        		'data' => $data,
        	]);
          	
        }else{
        		return response()->json([
					'status' => false,
					'message' =>$validator->messages()->first(),
					'data' => 'null'
				]);
    		}
    		
    }

    public function update(Request $request,$id)
    {
         $validator = Validator::make($request->all(), [
	        'name'=>'required|max:50',
            'website'=>'required|max:50',
            'logo'=>'required|image|mimes:jpg,png,jpeg'
        ]);

         if(!$validator->fails()){
        	 if($request->file('logo')!=''){
	            $img_path=uploadImage($request->file('logo'));
	            unlinkImage($request->old_logo);
	        }else{
	                $img_path=$request->old_logo;
	        }
	        $company = company::find($id);
	        $company->name = $request->name;
	        $company->website = $request->website;
	        $company->logo = $img_path;
	        $company->update();
        	return response()->json([
        		'status' => true,
        		'message' => "Company Updated Successfully.",
        		'data' => $company,
        	]);
          	
        }else{
        		return response()->json([
					'status' => false,
					'message' =>$validator->messages()->first(),
					'data' => 'null'
				]);
    		}

    }

    public function destroy($id)
    {   
        $data = company::find($id);
        $data->delete();
        return response()->json([
        		'status' => true,
        		'message' => "Company Record Deleted Successfully.",
        	]);
    }


}
