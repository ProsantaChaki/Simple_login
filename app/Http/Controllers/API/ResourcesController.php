<?php

namespace App\Http\Controllers\API;

use App\Area;
use App\Category;
use App\Photo;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class ResourcesController extends Controller
{
    //
    //
    function area($type, $name){

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

    function organization(){
        $organization = UserInfo::select('organization')->distinct()->get();
        //return $organization;
        $respons_data=[];
        foreach ($organization as $value){
            if($value["organization"] == null)
                continue;
            array_push($respons_data,$value["organization"]);
        }
        //$success[$column[$key+1] ] = $respons_data;
        return response()->json(['message'=> 'your request has been processed','data' =>  $respons_data], 200);

    }

    function category($column, $name){
        //$column = ['category','sub_category'];
        //$key = array_search($type , $column);
        try{
            if($column=='category'){
                $category = Category::select($column)->distinct()->get();
                $respons_data=[];
                foreach ($category as $value){
                    array_push($respons_data,$value[$column]);
                }
                $success[$column] =$respons_data;
                return response()->json(['message'=> 'your request has been processed','data' => $success ], 200);
            }
            else if($column=='sub_category'){
                $category = Category::where('category', $name)->select('sub_category')->distinct()->get();
                $respons_data=[];
                foreach ($category as $value){
                    array_push($respons_data, $value['sub_category']);
                }
                $success[$column] =$respons_data;
                return response()->json(['message'=> 'your request has been processed','data' => $success ], 200);
            }
            else if($column=='id'){
                $category = Category::where('sub_category', $name)->select( 'id')->get();
                $respons_data=[];
                foreach ($category as $value){
                    array_push($respons_data, $value['id']);
                }
                $success[$column] =$respons_data;
                return response()->json(['message'=> 'your request has been processed','data' => $success ], 200);
            }
        }
        catch (Exception $e){
            return response()->json(['message' => $e->getMessage() ], 401);
        }

    }

    function subCategory(Request $request){
        //return 'ok';
       // return typeOf($request['category']);
        $data = Category::whereIn('category', $request['category'])->select('sub_category')->distinct()->get();
        //return $data;
        $respons_data = [];
        foreach ($data as $value){
            //return strlen($value['sub_category']);
            if(strlen($value['sub_category'])>1){
                array_push($respons_data, $value['sub_category']);
            }
        }
        //return $sub_category;
        $success['sub_category'] =$respons_data;
        return response()->json(['message'=> 'your request has been processed','data' => $success ], 200);
    }


    public function photo(Request $request){
        return response('ok');
        if($file = $request->file('image')) {
            return 'ok';
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create([
                'path' => $name,
                'imageable_id' => 8,
                'imageable_type'=> 'App/User',
            ]);
            UserInfo::where('user_id', $request->imageable_id)->update(['photo_id' => $photo['id']]);
        }
        else
        {
            return 'not ok';
        }
        return back();
    }
}
