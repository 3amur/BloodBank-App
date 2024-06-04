<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function registerToken(Request $request, Token $token){
        $validated = validator()->make($request->all(), [
            'token' => 'required',
            'type' => 'required|in:android,ios',
        ]);
        if($validated->fails()){
            $errors = $validated->errors()->first();
            return responseJson(0, $errors);
        }
        // Delete anty Token
        $token->where('token', $request->token)->delete();
        $token =$request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح', $token);
    }

    public function removeToken(Request $request, Token $token){
        $validated = validator()->make($request->all(), [
            'token' => 'required',
        ]);
        if($validated->fails()){
            $errors = $validated->errors()->first();
            return responseJson(0, $errors);
        }
        // Delete Only This Token
        $token->where('token', $request->token)->delete();
        return responseJson(1, 'تم الحذف بنجاح');
    }
}
