<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
        return view('users', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

	/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('users.edit', compact('user'));
	}
	public function create()
    {
        return view('users.create');
    }
	
	public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'librarian';
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return redirect()->route('user.index')->with('success', 'User deleted successfully.');
	}

}
