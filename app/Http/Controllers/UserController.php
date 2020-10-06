<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\User;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers(Request $request)
    {   
        // $order = $request->input('order');
        // $input = $request->all();
        // echo "<pre>";
        // print_r($input);
        // echo "</pre>";

        $pagination = $request->input('pagination');
        $paginationObject = json_decode($pagination);
        $pageSize = $paginationObject->pageSize;

        $users = User::orderBy('id', 'desc');
        

        if($request->input('sortOrder') == 'ascend') {
            $users = User::orderBy($request->input('sortField'), 'asc');
        }
        
        if($request->input('sortOrder') == 'decend') {
            $users = User::orderBy($request->input('sortField'), 'desc');
        }

        if(!empty($pagination)) {
            $users = $users->paginate($paginationObject->pageSize);
        } else {
            $users = $users->paginate(5);
        }



        // if paginate then
        // User::orderByDesc('id')->paginate(1)
        //  return response()->json(['users' =>  User::all()], 200);
         return response()->json(['users' => $users], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

}