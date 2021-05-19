<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\HomeCollection;
use App\Models\User;
use DB;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
      $students = DB::select('select `students`.`id` ,`students`.`username`, `students`.`password`, `students`.`fullName`, `students`.`sex`, `students`.`address`, `students`.`phone`, `students`.`mail`, `branchs`.`name` AS `branchName`, `facultys`.`name`AS `facultyName`, `course`.`K`, `scores`.`numberScores`, `students`.`studentScore` ,  `course`.`starYear` from `class`,`students`, `branchs`, `facultys`, `scores`, `course` WHERE `students`.`classId`= `class`.`id` AND `class`.`branchId`= `branchs`.`id` AND `branchs`.`facultyId`= `facultys`.`id` AND `scores`.`branchId`= `branchs`.`id`AND `course`.`id` = `students`.`courseID` AND `course`.`id` = `scores`.`courseID`');
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
      $students = DB::select('select `students`.`id`,`students`.`indentity`,`students`.`avatar`,`class`.`name` ,`students`.`nation`,`students`.`religion`, DATE_FORMAT(`students`.`birthDay`, "%d-%m-%Y") AS birthDay, `students`.`username`, `students`.`password`, `students`.`fullName`, `students`.`sex`, `students`.`address`, `students`.`phone`, `students`.`mail`, `branchs`.`name` AS `branchName`, `branchs`.`years` , `facultys`.`name`AS `facultyName`, `course`.`K`,`course`.`starYear`, `scores`.`numberScores`, `students`.`studentScore` ,  `course`.`starYear` from `class` , `students`, `branchs`, `facultys`, `scores`, `course` WHERE `students`.`id` = ? AND `students`.`classId`= `class`.`id` AND `class`.`branchId` = `branchs`.`id` AND `branchs`.`facultyId`= `facultys`.`id` AND `scores`.`branchId`= `branchs`.`id`AND `course`.`id` = `students`.`courseID` AND `course`.`id` = `scores`.`courseID`',[$id]);
      return $students;
    }
    public function store(Request $request)
    {
      $user = new User([
        'username' => $request->username,
        'password' => bcrypt($request->password),
      ]);

      $user->save();

      return response()->json('successfully added');
    }
    public function ChartLine(Request $request)
    {
      $line = DB::select('SELECT ROUND(AVG(`scores`.`numberScores`) ,2) AS scores ,  `course`.`K` FROM  `scores`, `course` WHERE `scores`.`courseID` = `course`.`id` GROUP BY `scores`.`courseID` ORDER BY  `course`.`K` ');
      return response()->json($line);
    }
    public function ChartBar(Request $request)
    {
      $bar = DB::select('SELECT `students`.`studentScore`,  `students`.`username`, `students`.`fullName`, `course`.`K` FROM `students`, `course` WHERE `students`.`courseID` = `course`.`id` AND `course`.`K` = ( SELECT  MAX(`course`.`K`) as max FROM `course` ) LIMIT 5');
      return response()->json($bar);

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
  public function upload(Request $request)
  {
      $name   = $request->fullname;
      $k      = $request->k;
      $mssv   = $request->mssv;
      $sex    = $request->sex;
      $addess = $request->addess;
      $mail   = $request->mail;
      $diem   = $request->diem;
      $pass   = $request->password;
      $phone  = $request->phone;
      $bown   = $request->bown;
      $lop    = $request->lop;
      $image = $request->file('file');
      $hash   = bcrypt($request->password);

      if(isset($image))
      {
          $path = public_path('admin/lte/images/');
          $nameimg = Str::Random(5).'_'.$image->getClientOriginalName(); 
          $image->move($path,$nameimg);
          $storefile = "/admin/lte/images/".$nameimg;

      };
     $data = DB::select('INSERT INTO `students`( `username`, `password`, `passwordUnEncrypt`, `fullName`, `sex`, `address`, `phone`, `mail`, `classId`, `studentScore`, `courseID`, `avatar`, `birthDay`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)',[$mssv,$hash,$pass,$name,$sex,$addess,$phone,$mail,$lop ,$diem,$k, $storefile, $bown]);
      return response()->json($data);

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
