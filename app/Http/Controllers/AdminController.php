<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\category;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::join('statuses', 'applications.status_id', '=', 'statuses.id')->join('categories', 'applications.category_id', '=', 'categories.id')->select('applications.*', 'statuses.name as status_name', 'categories.name as category_name')->get()->sortBy('status_id');
        
        // filter by statuses

        $status = request()->status;

        if ($status) {
            $applications = Application::where('status_id', $status)->get();
        }

        $statuses = Status::all();

        $categories = Category::all();

        return view('admin.index', compact('applications', 'statuses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        
        category::create($validated);

        return redirect()->route('dashboard.index');
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
    public function edit(Request $request, $id)
    {
        $status_id = request()->status_id;

        $application = Application::find($id);
        // get the status name
        $status = Status::find($application->status_id);
        $application->status_name = $status->name;
        $statuses = Status::all();
        $categories = category::all();

        return view('admin.show', compact('application', 'categories', 'statuses'));
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
        // dd($request->all());
        $validated = $request->validate([
            // 'status_id' => 'required',
            // 'category_id' => 'required',
            // 'title' => 'required',
            // 'description' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'reason' => 'nullable',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $new_name = '/img/' . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $new_name);
            $validated['image_after'] = $new_name;
        }

        if ($request->reason) {
            $validated['reason'] = $request->reason;
        }

        $validated['title'] = $request->title;
        $validated['description'] = $request->description;
        $validated['status_id'] = $request->status;
        $validated['category_id'] = $request->category;

        Application::whereId($id)->update($validated);

        return redirect('admin')->with('success', 'Application updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = category::find($id);
        $categories->delete();

        // delete the category from the applications table

        Application::where('category_id', $id)->delete();

        return redirect()->route('dashboard.index');
    }
}
