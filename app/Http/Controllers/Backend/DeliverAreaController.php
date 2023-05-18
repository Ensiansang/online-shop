<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeliverRegion;
use App\Models\DeliverTownship;
use App\Models\DeliverWard;
use Carbon\Carbon;

class DeliverAreaController extends Controller
{
    public function AllWard(){
        $ward = DeliverWard::latest()->get();
        return view('backend.deliver.ward.ward_all',compact('ward'));
    } // End Method 

    public function AddWard(){
        return view('backend.deliver.ward.ward_add');
    }// End Method 
    public function StoreWard(Request $request){ 

        DeliverWard::insert([ 
            'ward_name' => $request->ward_name, 
        ]);

       $notification = array(
            'message' => 'Township Location Name Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ward')->with($notification); 

    }// End Method 
    public function EditWard($id){

        $ward = DeliverWard::findOrFail($id);
        return view('backend.deliver.ward.ward_edit',compact('ward'));

    }// End Method 
    public function UpdateWard(Request $request){

        $ward_id = $request->id;

         DeliverWard::findOrFail($ward_id)->update([
            'ward_name' => $request->ward_name,
        ]);

       $notification = array(
            'message' => 'Township Location Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ward')->with($notification); 


    }// End Method 
    public function DeleteWard($id){

        DeliverWard::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Township Location Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 

    // Township 
    public function AllTownship(){
        $township = DeliverTownship::latest()->get();
        return view('backend.deliver.township.township_all',compact('township'));
    } // End Method 
    public function AddTownship(){
        $ward = DeliverWard::orderBy('ward_name','ASC')->get();
        return view('backend.deliver.township.township_add',compact('ward'));
    }// End Method
    public function StoreTownship(Request $request){ 

        DeliverTownship::insert([ 
            'ward_id' => $request->ward_id, 
            'township_name' => $request->township_name, 
        ]);

       $notification = array(
            'message' => 'Ward Location Name Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.township')->with($notification); 

    }// End Method 
    public function EditTownship($id){
        $ward = DeliverWard::orderBy('ward_name','ASC')->get();
        $township = DeliverTownship::findOrFail($id);
        return view('backend.deliver.township.township_edit',compact('township','ward'));

    }// End Method  
    public function UpdateTownship(Request $request){

        $township_id = $request->id;

         DeliverTownship::findOrFail($township_id)->update([
            'ward_id' => $request->ward_id, 
            'township_name' => $request->township_name, 
        ]);

       $notification = array(
            'message' => 'Ward Location Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.township')->with($notification); 

    }// End Method 
    public function DeleteTownship($id){

        DeliverTownship::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Ward Location Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 
    // Region 
    public function AllRegion(){
        $region = DeliverRegion::latest()->get();
        return view('backend.deliver.region.region_all',compact('region'));
    } // End Method 
    public function AddRegion(){
        $ward = DeliverWard::orderBy('ward_name','ASC')->get();
        $township = DeliverTownship::orderBy('township_name','ASC')->get();
        return view('backend.deliver.region.region_add',compact('ward','township'));
    }// End Method
    public function GetTownship($ward_id){
        $township = DeliverTownship::where('ward_id',$ward_id)->orderBy('township_name','ASC')->get();
            return json_encode($township);
    }
    public function StoreRegion(Request $request){ 

        DeliverRegion::insert([ 
            'ward_id' => $request->ward_id, 
            'township_id' => $request->township_id, 
            'region_name' => $request->region_name,
        ]);

       $notification = array(
            'message' => 'Region Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.region')->with($notification); 

    }// End Method 

    public function EditRegion($id){
        $ward = DeliverWard::orderBy('ward_name','ASC')->get();
        $township = DeliverTownship::orderBy('township_name','ASC')->get();
        $region = DeliverRegion::findOrFail($id);
         return view('backend.deliver.region.region_edit',compact('ward','township','region'));
    }// End Method 


     public function UpdateRegion(Request $request){

        $region_id = $request->id;

         DeliverRegion::findOrFail($region_id)->update([
            'ward_id' => $request->ward_id, 
            'township_id' => $request->township_id, 
            'region_name' => $request->region_name,
        ]);

       $notification = array(
            'message' => 'Region Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.region')->with($notification); 


    }// End Method 

 public function DeleteRegion($id){

        DeliverRegion::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Region Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }// End Method 

}
