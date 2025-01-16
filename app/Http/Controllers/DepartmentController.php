<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('Manage Department')) {
        //     $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->with('branch')->get();

        //     return view('department.index', compact('departments'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        if (\Auth::user()->can('Create Department')) {
            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('department.create', compact('branch'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        // if (\Auth::user()->can('Create Department')) {

        //     $validator = \Validator::make(
        //         $request->all(),
        //         [
        //             'branch_id' => 'required',
        //             'name' => 'required|max:20',
        //         ]
        //     );
        //     if ($validator->fails()) {
        //         $messages = $validator->getMessageBag();

        //         return redirect()->back()->with('error', $messages->first());
        //     }

        //     $department             = new Department();
        //     $department->branch_id  = $request->branch_id;
        //     $department->name       = $request->name;
        //     $department->created_by = \Auth::user()->creatorId();
        //     $department->save();

        $validator = Validator::make($request->all(), [
            'department_name' => 'required|string|max:255',
            'short_name'      => 'required|string|max:100',
            'hod'             => 'nullable', // Assuming HOD references a user ID
            'client_id'       => 'required|exists:clients,id',
            'project_id'      => 'nullable',
            'is_active'       => 'nullable|boolean',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        
        // Retrieve validated data
        $validatedData = $validator->validated();
        
        // dd($validatedData);
    
        // Storing data directly using the `create` method
        Department::create([
            'department_name' => $validatedData['department_name'],
            'short_name'      => $validatedData['short_name'],
            'hod'             => $validatedData['hod'] ?? null, // Nullable field
            'client_id'       => $validatedData['client_id'],
            'project_id'      => $validatedData['project_id'] ?? null, // Nullable field
            'is_active'       => $request->input('is_active', 0) // Checkbox handling
        ]);
    
        
            return redirect()->route('department.index')->with('success', __('Department  successfully created.'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }

    public function show(Department $department)
    {
        return redirect()->route('department.index');
    }

    public function edit($id)
    {
        // dd($id);
        // $department = Department::find($id);

        $department = Department::findOrFail($id); // Fetch the department by ID
        $clients = Client::all(); // Fetch all clients for the dropdown
        $projects = Project::all(); // Fetch all projects for the dropdown
    
        return view('department.edit', compact('department', 'clients', 'projects'));
        // return view('department.edit' , compact('department'));
        // if (\Auth::user()->can('Edit Department')) {
        //     if ($department->created_by == \Auth::user()->creatorId()) {
        //         $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        //         return view('department.edit', compact('department', 'branch'));
        //     } else {
        //         return response()->json(['error' => __('Permission denied.')], 401);
        //     }
        // } else {
        //     return response()->json(['error' => __('Permission denied.')], 401);
        // }


    }

    public function update(Request $request,  $id)
    {
        // if (\Auth::user()->can('Edit Department')) {
        //     if ($department->created_by == \Auth::user()->creatorId()) {
        //         $validator = \Validator::make(
        //             $request->all(),
        //             [
        //                 'branch_id' => 'required',
        //                 'name' => 'required|max:20',
        //             ]
        //         );
        //         if ($validator->fails()) {
        //             $messages = $validator->getMessageBag();

        //             return redirect()->back()->with('error', $messages->first());
        //         }

        //         $department->branch_id = $request->branch_id;
        //         $department->name      = $request->name;
        //         $department->save();

        //         return redirect()->route('department.index')->with('success', __('Department successfully updated.'));
        //     } else {
        //         return redirect()->back()->with('error', __('Permission denied.'));
        //     }
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $validator = Validator::make($request->all(), [
            'department_name' => 'required|string|max:255',
            'short_name'      => 'required|string|max:100',
            'hod'             => 'nullable', // Assuming HOD references a user ID
            'client_id'       => 'required|exists:clients,id',
            'project_id'      => 'nullable',
            'is_active'       => 'nullable|boolean',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        
        // Retrieve validated data
        $validatedData = $validator->validated();
        
        $department=Department::findOrFail($id);
        $department->update([
            'department_name' => $validatedData['department_name'],
            'short_name'      => $validatedData['short_name'],
            'hod'             => $validatedData['hod'] ?? null, // Nullable field
            'client_id'       => $validatedData['client_id'],
            'project_id'      => $validatedData['project_id'] ?? null, // Nullable field
            'is_active'       => $request->input('is_active', 0) // Checkbox handling
        ]);
        return redirect()->route('department.index')->with('success', 'Department updated successfully.');

    }

    public function destroy(Department $department)
    {
        // if (\Auth::user()->can('Delete Department')) {
        //     if ($department->created_by == \Auth::user()->creatorId()) {
        //         $employee     = Employee::where('department_id', $department->id)->get();
        //         if (count($employee) == 0) {
        //             Designation::where('department_id', $department->id)->delete();
        //             $department->delete();
        //         } else {
        //             return redirect()->route('department.index')->with('error', __('This department has employees. Please remove the employee from this department.'));
        //         }

        //         return redirect()->route('department.index')->with('success', __('Department successfully deleted.'));
        //     } else {
        //         return redirect()->back()->with('error', __('Permission denied.'));
        //     }
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        // dd($department);

        $department->delete();
        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}
