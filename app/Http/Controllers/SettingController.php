<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
   
    public function registerApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'userId' => 'required|string|unique:settings,external_user_id',
            'image' => 'nullable|string', // Base64 string
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Handle Base64 image conversion
    $imagePath = null;

    if (!empty($request->image)) {
        // Remove base64 prefix if present
        $base64Image = preg_replace('/^data:image\/\w+;base64,/', '', $request->image);
        $base64Image = str_replace(' ', '+', $base64Image);

        $imageData = base64_decode($base64Image);
        if ($imageData === false) {
            return response()->json(['error' => 'Invalid image data'], 400);
        }

        // Ensure directory exists in storage
        $directory = storage_path('app/public/user_images');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // Save image
        $fileName = 'user_' . $user->id . '_' . time() . '.jpg';
        $filePath = $directory . '/' . $fileName;
        file_put_contents($filePath, $imageData);

        // Path relative to public/storage
        $imagePath = 'user_images/' . $fileName;
    }


        // Create related setting
        Setting::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'external_user_id' => $request->userId,
            'image' => $imagePath,
        ]);

        // Response
        return response()->json([
            'message' => 'User registered successfully.',
        ], 201);
    }

    public function loginApp(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'remember' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid email or password.'], 401);
        }

        // Optional restriction: only users with current token that can "create" may log in again
        if ($request->user() && !$request->user()->tokenCan('create')) {
            return response()->json(['error' => 'Token not authorized for login.'], 403);
        }

        $remember = $request->boolean('remember', false);
        // $expiresAt = $remember ? now()->addDays(60) : now()->addHours(1);

        // Token abilities — allow only create and read for login
        $abilities = ['read', 'delete'];

        $token = $user->createToken('AppLogin', $abilities)->plainTextToken;

        return response()->json([
            'message' => 'Login successful.',
            'token' => $token,
            'remember_me' => $remember,
        ], 200);
    }

    public function userApp(Request $request)
    {
        // Check if user is authenticated
        $user = $request->user();
        $token = $user?->currentAccessToken();

        // Fetch related setting
        $setting = Setting::where('user_id', $user->id)->first();

        // Build data response
        $data = [
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $setting->first_name ?? null,
            'last_name' => $setting->last_name ?? null,
            'gender' => $setting->gender ?? null,
            'age' => $setting->age ?? null,
            'userId' => $setting->external_user_id ?? null,
            'image' => $setting && $setting->image ? asset('storage/' . $setting->image) : null,
        ];

        return response()->json([
            'token_status' => 'active',
            'user' => $data,
        ], 200);
    }

    public function logoutApp(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['error' => 'Not authenticated.'], 401);
        }

        // Optional: restrict by ability
        if (!$user->tokenCan('delete')) {
            return response()->json(['error' => 'Token not authorized for logout.'], 403);
        }

        // Delete current token
        $user->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful.'], 200);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
