<?php

namespace App\Http\Controllers\API;

use App\Area;
use App\Category;
use App\Photo;
use App\Post;
use App\PostPhoto;
use App\PostReview;
use App\User;
use App\UserActivities;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Validator;
use DB;

class PostController extends Controller
{

    public function postValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title'             => 'required | string | max:255',
            'sub_title'         => ' string | max:255',
            'description'       => ' string ',
            'area_id'           => 'integer',
            'category_id'       => 'integer',
            'address'           => ' string ',
            'quality'           => ' integer ',
            'mobile'            => ' string | regex:/(01)[0-9]{9}/ | digits:11',
            'post_status'       => ' string ',
            'post_type'         => 'string ',
            'financial_value'   => 'integer',
            //'latitude'          => 'regex: /^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)/',
            //'longitude'         => 'regex: /^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)/',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'error'=>$validator->errors(),
                'data' =>$request], 401);
        }
        else{
            return response()->json(['status' => 200]);
        }

    }

    public function index()
    {
        //
    }

    public function create(Request $request)
    {

        $validation = $this->postValidator($request)->status();

        if($validation == 200){
            $postData = $request->all();

            $postData['user_id'] = $user = Auth::user()->id;
            $postData['map_location_id'] = 1;
            $postData['post_status'] = 'Available';
            $postData = Post::create($postData);

            $userActivities['user_id'] = $postData['user_id'];
            $userActivities['post_id'] = $postData['id'];
            $userActivities['created'] = 1;

            UserActivities::create($userActivities);






            /*if($file =  $image) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $photo = Photo::create([
                    'path' => $name,
                    'imageable_id' => $postData['id'],
                    'imageable_type'=> 'App/Post'
                ]);
                return response()->json(['status => 200', 'message' => 'post with image is submitted','post'=>$postData, 'photo' =>$photo]);
            }*/
            return response()->json(['message' => 'post without image is submitted','data'=>$postData]);
        }
        else{
            return $this->postValidator($request);
        }

    }

    public function updatePost(Request $request){
        //return $request['id'];
        //return $request;
        //
        $validation = $this->postValidator($request)->status();

        if($validation == 200){
            $postData = $request->all();
            $postId = $postData['id'];
            unset($postData{'id'});
            unset($postData{'area'});

            $postData['user_id'] = $user = Auth::user()->id;
            //return $postData;
            $postData = Post::where('id', $postId )->update($postData);



            /*if($file =  $image) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $photo = Photo::create([
                    'path' => $name,
                    'imageable_id' => $postData['id'],
                    'imageable_type'=> 'App/Post'
                ]);
                return response()->json(['status => 200', 'message' => 'post with image is submitted','post'=>$postData, 'photo' =>$photo]);
            }*/
            return response()->json(['message' => 'post without image is submitted','data'=>$postData]);
        }
        else{
            return $this->postValidator($request);
        }

    }

    public function updateInfo(Request $request)
    {
        //
        if( Post::find($request->id)){

            $validation = $this->postValidator($request);

            //return $validation->status();
            $postData = $request->all();
            if ($validation->status() ==200){
                if($file = $request->image) {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images', $name);

                    $photo = Photo::create([
                        'path' => $name,
                        'imageable_id' => $postData['id'],
                        'imageable_type'=> 'App/Post'
                    ]);
                    unset($postData['image']);
                }
                Post::where( 'id', $postData['id'])->update($postData);
                return response()->json(['status' => 200, 'message' => 'Post updated','data'=>$postData]);
            }
            else{
                return $validation;
            }
        }
        else{
            return response()->json(['status' => 400, 'message' => 'Include a valid Post Id']);
        }
    }

    public function details($id)
    {
        $post = Post::where('id', $id)->get();
        foreach ($post as $item){
            $respons_data=[];
            $postPhoto = PostPhoto::where('post_id', $item['id'])->get();

            //return sizeof($postPhoto);
            for ($i=0; sizeof($postPhoto)>$i; $i++){
                $path = $postPhoto[$i]->photo->path;
                array_push($respons_data, '/images/'.$path);
            }
            $item['photo']= $respons_data;
            $area = Area::find($item['area_id']);
            $item['area'] = $area['branch'] .', '. $area['subordinate']. ', '. $area['district'] .', '. $area['division'] .', '. $area['post_code'];

            $category = Category::find($item['category_id']);
            $item['category'] = $category['category'];
            $item['sub_category']= $category['sub_category'];
            //return $category;

            $user = User::find($item['user_id']);
            //return $user;
            $item['name'] = $user['name'];
        }
        if( sizeof($post)>0){
            return response()->json(['message' => 'your request has been processed', 'data' =>  $post[0]]);

        }
        else
            return response()->json(['message' => 'Data not found'],500);


    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        //
    }

    //need validation

    public function getAllPost(Request $request){

        $area_max = 0;
        $area_min = 0;
        //return $request['type'];

        if($request['division']!=[] and $request['district']!=[]){
            $area = Area::where('division','=' ,$request['division'])->where('district', '=' ,$request['district'])->select('id')->get();
            $area_min = $area[0]['id'];
            $area_max = $area[sizeof($area)-1]['id'];
        }
        else if($request['division']!=[]){
            $area = Area::where('division','=' ,$request['division'])->select('id')->get();
            $area_min = $area[0]['id'];
            $area_max = $area[sizeof($area)-1]['id'];
        }
        $category = [];
        $category_id = [];
        //return sizeof($request['category']);
        if($request['category']!=[]){
            for ($i = 0; $i< sizeof($request['category']); $i++){
                $tem = Category::where('category', $request['category'][$i])->select('id')->get();
                array_push($category,$tem);
            }
            for($i=0; $i<sizeof($category); $i++){
                for ($j=0; $j<sizeof($category[$i]); $j++){
                    array_push($category_id, $category[$i][$j]['id']);
                }
                //array_push($category_id, $category[$i]['id']);
            }
        }
        $type = '';
        if($request['type']!=[]){
            $type = $request['type'];
            //return $type;
        }
        //return 'ok';
        //$post = Post::whereIn('category_id', $category_id)->whereBetween('area_id', [$area_min, $area_max])->where('post_type',$type)->get();
        //return $post;

        if($request['division']!=[] and $request['category']!=[] and $request['type']!=[]){
            $post = Post::whereIn('category_id', $category_id)->whereBetween('area_id', [$area_min, $area_max])->where('post_type', $type)->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['division']!=[] and $request['category']!=[] ){
            $post = Post::whereIn('category_id', $category_id)->whereBetween('area_id', [$area_min, $area_max])->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['division']!=[] and $request['type']!=[] ){
            $post = Post::where('post_type', $type)->whereBetween('area_id', [$area_min, $area_max])->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['type']!=[] and $request['category']!=[] ){

            $post = Post::whereIn('category_id', $category_id)->where('post_type', $type)->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['division']!=[]){
            $post = Post::whereBetween('area_id', [$area_min, $area_max])->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['category']!=[] ){
            $post = Post::whereIn('category_id', $category_id)->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        elseif ($request['type']!=[] ){
            $post = Post::where('post_type', $type)->select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        else{
            $post = Post::select('id', 'title', 'sub_title', 'area_id', 'post_type', 'post_status', 'created_at')->paginate(5);
        }
        //return $post;


        //$users = DB::table('users')->paginate(15);
        foreach ($post as $item){
            $respons_data=[];
            $postPhoto = PostPhoto::where('post_id', $item['id'])->get();

             //return sizeof($postPhoto);
            for ($i=0; sizeof($postPhoto)>$i; $i++){
                $path = $postPhoto[$i]->photo->path;
                array_push($respons_data, '/images/'.$path);
            }
            $item['photo']= $respons_data;
            $area = Area::find($item['area_id']);
            $item['area'] = $area['branch'] .', '. $area['subordinate']. ', '. $area['district'] .', '. $area['division'] .', '. $area['post_code'];
        }

        return response()->json([$post], 200);
    }

    public function getUsersPost($userId, $postId){
        //$userId = Auth::user()->id;
        $post = Post::where('user_id', $userId)->where('id', $postId)->get();
        foreach ($post as $item){
            $respons_data=[];
            $postPhoto = PostPhoto::where('post_id', $item['id'])->get();

            //return sizeof($postPhoto);
            for ($i=0; sizeof($postPhoto)>$i; $i++){
                $path = $postPhoto[$i]->photo->path;
                array_push($respons_data, '/images/'.$path);
            }
            $item['photo']= $respons_data;
            $area = Area::find($item['area_id']);
            $item['area'] = $area['branch'] .', '. $area['subordinate']. ', '. $area['district'] .', '. $area['division'] .', '. $area['post_code'];

            $category = Category::find($item['category_id']);
            $item['category'] = $category['category'].', '.$category['sub_category'];
        }
        return response()->json(['message' => 'your request has been processed', 'data' =>  $post[0]]);

    }

    public function getUsersAllPost($userId){
        $userId = Auth::user()->id;
        $post = Post::select('id', 'title', 'post_type', 'post_status', 'created_at')->where('user_id', $userId)->paginate(5);
        foreach ($post as $item){
            $respons_data=[];
            $postPhoto = PostPhoto::where('post_id', $item['id'])->get();

            //return sizeof($postPhoto);
            for ($i=0; sizeof($postPhoto)>$i; $i++){
                $path = $postPhoto[$i]->photo->path;
                array_push($respons_data, '/images/'.$path);
            }
            $item['photo']= $respons_data;
            $item['number_people']= 5;
            $item['receiver_name']= 'Biplob Biswas';
        }

        return response()->json([$post], 200);

    }

    public function postReviewSubmission(Request $request){

        //return 'ok';

        $validator = Validator::make($request->all(), [

            'comment_user'      => ' string | required',
            'comment_post'      => ' string | required',
            'quality'           => 'integer | min:1 | max:10',
            'post_id'           => ' integer| required ',
            'financial_value'   => 'integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'error'=>$validator->errors()], 401);
        }
        else{
            $postReview = $request->all();
            $postReview['user_id'] = Auth::user()->id;
            PostReview::create($postReview);
            return response()->json(['status' => 200, 'data'=>$postReview]);
        }

    }
    public function updateStatus($postId, $status){
        $userId = Auth::user()->id;
        $updatePost = Post::where('id',$postId)->where('user_id', $userId)->update(['post_status'=>$status]);
        return response()->json(['data'=>$updatePost]);
    }

    public function postReviewView(Request $request){
        $postReview = PostReview::where('post_id', $request->post_id)->get();

        return response()->json(['status' => 200, 'data'=>$postReview]);
    }

    public function userActivities(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id'        => ' integer ',
            'post_id'        => ' integer| required ',
            'created'        => ' integer ',
            'interested'     => ' integer',
            'received'       => ' integer',
        ]);
        $demoId = ['user_id','post_id', 'created', 'interested','received' ];

        $userActivities = $request->all();

        $userActivities['user_id'] = Auth::user()->id;

        foreach ($demoId as $demo){
            if(!array_key_exists($demo, $userActivities)){
                $userActivities[$demo] = 0;
            }
        }


        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'error'=>$validator->errors()], 401);
        }
        else{
            $data = UserActivities::where('user_id',$userActivities['user_id'])
                ->where('post_id',$userActivities['post_id'])
                ->where('created',$userActivities['created'])
                ->where('interested',$userActivities['interested'])
                ->where('received',$userActivities['received'])
                ->get();

            if(sizeof($data)<1){
                $userActivities = UserActivities::create($userActivities);
            }
            return response()->json(['status' => 200, 'data'=>$userActivities]);

        }
    }
}
