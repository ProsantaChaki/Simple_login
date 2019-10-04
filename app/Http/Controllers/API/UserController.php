<?php
namespace App\Http\Controllers\API;
use App\Photo;
use App\UserInfo;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
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
            return response()->json(['success' => $success], $this-> successStatus);
        }
        elseif (Auth::attempt(['mobile' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
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
            'name'     => 'required | string | max:255',
            'email'    => 'required | email | regex:/\S+@\S+\.\S+/ | unique:users',
            'mobile'   => 'required | regex:/(01)[0-9]{9}/ | digits:11 | unique:users',
            'password' => 'required | string | min:8 ',
            'c_password' => 'required | same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;

        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */




    public function details()
    {
        $user = Auth::user();
        $userinfo = UserInfo::all()->where('user_id', $user->id);
        $userinfo[0]['name'] = $user['name'];
        $userinfo[0]['email'] = $user ['email'];
        $userinfo[0]['mobile'] = $user ['mobile'];

            //return typeOf($user);
        return response()->json(['success' =>  $userinfo], $this-> successStatus);
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

            'area_id' => 'integer',
            'address' => 'required | string | max:255',
            'map_location_id' => 'integer',
            'blood_group' => ' string ',
            'birthday' => 'date_format:Y-m-d',
            'occupation' => 'string | max:255',
            'description' => ' string ',
            'weight' => 'integer',
            'marital_status' => 'boolean',

        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        /*
         * -------------------------------------------
         * save the image and store in database
         * -------------------------------------------
         */
        $data = $request->all();
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

        //return response()->json([$data['gender']]);

        $userinfo = UserInfo::create([

            'user_id'         => Auth::user()->id,
            'area_id'         => $data['area_id'],
            'address'         => $data['address'],
            'map_location_id' => $data['map_location_id'],
            'blood_group'     => $data['blood_group'],
            'birthday'        => $data['birthday'],
            'occupation'      => $data['occupation'],
            'description'     => $data['description'],
            'weight'          => $data['weight'],
            'marital_status'  => $data['marital_status'],
            'photo_id'        => $photo->id,
            'gender'          => $data['gender'],
            'active_status'   => 1,

        ]);
        //return response()->json([$photo->id, Auth::user()->id]);

        return response()->json(['success'=>$userinfo], $this-> successStatus);

    }
}