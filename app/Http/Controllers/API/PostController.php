<?php

namespace App\Http\Controllers\API;

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
            Post::create($postData);

            return response()->json(['success'=>$postData]);
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
        if( $request->id){

            $validation = $this->postValidator($request)->status();
            $postData = $request->all();
            Post::where( 'id', $postData['id'])->update($postData);

            return response()->json(['status' => 200, 'success'=>$postData]);
        }
        else{
            return response()->json(['status' => 400, 'message' => 'Include Post Id']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        //
        $postData = Post::find($request->id);
        //return $postData;
        return response()->json(['success'=>$postData]);


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
            return response()->json(['status' => 200, 'success'=>$postReview]);
        }

    }

    public function postReviewView(Request $request){
        $postReview = PostReview::where('post_id', $request->post_id)->get();

        return response()->json(['status' => 200, 'success'=>$postReview]);
    }
}
