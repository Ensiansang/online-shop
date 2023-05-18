<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\User;

class ReportController extends Controller
{
    public function ReportView(){
        $users = User::where('role','user')->latest()->get();
        return view('backend.report.report_view',compact('users'));
    } // End Method 
    public function SearchByDate(Request $request){

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $order = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.report.report_by_date',compact('order','formatDate'));

    }// End Method 


    public function SearchByMonth(Request $request){

        $month = $request->month;
        $year = $request->year_name;

        $order = Order::where('order_month',$month)->where('order_year',$year)->latest()->get();
        return view('backend.report.report_by_month',compact('order','month','year'));

    }// End Method 


 public function SearchByYear(Request $request){ 

        $year = $request->year;

        $order = Order::where('order_year',$year)->latest()->get();
        return view('backend.report.report_by_year',compact('order','year'));

    }// End Method 

    public function SearchByUser(Request $request){
        
        $user = $request->user;
        
        $order = Order::where('user_id',$user)->latest()->get();
        return view('backend.report.report_by_user_show',compact('order','user'));
    }// End Method 
}
