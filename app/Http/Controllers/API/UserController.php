<?php
namespace App\Http\Controllers\API;
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
        return $id;
        $user = Auth::user();
        $userInfo = UserInfo::where('user_id', $user->id)->get();
        //return response()->json(['status' => 200,'message' => 'your request has been processed', 'data' =>  $userInfo], $this-> successStatus);

        if ( json_decode($userInfo,true) != null){
            //return $userInfo;
            $userInfo[0]['name'] = $user['name'];
            $userInfo[0]['email'] = $user ['email'];
            $userInfo[0]['mobile'] = $user ['mobile'];
            //return $user['name'];

            return response()->json(['status' => 200,'message' => 'your request has been processed', 'data' =>  $userInfo], $this-> successStatus);
        }
        else{
            return response()->json(['status' => 200,'message' => 'your request has been processed', 'data' =>  $user], $this-> successStatus);
        }

            //return typeOf($user);
    }


    public function updateInfo(Request $request){

        //return $request->image;

        $validator = Validator::make($request->all(), [

            'area_id'           => 'integer',
            'address'           => 'required | string | max:255',
            'map_location_id'   => 'integer',
            'blood_group'       => ' string ',
            'birthday'          => 'date_format:Y-m-d',
            'occupation'        => 'string | max:255',
            'description'       => ' string ',
            'weight'            => 'integer',
            'marital_status'    => 'boolean ',
            'email'             => 'email | regex:/\S+@\S+\.\S+/  ',
            'mobile'            => 'regex:/(01)[0-9]{9}/ | digits:11 ',


            //'latitude'          => 'regex: /^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)/',
            //'longitude'         => 'regex: /^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)/',


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
        //return $data;


        /* unblock photo save after test*/
        if($file = $request->image) {
            //return $file;
            $name = time() . $file->getClientOriginalName();
            //return $name;
            $file->move('images', $name);

            $photo = Photo::create([
                'path' => $name,
                'imageable_id' => Auth::user()->id,
                'imageable_type'=> 'App/User'
            ]);

        }



        /*
         * -------------------------------------------
         * save the maplocation and store in database
         * -------------------------------------------
         */
       /*
        $mapLocation = MapLocation::create([
            'latitude'    => $data['latitude'],
            'longitude'   => $data['longitude'],
        ]);
       */
        $id = Auth::user()->id;

//return $request->email;
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

        $userInfo = [

            'user_id'         => Auth::user()->id,
            'area_id'         => $data['area_id'],
            'address'         => $data['address'],
            'map_location_id' =>  1, //$mapLocation->id,
            'blood_group'     => $data['blood_group'],
            'birthday'        => $data['birthday'],
            'occupation'      => $data['occupation'],
            'description'     => $data['description'],
            'weight'          => $data['weight'],
            'marital_status'  => $data['marital_status'],
            'photo_id'        => $photo->id,
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


        return response()->json(['status' => 200,'message' => 'your information has been updated', 'data'=>$userInfo], $this-> successStatus);

    }


}
