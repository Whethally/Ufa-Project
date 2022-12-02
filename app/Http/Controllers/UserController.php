<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $applications = Application::where('user_id', '=', $user->id)->join('statuses', 'applications.status_id', '=', 'statuses.id')->join('categories', 'applications.category_id', '=', 'categories.id')->select('applications.*', 'statuses.name as status_name', 'categories.name as category_name')->get()->sortByDesc('created_at');
        
        // filter by statuses

        $status = request()->status;

        if ($status) {
            $applications = Application::where('status_id', $status)->where('user_id', '=', $user->id)->get();
        }

        $statuses = Status::all();

        return view('user.index', compact('user', 'applications', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $categories = category::all();

        return view('user.create', compact('statuses', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store post in database with image upload

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
        $new_name = '/img/' . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img'), $new_name);
        $validated['image_before'] = $new_name;
        $validated['image_after'] = $new_name;
        } else {
            return redirect()->back()->withInput()->withErrors(['image' => 'Изображение не выбрано']);
        }

        $validated['user_id'] = Auth::id();
        $validated['status_id'] = 1;
        $validated['category_id'] = $request->category;

        Application::create($validated);

        return redirect()->route('profile.index')->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applications = Application::find($id);
        $applications->delete();
        
        return redirect()->route('profile.index');
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
