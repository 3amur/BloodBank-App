<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\BloodType;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request, Client $client)
    {
        $validated = validator()->make($request->all(),[
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|confirmed|string|max:25',
            'phone' => 'required|unique:clients,phone|string',
            'd_o_b' => 'required|date|before:today',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|integer',
            'last_donation_date' => 'required|before_or_equal:today',
        ]);
        // check Validation Errors
        if ($validated->fails()) {
            return responseJson(0, $validated->errors()->first(), $validated->errors());
        }
        // Register Client in DB
        $client = Client::create($request->all());
        // Create Token For Client
        $token = $client->createToken('Api_Token')->plainTextToken;

        return responseJson(1, 'تم التسجيل بنجاح',[
            'api_token' => $token,
            'client' => $client,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:clients|max:20',
            'password' => 'required|string|max:30',
        ]);
        $phone = $request->phone;
        $password = $request->password;

        $client = Client::where('phone', $phone)->first();
        if ($client && Hash::check($password, $client->password)) {
            $device_name = $request->input('device_name', $request->userAgent());
            $token = $client->createtoken($device_name);
            return responseJson(1, 'success', [
                'token' => $token->plainTextToken,
                'client' => $client
            ]);
        }
        return response()->json(['error' => 'Client Not Found'], 404);
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $validated = validator()->make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validated->fails()) {
            $data = $validated->errors()->first();
            return response()->json([
                'data' => $data,
            ]);
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            // Generate the Pin Code
            $code = rand(1111, 9999);
            $update = $client->update(['bin_code' => $code]);
            if ($update) {
                //Send Email Code
                Mail::to($client->email)
                    ->bcc("OmarMuhammed@gmail.com")
                    ->send(new ResetPassword($client));

                return response()->json([
                    'msg' => 'برجاء فحص رسائل الجميل الخاص بك',
                    'pin_code_test' => $code
                ], 200);
            } else {
                return response()->json(['error' => 'حدث خطا حاول مره اخري']);
            }
        }
        return response()->json(['error' => 'لا يوجد حساب مرتبط بهذا الهاتف'], 404);
    }

    // New Password
    public function newPassword(Request $request)
    {
        $validated = validator()->make($request->all(), [
            'bin_code' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validated->fails()) {
            $errors = $validated->errors()->first();
            return response()->json(['errors' => $errors]);
        }

        $client = Client::where('bin_code', $request->bin_code)->where('bin_code', '!=', 0)->first();
        if ($client) {
            $client->password = Hash::make($request->password);
            $client->bin_code = null;
            if ($client->save()) {
                return response()->json(['success' => "تم تغيير كلمه المرور بنجاح"], 201);
            }
            return response()->json(['error' => 'حدث خطا حاول مره اخري']);
        }
        return response()->json(['error' => ' هذا الكود غير صالح '], 404);
    }
    // Profile 
    public function Profile(Request $request, Client $client)
    {
        $validated = validator()->make($request->all(), [
            'password'  => 'confirmed',
            'email'     =>  [
                'email',
                Rule::unique('clients')->ignore($request->user()->id)
            ],
            'phone'     =>  [
                'string',
                Rule::unique('clients')->ignore($request->user()->id),
            ],
        ]);
        // Check Errors
        if ($validated->fails()) {
            $errors = $validated->errors()->first();
            return responseJson(0, $errors);
        }
        $client = $request->user();
        if($request->password){
            $request->merge(['password' => $request->password]);
        }
        $client->update($request->all());
        if($request->password){
            $client->password = bcrypt($request->password);
            $client->save();
        }
        if ($client->save()) {
            return responseJson(1, 'تم تحديث البيانات بنجاح', $client);
        }
        return responseJson(0, 'حدث خطا حاول مره اخري');
    }
}
