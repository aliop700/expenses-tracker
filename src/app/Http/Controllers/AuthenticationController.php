<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Domain\Currency\Actions\GetAllCurrenciesAction;
use Domain\User\Actions\CreateUserAction;
use Domain\User\Actions\AuthenticateUserAction;
use Domain\User\Actions\GetUserRedirect;
use Domain\User\Actions\UserLogoutAction;
use Domain\User\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use Domain\User\DTOs\UserDTO;

class AuthenticationController extends Controller
{
    public function index(Request $request)
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $email    = $request->email;
        $password = $request->password;

        $user = User::verify($email, $password)->first();

        if(empty($user))
        {
            return view('login',[
                'notFound' =>  'email or password is incorrect'
            ]);
        }

        (new AuthenticateUserAction)($user);
        
        $redirect = (new GetUserRedirect)($user);

        return redirect($redirect);
        
    }

    public function register(Request $request)
    {

        $currencies = (new GetAllCurrenciesAction)();
        return view('users.register',compact('currencies'));
    }

    public function storeUser(StoreUserRequest $request)
    {
        
        $validated = $request->all();

        $userDTO = UserDTO::fromArray($validated);
        
        $newUser = (new CreateUserAction)($userDTO);

        (new AuthenticateUserAction)($newUser);

        return redirect(route('user.index'));
    }

    public function logout(Request $request)
    {

        (new UserLogoutAction)();

        return redirect('/');
    }
}
