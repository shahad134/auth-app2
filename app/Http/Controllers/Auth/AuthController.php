<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{ public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required| string',
            
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $rot='';
        if ( auth()->user()->is_admin !=0){
            $rot='/admin';
        }else {
            $rot='/home';
        }
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer', 
           'is_admin'=>$rot,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = 1;
        $user->save();
        return response()->json([
            'message' => 'تم إنشاء المستخدم بنجاح'
        ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        // ]);
        // $id = $request->user()->id;
        // $user_email = DB::table('users')
        //             ->where('id', $id)
        //             ->update(['email' => $request->email]);
        return response()->json($request->user());
    }
}
