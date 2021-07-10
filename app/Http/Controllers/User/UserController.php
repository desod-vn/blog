<?php

namespace App\Http\Controllers\User;

use App\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\User\AvatarRequest;


class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user', ['except' => ['show']]);
    }

    public function index(Request $request)
    {
        $users = User::query()->latest();

        if($request->has('search'))
        {
            $users->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $users->paginate(Status::USER_PER_PAGE);

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $users,
        ]);
    }

    public function avatar(AvatarRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $image = substr($user->avatar, strlen(Status::APP));

        if($request->has('image'))
        {
            Storage::delete($image);
            $image = $request->file('image')->store(Status::USER_IMAGE);
            $user->avatar = Status::APP . $image;
        }
        
        $user->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function password(PasswordRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Password was changed.',
        ]);
    }

    public function show(User $user)
    {
        $user->posts;

        foreach($user->comments as $comment)
            $comment->post;

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->fullname = $request->fullname;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->story = $request->story;

        $user->save();

        return response()->json([
            'status' => Status::SUCCESS,
            'data' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'The user was banned.',
        ]);
    }
}
