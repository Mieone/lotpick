<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class Gpcontroller extends Controller
{
    public function index()
    {

		//print_r($this->getdata());
		$da= date("Y-m-d");
		$dd=array('date'=>$da);
        return view('gp', array('maxdate'=>$dd,'vendors'=>$this->getdata()));
	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
      $this->validate($request,['vendorname'=>'required','gp'=>'required|regex:/(^[A-Za-z0-9 ]+$)+/','received_at'=>'required','received_at' =>'required']);
	   $gp=$request->input('gp');
       $vendorname=$request->input('vendorname');
       $received_at=$request->input('received_at');
	    $data2=DB::table('gp_details')->where('gp_name',$gp)->get();
	    
		   if(count($data2)>0)
		   {
			   return view('gp_lot', array('gp_number'=>$gp));
		   }
		   else{
			     $data=array('gp_name'=>$gp,'vendor_id'=>$vendorname,'received_at'=>$received_at);
				 $res= DB::table('gp_details')->insert($data);	   
				 return view('gp_lot', array('gp_number'=>$gp));
		   }
	 
    }
	public function store_lot(Request $request)
    {    
      if($request->ajax()){
		  $gp_number=$request->input('gp_number');
          $lot_id=$request->input('lot_id');
		   $data=DB::table('lot_gp_data')->where('lot_id',$lot_id)->get();
		   $data2=DB::table('lot_gp_data')->where('gp_id',$gp_number)->get();
		   if(count($data)>0)
		   {
			   return response()->json(['message'=>"This Lot number already added",'status'=>'0','gpdata'=>$data2]);
		   }
		   else{
			   $data1=array('gp_id'=>$gp_number,'lot_id'=>$lot_id);
	           $res= DB::table('lot_gp_data')->insert($data1);
			   if($res)
			   {
				    return response()->json(['message'=>"Inserted Successfully",'status'=>'1','gpdata'=>$data2]);
			   }
			   else{
				   return response()->json(['message'=>"Inserted failed",'status'=>'0','gpdata'=>$data2]);
			   }
			  
		   }
		
	  }
     
    }
	public function update_lot_gp($gpid)
	{
		     $gpid=str_replace('_',' ',$gpid);
		     $data2=DB::table('lot_gp_data')->where('gp_id',$gpid)->get();
			 return view('lot_gp_data',array('lotdata'=>$data2));
	}
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function getdata()
    {
        $data=DB::table('vendors')->where('status', '1')->get();
		return $data;
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
