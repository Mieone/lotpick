<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\product;
use Redirect;
class Lot_Locations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {						
        return view('lat_location',array('lotdata'=>$this->getdata_lot_first(),'count'=>count($this->getdata_lot_first_count()),'count_next'=>count($this->getdata_lot_first_count()),'active_tab'=>'lot'));
    }
	public function pick_list()
	{
		return view('pick_list',array('lotdata'=>$this->getdata_pick(),'active_tab'=>'lot'));
	}

    public function add_lat_location()
    {
         return view('add_lot_location',array('active_tab'=>'lotloc'));
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
       // $this->validate($request,['lot_id'=>'required','location_id'=>'required']);
	   // $lot_id=$request->input('lot_id');
       // $location_id=$request->input('location_id');
       
	    // $data2=DB::table('lat_locations')->where('lat_id',$lot_id)->get();
		   // if(count($data2)>0)
		   // {
			   // $res=DB::table('lat_locations')->where('lat_id',$lot_id)->update(['location_id' =>$location_id]);
				   // if($res)
					   // {
						   // return back()->with('message','Lot location updated Successfully');
					   // }
					   // else{
						   
						   // return back()->withInput()->with('message','Lot location updated Failed');
					   // }
		   // }
		   // else{
			     // $data=array('location_id'=>$location_id,'lat_id'=>$lot_id);
				 // $res= DB::table('lat_locations')->insert($data);	   
			        // if($res)
					   // {
						   // return back()->with('message','Lot location added Successfully');
					   // }
					   // else{
						   
						   // return back()->withInput()->with('message','Lot location added Failed');
					   // }
		   // }
		    if($request->ajax()){
				
				 $lot_id=$request->input('lot_id');
				   $location_id=$request->input('location_id');
				   
					$data2=DB::table('lat_locations')->where('lat_id',$lot_id)->get();
					   if(count($data2)>0)
					   {
						   $res=DB::table('lat_locations')->where('lat_id',$lot_id)->update(['location_id' =>$location_id]);
							   if($res)
								   {
							
									    return response()->json(['message'=>"Lot location updated Successfully",'status'=>'1']);
								   }
								   else{
									   
									    return response()->json(['message'=>"Lot location updated failed",'status'=>'0']);
								   }
					   }
					   else{
							 $data=array('location_id'=>$location_id,'lat_id'=>$lot_id);
							 $res= DB::table('lat_locations')->insert($data);	   
								if($res)
								   {
							
									    return response()->json(['message'=>"Lot location added Successfully",'status'=>'1']);
								   }
								   else{
									   
									    return response()->json(['message'=>"Lot location added failed",'status'=>'0']);
								   }
					   }
			}
			
    }
    
	public function picked($lotid)
	{
		$ldate = date('Y-m-d H:i:s');
		$res=DB::table('lat_locations')->where('lat_id',$lotid)->update(['status' =>'2','picked_date'=>$ldate]);
				   if($res)
					   {
						   return back()->with('message','Lot status changed Successfully');
					   }
					   else{
						   
						   return back()->withInput()->with('message','Lot status change Failed');
					   }
	}
	public function pickedpost(Request $request)
	{
		$this->validate($request,['lot_id'=>'required']);
	    $lotid=$request->input('lot_id');
		$ldate = date('Y-m-d H:i:s');
		$res=DB::table('lat_locations')->where('lat_id',$lotid)->update(['status' =>'2','picked_date'=>$ldate]);
				   if($res)
					   {
						   return back()->with('message','Lot status changed Successfully');
					   }
					   else{
						   
						   return back()->withInput()->with('message','Lot status change Failed');
					   }
	}
  public function update_lot(Request $request)
    {    
      if($request->ajax()){
		 
		  $lotid=$request->input('lot_id');
		  $location_id=$request->input('location_id');
		  $ldate = date('Y-m-d H:i:s');
		  $data2=DB::table('lat_locations')->where('lat_id',$lotid)->where('location_id',$location_id)->get();
					   if(count($data2)>0)
					   {
						    $res=DB::table('lat_locations')->where('lat_id',$lotid)->where('location_id',$location_id)->update(['status' =>'2','picked_date'=>$ldate]);
							   if($res)
							   {
								   return response()->json(['message'=>"Status changed Successfully",'status' =>'1']);
							   }
							   else{
								   return response()->json(['message'=>"Status change failed",'status' =>'0']);
							   }
					   }
					   else{
						      return response()->json(['message'=>"Please enter valid Lot or Location Id",'status' =>'0']);
					   }
	  }    
    }
	public function update_lot_pickup(Request $request)
    {    
      if($request->ajax()){
		 
		  $lotid1=$request->input('lot_id');
		  $lotid=str_replace('_',' ',$lotid1);	 
		  $ldate = date('Y-m-d H:i:s');
		  $data2=DB::table('lat_locations')->where('lat_id',$lotid)->get();
					   if(count($data2)>0)
					   {
						    $res=DB::table('lat_locations')->where('lat_id',$lotid)->update(['status' =>'2','picked_date'=>$ldate]);
							   if($res)
							   {
								   return response()->json(['message'=>"Status changed Successfully",'status' =>'1']);
							   }
							   else{
								   return response()->json(['message'=>"Status change failed",'status' =>'0']);
							   }
					   }
					   else{
						      return response()->json(['message'=>$lotid,'status' =>'0']);
					   }
	  }    
    }
    public function update_pick_lot()
	{
		return view('lat_loc_ajax',array('lotdata'=>$this->getdata_pick()));
	}
	public function next_lot_pick($sno)
	{
		 //$data2=DB::table('lat_locations')->where('lat_loc_id','>',$sno)->where('status','1')->orderBy('lat_loc_id','ASC')->get();
		 //return $data2;
		 $data= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')			
			->where('lat_locations.status','1')			
			->orderBy('lat_locations.lat_loc_id','ASC')
			->get();
	    $data2= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->where('lat_locations.lat_loc_id','>',$sno)
			->where('lat_locations.status','1')			
			->orderBy('lat_locations.lat_loc_id','ASC')
			->get();
		$count=	count($data);
		$count_next=count($data2);
		$data1= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status','lat_locations.lat_loc_id')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->where('lat_locations.lat_loc_id','>',$sno)
			->where('lat_locations.status','1')			
			->orderBy('lat_locations.lat_loc_id','ASC')
			->limit(1)
			->get();
			//return $data;
		return view('lot_pick_ajax',array('lotdata'=>$data1,'count'=>$count,'count_next'=>$count_next)); 
	}
	public function previous_lot_pick($sno)
	{
		// $data= DB::table('lat_locations')
			// ->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			// ->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			// ->where('lat_locations.status','1')			
			// ->orderBy('lat_locations.lat_loc_id','DESC')
			// ->get();
		// $count=	count($data);
		 // $data2= DB::table('lat_locations')
			// ->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			// ->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			// ->where('lat_locations.lat_loc_id','<',$sno)
			// ->where('lat_locations.status','1')			
			// ->orderBy('lat_locations.lat_loc_id','ASC')
			// ->get();
		// $count_next=count($data2);
		// $data1= DB::table('lat_locations')
			// ->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status','lat_locations.lat_loc_id')
			// ->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			// ->where('lat_locations.lat_loc_id','<',$sno)
			// ->where('lat_locations.status','1')			
			// ->orderBy('lat_locations.lat_loc_id','DESC')
			// ->limit(1)
			// ->get();
			//return $data;
		return view('lot_pick_ajax',array('lotdata'=>$this->getdata_lot_first(),'count'=>count($this->getdata_lot_first_count()),'count_next'=>count($this->getdata_lot_first_count())));
		
		//return view('lot_pick_ajax',array('lotdata'=>$data1,'count'=>$count,'count_next'=>$count_next)); 
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
	public function getdata()
	{
		 $data= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			//->where(['lat_locations.lat_id' => '', 'otherThing' => 'otherThing'])
			->get();
			return $data;
	}
	public function getdata_pick()
	{
		 $data= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status','lat_locations.lat_loc_id')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->where(['lat_locations.status' => '1'])
			->get();
			return $data;
	}
	public function getdata_lot_first()
	{
		 $data= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status','lat_locations.lat_loc_id')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->where(['lat_locations.status' => '1'])
			->orderBy('lat_locations.lat_loc_id','ASC')
			->limit(1)
			->get();
			return $data;
	}
	public function getdata_lot_first_count()
	{
		 $data= DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->where(['lat_locations.status' => '1'])
			->orderBy('lat_locations.lat_loc_id','ASC')
			->get();
			return $data;
	}
	public function update_pick()
	{
			 return view('lot_pick_ajax',array('lotdata'=>$this->getdata_lot_first(),'count'=>count($this->getdata_lot_first_count()),'count_next'=>count($this->getdata_lot_first_count())));
	}
	public function check_lot_id(Request $request)
	{
		if($request->ajax()){
		 
		  $lotid1=$request->input('lot_id');
		  $lotid=str_replace('_',' ',$lotid1);	
		  $res=DB::table('lot_gp_data')->where('lot_id',$lotid)->get();
			   if(count($res)>0)
			   {
				   return response()->json(['message'=>"Lot ID  available",'status'=>'1']);
			   }
			   else{
				   return response()->json(['message'=>"Lot ID not available, please insert in Receive Lot",'status'=>'0']);
			   }		
	  }
	}
    public function check_lot_id_pick(Request $request)
	{
		if($request->ajax()){
		 
		  $lotid=$request->input('lot_id');
		  $res=DB::table('lat_locations')->where('lat_id',$lotid)->get();
			   if(count($res)>0)
			   {
				   return response()->json(['message'=>"Lot ID  available",'status'=>'1']);
			   }
			   else{
				   return response()->json(['message'=>"Lot ID not available, please insert in Receive Lot",'status'=>'0']);
			   }		
	  }
	}
	public function test()
	{
		$data['productsdata']=product::all();   // For all the records
		$data['products']=product::find(1);          // based on ID (Primary Key)
		$data['count'] = product::where('price', '>', 10)->count();  // Use Where  
		//$users = User::where('votes', '>', 100)->take(10)->get();
		$data['count1'] = product::where('price', '>', 10)->take(1)->get();  // Use Where  
		$data['count2'] = product::where('price', '>', 10)->firstOrFail();;  // Use Where  
		$data['count3'] = product::whereRaw('product_name > ? and price = 40', [25])->get();
		$data['count4'] = product::get_price();
		return ($data);
	}
}
