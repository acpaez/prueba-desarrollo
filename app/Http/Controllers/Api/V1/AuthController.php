<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @class BuyerController
 * @author ANGIE CELESTE PAEZ MONTEJO
 */

class AuthController extends Controller
{
    /**
     * @method login
     * method responsible for authenticating system users and validating credentials
     * @param email email of the person to authenticate
     * @param password password  of the person to authenticate
     * @return response formatted with authentication token
     */

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @method logout
     * method in charge of user logout
     * @return json response success message
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

     /**
     * @method logout
     * method in charge of formatting the system authentication
     * @return json response with authentication token authentication type and duration time
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
