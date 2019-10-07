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
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['status' => 200,'message' => 'you are logged in', 'data' => $success], $this-> successStatus);
        }
        elseif (Auth::attempt(['mobile' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['status' => 200,'message' => 'you are logged in', 'data' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['status' => 401,'message' => 'User Id or password is invalid'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */





    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required | string | max:255',
            'email'      => 'required | email | regex:/\S+@\S+\.\S+/ | unique:users',
            'mobile'     => 'required | regex:/(01)[0-9]{9}/ | digits:11 | unique:users',
            'password'   => 'required | string | min:8 ',
            'c_password' => 'required | same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 401,'message' => 'validation error', 'data'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;

        return response()->json(['status' => 200,'message' => 'you are logged in', 'data'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */




    public function details()
    {
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



    public function logout()
    {
        $accessToken = Auth::user()->token();
        //return response()->json(['data' => $accessToken]);
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(null,$accessToken, 204);
    }



    public function updateInfo(Request $request){


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
        $id = Auth::user()->id;

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
