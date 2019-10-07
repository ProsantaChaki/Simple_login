<?php

namespace App\Http\Controllers\API;

use App\Photo;
use App\Post;
use App\PostReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function postValidator(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title'             => 'required | string | max:255',
            'sub_title'         => ' string | max:255',
            'description'       => ' string ',
            'area_id'           => 'integer',
            'address'           => ' string ',
            'quality'           => ' integer ',
            'mobile'            => ' string | regex:/(01)[0-9]{9}/ | digits:11',
            'status'            => ' string ',
            'type'              => 'string ',
            'financial_value'   => 'integer',
            //'latitude'          => 'regex: /^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)/',
            //'longitude'         => 'regex: /^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)/',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 401,
                'error'=>$validator->errors()], 401);
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
        //
        //return 'ok';
        $validation = $this->postValidator($request)->status();

        if($validation == 200){
            $postData = $request->all();
            $postData['user_id'] = $user = Auth::user()->id;
            $postData['map_location_id'] = 1;
            //if($request->id)
            $postData = Post::create($postData);

            //return $postDatas['id'];


            if($file = $request->image) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);

                $photo = Photo::create([
                    'path' => $name,
                    'imageable_id' => $postData['id'],
                    'imageable_type'=> 'App/Post'
                ]);

                return response()->json(['status => 200', 'message' => 'post with image is submitted','post'=>$postData, 'photo' =>$photo]);

            }

            return response()->json(['status => 200', 'message' => 'post without image is submitted','success'=>$postData]);
        }
        else{
            return $this->postValidator($request);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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


    public function details(Request $request)
    {
        //
        $postData = Post::find($request->id);
        //return $postData;
        return response()->json(['status => 200','message' => 'your has been processed', 'data'=>$postData]);


    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function postReviewSubmission(Request $request){

        //return 'ok';

        $validator = Validator::make($request->all(), [

            'comment'           => ' string ',
            'review'            => 'integer | | min:1 | max:10',
            'post_id'           => ' integer ',
            'post_id'           => ' integer ',
            'financial_value'   => 'integer',
            //'latitude'          => 'regex: /^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)/',
            //'longitude'         => 'regex: /^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)/',
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

    public function postReviewView(Request $request){
        $postReview = PostReview::where('post_id', $request->post_id)->get();

        return response()->json(['status' => 200, 'data'=>$postReview]);
    }
}
