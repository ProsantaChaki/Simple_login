<?php
namespace App\Http\Controllers\API;
use App\Area;
use App\MapLocation;
use App\Photo;
use App\UserInfo;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Validator;
use DB;



class UserController extends Controller
{
    public $successStatus = 200;

    public function register(Request $request)
    {
        /*
         * email is optional for registration
         */
        if($request->email!=null){

            $validator = Validator::make($request->all(), [
                'email'      => 'required | email | regex:/\S+@\S+\.\S+/ | unique:users',
            ]);
            if ($validator->fails()){
                return response()->json(['message' => 'validation error', 'data'=>$validator->errors()], 401);
            }
        }


        $validator = Validator::make($request->all(), [
            'mobile'     => 'required | regex:/(01)[0-9]{9}/ | digits:11 | unique:users',
            'name'       => 'required | string | max:255',
            'password'   => 'required | string | min:8 ',
            'c_password' => 'required | same:password',
        ]);


        if ($validator->fails()) {
            //return 'not';
            return response()->json(['message' => 'validation error', 'data'=>$validator->errors()], 401);
        }


        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        //$input['email']
        $users = User::create($input);
        $success['id']    = $users->id;
        $success['name']  = $users->name;
        $success['token'] = $users->createToken('MyApp')-> accessToken;


        return response()->json(['message' => 'you are logged in', 'data'=>$success], $this-> successStatus);
    }


    /*
     * user can login by using either mobile no or email
     */
    public function login(){

        //return request('email');
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['id']    = $user->id;
            $success['name']  = $user->name;
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['message' => 'you are logged in', 'data' => $success], $this-> successStatus);
        }
        elseif (Auth::attempt(['mobile' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['id']    = $user->id;
            $success['name']  = $user->name;
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['message' => 'you are logged in', 'data' => $success],  $this-> successStatus);
        }
        else{
            return response()->json(['message' => 'User Id or password is invalid'], 401);
        }
    }


    public function logout(Request $request)
    {
        $id = $request->id;
        $accessToken = Auth::user()->token();
        //return response()->json(['data' => $accessToken]);
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json([null,'data' => $accessToken], 204);
    }


    public function details(Request $request)
    {
        $id = $request->id;
        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user->id)->get();
        //return $userInfo[0]['photo_id'];
        if(sizeof($userInfo)>0){
            if($userInfo[0]['photo_id']>0){
                $photo = Photo::where('id',$userInfo[0]['photo_id'])->select('path')->get();
                unset($userInfo[0]['photo_id']);
                $userInfo[0]['photo'] = '/images/'.$photo[0]['path'];
            }
            else{
                unset($userInfo[0]['photo_id']);
                $userInfo[0]['photo'] = '/images/avatar.png';
            }
        }
        else{
            $user['photo'] = '/images/avatar.png';

        }

        //return response()->json(['status' => 200,'message' => 'your request has been processed', 'data' =>  $userInfo], $this-> successStatus);
        if ( json_decode($userInfo,true) != null){
            //return $userInfo;
            $userInfo[0]['name'] = $user['name'];
            $userInfo[0]['email'] = $user ['email'];
            $userInfo[0]['mobile'] = $user ['mobile'];
            if($userInfo[0]['area_id']){
                $area = Area::where('id', $userInfo[0]['area_id'])->get();
                $userInfo[0]['area'] = $area[0]['branch'].';'.$area[0]['subordinate'].';'.$area[0]['district'].';'.$area[0]['division'].';'.$area[0]['post_code'].';';
            }
            //return $user['name'];

            return response()->json(['message' => 'your request has been processed', 'data' =>  $userInfo[0]], $this-> successStatus);
        }
        else{
            return response()->json(['message' => 'your request has been processed', 'data' =>  $user], $this-> successStatus);
        }

            //return typeOf($user);
    }

    public function userPublicInfo($id){
        $userInfo = UserInfo::where('user_id', $id)->get();
        $user = User::find($id);

        //return $userInfo[0]['photo_id'];
        if(sizeof($userInfo)>0){
            if($userInfo[0]['photo_id']>0){
                $photo = Photo::where('id',$userInfo[0]['photo_id'])->select('path')->get();
                unset($userInfo[0]['photo_id']);
                $userInfo[0]['photo'] = '/images/'.$photo[0]['path'];
            }
            else{
                unset($userInfo[0]['photo_id']);
                $userInfo[0]['photo'] = '/images/avatar.png';
            }
        }
        else{
            $user['photo'] = '/images/avatar.png';

        }

        //return response()->json(['status' => 200,'message' => 'your request has been processed', 'data' =>  $userInfo], $this-> successStatus);
        if ( json_decode($userInfo,true) != null){
            //return $userInfo;
            $userInfo[0]['name'] = $user['name'];
            $userInfo[0]['email'] = $user ['email'];
            unset($userInfo[0]['address']);

            if($userInfo[0]['area_id']){
                $area = Area::where('id', $userInfo[0]['area_id'])->get();
                $userInfo[0]['area'] = $area[0]['branch'].';'.$area[0]['subordinate'].';'.$area[0]['district'].';'.$area[0]['division'].';'.$area[0]['post_code'].';';
            }
            //return $user['name'];

            return response()->json(['message' => 'your request has been processed', 'data' =>  $userInfo[0]], $this-> successStatus);
        }
        else{
            return response()->json(['message' => 'your request has been processed', 'data' =>  $user], $this-> successStatus);
        }

    }


    public function updateInfo(Request $request){

        //return $request;
/*
        $validator = Validator::make($request->all(), [

            'area_id'           => 'integer',
            'address'           => 'required | string | max:255',
            'map_location_id'   => 'integer',
            'blood_group'       => ' string ',
            'birthday'          => 'date_format:Y-m-d',
            'occupation'        => 'string | max:255',
            'description'       => ' string ',
            'weight'            => 'integer',
            'marital_status'    => 'string ',
            'email'             => 'email | regex:/\S+@\S+\.\S+/  ',
            'mobile'            => 'regex:/(01)[0-9]{9}/ | digits:11 ',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 401,'message' => 'validation error', 'data'=>$validator->errors()], 401);
        }

        /*
         * -------------------------------------------
         * save the image and store in database
         * -------------------------------------------
         */
        $data = $request->all();
        //return $data['photo'];

        $id = Auth::user()->id;
        //return 'user';

       if($request->email != null){
           //return 'ok';

           $idDuplicate = User::where('email',$request->email )->get('id');
           if (json_decode($idDuplicate,true) == null || $idDuplicate[0]['id'] == $id){
               User::where( 'id', $id)->update(array('email' => $request->email));
           }
           else {
               $error['email'] = ['the email has aready taken'];
               return response()->json(['message' => 'validation error', 'data'=>$error], 401);
           }


       }
       if($request->mobile != null){
           /*
            * mobile number varification code will be here
            */
           $idDuplicate = User::where('mobile',$request->mobile )->get('id');
           if (json_decode($idDuplicate,true) == null || $idDuplicate[0]['id'] == $id){
               User::where( 'id', $id)->update(array('mobile' => $request->mobile));
           }
           else {
               $error['mobile'] = ['the mobile has aready taken'];
               return response()->json(['message' => 'validation error', 'data'=>$error], 401);
           }
       }
        //return $photo->id;
        $userInfo = [

            'user_id'         => Auth::user()->id,
            'area_id'         => $data['area_id'],
            'address'         => $data['address'],
            'map_location_id' =>  1, //$mapLocation->id,
            'blood_group'     => $data['blood_group'],
            'birthday'        => $data['birthday'],
            'occupation'      => $data['occupation'],
            'organization'    => $data['organization'],
            'description'     => $data['description'],
            'weight'          => $data['weight'],
            'marital_status'  => $data['marital_status'],
            //'photo_id'        => $photo->id,
            'gender'          => $data['gender'],
            'active_status'   => 1,

        ];
        //return $userInfo;


        $checkUser = UserInfo::where('user_id', $id)->get('user_id');

        if (json_decode($checkUser,true) == null){
            UserInfo::create($userInfo);
        }
        else{
            UserInfo::where( 'user_id', $checkUser[0]['user_id'])->update($userInfo);
        }


        return response()->json(['message' => 'your information has been updated', 'data'=>$userInfo], $this-> successStatus);

    }

    public function photoUpdate(Request $request){
        $data = $request->all();
       return $data;


       foreach ($data as $datae){
           return $datae;
        }



        if($file = $request->photo) {
            //return $file;
            $name = time() . $file->getClientOriginalName();
            //return $name;
            $file->move('images', $name);

            $photo = Photo::create([
                'path' => $name,
                'imageable_id' => Auth::user()->id,
                'imageable_type'=> 'App/User'
            ]);
            //return $photo->id;

        }
        else
        {
            return 'not ok';
        }

        $id = Auth::user()->id;
/*
        $userInfo = [
            'user_id'         => Auth::user()->id,
            'photo_id'        => $photo->id,
        ];

        $checkUser = UserInfo::where('user_id', $id)->get('user_id');

        if (json_decode($checkUser,true) == null){
            UserInfo::create($userInfo);
        }
        else{
            UserInfo::where( 'user_id', $checkUser[0]['user_id'])->update($userInfo);
        }
        return response()->json(['message' => 'your information has been updated', 'data'=>$userInfo], $this-> successStatus);

*/
    }


}
