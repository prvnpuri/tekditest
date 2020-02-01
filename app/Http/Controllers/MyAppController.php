<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAppController extends Controller
{

	public function flattendToHierachical(Request $request){
	
	
		$data=$request->json()->all();
		
		$listdata=$data;
		$hData=[];
		$index=0;
		foreach($data as $item){
			$parent=$item["parent"];
			$id=$item["id"];
			$child=array_filter($data,function($d)use($id){
				
					return $d["parent"]==$id;
				});
		
			$item["children"]=array_values($child);
			if($parent==0){
				$hData[]=$item;			
			}	
									
		}
		return $hData;
	}


}
