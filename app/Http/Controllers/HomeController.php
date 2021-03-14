<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\HomeCollection;
use App\Models\User;
use DB;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class HomeController extends Controller
{
    public function index()
    {
      $students = DB::select('select `students`.`id` ,`students`.`username`, `students`.`password`, `students`.`fullName`, `students`.`sex`, `students`.`address`, `students`.`phone`, `students`.`mail`, `branchs`.`name` AS `branchName`, `facultys`.`name`AS `facultyName`, `course`.`K`, `scores`.`numberScores`, `students`.`studentScore` ,  `course`.`starYear` from `class`,`students`, `branchs`, `facultys`, `scores`, `course` WHERE `students`.`classId`= `class`.`id` AND `class`.`branchId`= `branchs`.`id` AND `branchs`.`id`= `facultys`.`branchID` AND `scores`.`branchId`= `branchs`.`id`AND `course`.`id` = `students`.`courseID` AND `course`.`id` = `scores`.`courseID`');
      return  $students;
    }
    public function delete($id)
    {
      $user = User::find($id);

      $user->delete();

      return response()->json('successfully deleted');
    }
    public function detail($id)
    {
      $students = DB::select('select `students`.`id`,`students`.`indentity`,`students`.`avatar`,`class`.`name` ,`students`.`nation`,`students`.`religion`, DATE_FORMAT(`students`.`birthDay`, "%d-%m-%Y") AS birthDay, `students`.`username`, `students`.`password`, `students`.`fullName`, `students`.`sex`, `students`.`address`, `students`.`phone`, `students`.`mail`, `branchs`.`name` AS `branchName`, `branchs`.`years` , `facultys`.`name`AS `facultyName`, `course`.`K`,`course`.`starYear`, `scores`.`numberScores`, `students`.`studentScore` ,  `course`.`starYear` from `class` , `students`, `branchs`, `facultys`, `scores`, `course` WHERE `students`.`id` = ? AND `students`.`classId`= `class`.`id` AND `class`.`branchId` = `branchs`.`id` AND `branchs`.`id`= `facultys`.`branchID` AND `scores`.`branchId`= `branchs`.`id`AND `course`.`id` = `students`.`courseID` AND `course`.`id` = `scores`.`courseID`',[$id]);
      return $students;
    }
    public function store(Request $request)
    {
      $user = new User([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'type'     => $request->type,
      ]);

      $user->save();

      return response()->json('successfully added');
    }
    public function login(Request $request){
      $arr = $request->only('username', 'password');
      // return response()->json(!$token = JWTAuth::attempt($arr));

      try {
        if (!$token = JWTAuth::attempt($arr)) {
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Username or Password',
            ], 202);
        }else{
          return $this->respondWithToken($token); 
        }
      }catch (JWTException $e) {
          return response()->json(['msg' => 'could_not_create_token'], 203);
      }

  }
  public function checklogin(Request $request)
  {
      return view('admin/index');
  }
  public function logout()
  {
    if(auth('api')->check()){
      auth('api')->logout();
    }
    
    return response()->json(['message' => 'Successfully logged out']);
  
  }
  protected function respondWithToken($token)
  {
      return response()->json([
          'access_token' => $token,
          'msg' => 'Login Success',
          'user' => $this->guard(),
          'token_type' => 'bearer',
          'expires_in' => auth('api')->factory()->getTTL() * 60
      ]);
  }
  public function guard()
  {
      return Auth::Guard('api')->user();
  }
}
