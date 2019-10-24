<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class FormResourceController extends Controller
{
    //
    function area($type, $name){

        //$tem=Area::select('division')->distinct()->get();

        //return response()->json(['message'=> 'your request has been processed','data' =>  $tem], 200);



        $column = ['division', 'district', 'subordinate', 'branch', 'post_code'];
        $key = array_search($type , $column);
        try{
            if($type=='branch'){
                $area = Area::where($type, $name)->select($column[$key+1],'id')->distinct()->get();
                return response()->json(['message' => 'your request has been processed','data' => $area[0] ], 200);
            }
            else{
                $area = Area::where($type, $name)->select($column[$key+1])->distinct()->get();
                $respons_data=[];
                foreach ($area as $value){
                    array_push($respons_data,$value[$column[$key+1]]);
                }
                $success[$column[$key+1] ] = $respons_data;
                return response()->json(['message'=> 'your request has been processed','data' =>  $success], 200);
            }

        }
        catch (Exception $e){
            return response()->json(['message' => $e->getMessage() ], 401);
        }


    }
}
