<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @var UserInterface
     *
     */
    protected $userRepo;

    /**
     * LoginController constructor.
     * @param UserInterface $userRepository
     */
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }


    /**
     * user log in.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $user = $this->userRepo->getByEmail($request->email);

            if ($user) {
                if (!auth()->attempt($request->all())) {
                    return response()->json([
                        'success' => 0,
                        'message' => 'Invalid username or password',
                    ]);
                } else {
                    $accessToken = $user->createToken('access_token')->accessToken;

                    return response()->json([
                        'success'      => 1,
                        'user'         => $user,
                        'access_token' => $accessToken->token,
                        'message'      => 'Login Successful'
                    ]);
                }
            } else {
                return response()->json([
                    'success'   => 0,
                    'message'   => 'Sorry, this user does not exist'
                ]);
            }
        } catch (Exception $exception) {
            dd($exception);
            return response()->json([
                'success'   => 0,
                'error'     => 'Something went wrong!',
                'message'   => $exception->getMessage()
            ]);
        }
    }

    /**
     * User log out.
     *
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @return JsonResponse
     */
    public function logout()
    {
        try {
            $authUser = auth()->user();

            if (!$authUser) {
                return response()->json([
                    'success' => 0,
                    'error'   => 'You are already logged out!'
                ]);
            }

            $authUser->oAuthAccessToken()->delete();
            \session()->flush();

            return response()->json([
                'success' => 1,
                'message' => 'Logged Out!'
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => 0,
                'error'   => $exception->getMessage()
            ]);
        }
    }
}
