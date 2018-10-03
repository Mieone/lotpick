<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class product extends Model
{
   protected $fillable = ['product_name', 'price'];
   protected $guarded = ['product_name'];
   public static function get_price()
   {
	    $data=DB::table('lat_locations')
			->select('lat_locations.lat_id','lat_locations.location_id','lot_gp_data.gp_id','lat_locations.status')
			->join('lot_gp_data','lot_gp_data.lot_id','=','lat_locations.lat_id')
			->get();
			return $data;
   }
}
