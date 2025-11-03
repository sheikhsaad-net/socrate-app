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
        if ($request->image) {
            $imageData = base64_decode($request->image);
            $fileName = 'user_' . $user->id . '_' . time() . '.jpg';
            $filePath = storage_path('app/public/user_images/' . $fileName);

            if (!file_exists(dirname($filePath))) {
                mkdir(dirname($filePath), 0755, true);
            }

            file_put_contents($filePath, $imageData);
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

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => [
                'id' => $user->id,
                'email' => $user->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'age' => $request->age,
                'userId' => $request->userId,
                'image' => $imagePath ? asset('storage/' . $imagePath) : null,
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Attempt login with "remember me"
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, true)) {
            // $request->session()->regenerate();   // Prevent session fixation

            return response()->json([
                'message' => 'Login successful.',
                'user_id' => Auth::id(),
            ]);
        }

        return response()->json(['errors' => ['email' => ['Invalid credentials.']]], 401);
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
