<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function index()
    {

        // if (\Auth::user()->can('Manage Designation')) {
        //     $designations = Designation::where('created_by', '=', \Auth::user()->creatorId())->with('department')->get();

        //     return view('designation.index', compact('designations'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }

        // $designations = Designation::where('created_by', '=', \Auth::user()->creatorId())->with('department')->get();
        $designations = Designation::all();

        return view('designation.index', compact('designations'));
    }

    public function create()
    {
        // if (\Auth::user()->can('Create Designation')) {
        //     $branchs     = Branch::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //     $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        //     return view('designation.create', compact('branchs', 'departments'));
        // } else {
        //     return response()->json(['error' => __('Permission denied.')], 401);
        // }
        $projects=Project::all();
        $clients=Client::all();
        return view('designation.create', compact('projects', 'clients'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // if (\Auth::user()->can('Create Designation')) {
        //     $validator = \Validator::make(
        //         $request->all(),
        //         [
        //             'branch_id' => 'required',
        //             'department_id' => 'required',
        //             'name' => 'required|max:20',
        //         ]
        //     );
        //     if ($validator->fails()) {
        //         $messages = $validator->getMessageBag();

        //         return redirect()->back()->with('error', $messages->first());
        //     }

        //     try {
        //         $branch = Department::where('id', $request->department_id)->where('created_by', '=', Auth::user()->creatorId())->first()->branch->id;
        //     } catch (Exception $e) {
        //         $branch = null;
        //     }

        //     $designation                = new Designation();
        //     $designation->branch_id     = $branch;
        //     $designation->department_id = $request->department_id;
        //     $designation->name          = $request->name;
        //     $designation->created_by    = \Auth::user()->creatorId();

        //     $designation->save();

        //     return redirect()->route('designation.index')->with('success', __('Designation  successfully created.'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        // dd($request->all());
         // Validate the form input
         $validator = Validator::make($request->all(), [
            'client_id'    => 'required',
            'project_id'   => 'nullable',
            'name'         => 'required',
            // 'is_active'    => 'nullable',
        ]);

        // dd($validator);
        
        // Check if validation fails
        if ($validator->fails()) {
            // dd($validator);
            // Handle validation errors, for example, redirect back with errors
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed');

            // redirect()->route('designation.index')->with('error', 'Validation failed')->withErrors($validator)->withInput();
        }

        // if ($errors = $validatedData->errors()) {
        //     dd($errors);
        // }
        $validatedData=$validator->validated();
        // dd($validatedData);
        // dd($validatedData);
        // Store the new designation
        $data=Designation::create([
            'client_id' => $validatedData['client_id'],
            'project_id' => $validatedData['project_id'] ?? null,
            'designation_title' => $validatedData['name'],
            'is_active' => $request->input('is_active', 0),
            'created_by' => auth()->user()->id,// default to false if not checked
        ]);

        // dd($data);
        

        // Redirect to the designations list with a success message
        return redirect()->route('designation.index')->with('success', __('Designation created successfully.'));

    }

    public function show(Designation $designation)
    {
        return redirect()->route('designation.index');
    }

    public function edit(Designation $designation)
    {
        // dd($designation);
        // if (\Auth::user()->can('Edit Designation')) {
        //     if ($designation->created_by == \Auth::user()->creatorId()) {

        //         if (!empty($designation->branch_id)) {
        //             $branchs     = Branch::where('id', $designation->branch_id)->first()->pluck('name', 'id');
        //         } else {
        //             $branchs     = Branch::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //         }
        //         $departments = Department::where('id', $designation->department_id)->first()->pluck('name', 'id');

        //         return view('designation.edit', compact('designation', 'departments', 'branchs'));
        //     } else {
        //         return response()->json(['error' => __('Permission denied.')], 401);
        //     }
        // } else {
        //     return response()->json(['error' => __('Permission denied.')], 401);
        // }
        $projects=Project::all();
        $clients=Client::all();

        return view('designation.edit', compact('designation', 'projects', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);
        // if (\Auth::user()->can('Edit Designation')) {
        //     if ($designation->created_by == \Auth::user()->creatorId()) {
        //         $validator = \Validator::make(
        //             $request->all(),
        //             [
        //                 'branch_id' => 'required',
        //                 'department_id' => 'required',
        //                 'name' => 'required|max:20',
        //             ]
        //         );
        //         if ($validator->fails()) {
        //             $messages = $validator->getMessageBag();

        //             return redirect()->back()->with('error', $messages->first());
        //         }

        //         try {
        //             $branch = Department::where('id', $request->department_id)->where('created_by', '=', Auth::user()->creatorId())->first()->branch->id;
        //         } catch (Exception $e) {
        //             $branch = null;
        //         }

        //         $designation->name          = $request->name;
        //         $designation->branch_id     = $branch;
        //         $designation->department_id = $request->department_id;
        //         $designation->save();

        //         return redirect()->route('designation.index')->with('success', __('Designation  successfully updated.'));
        //     } else {
        //         return redirect()->back()->with('error', __('Permission denied.'));
        //     }
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $validator = Validator::make($request->all(), [
            'client_id'    => 'required',
            'project_id'   => 'nullable',
            'name'         => 'required',
            // 'is_active'    => 'nullable',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            // Handle validation errors, for example, redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed');
            // redirect()->route('designation.index')->with('error', 'Validation failed')->withErrors($validator)->withInput();

        }
        $validatedData=$validator->validated();

        $designation->update([
            'client_id' => $validatedData['client_id'],
            'project_id' => $validatedData['project_id'] ?? null,
            'designation_title' => $validatedData['name'],
            'is_active' => $request->input('is_active', 0),
            'created_by' => auth()->user()->id,// default to false if not checked
        ]);
        return redirect()->route('designation.index')->with('success', __('Designation updated successfully.'));
        

    }

    public function destroy($id)
    {
        $designation = Designation::find($id);
        // if (\Auth::user()->can('Delete Designation')) {
        //     $employee     = Employee::where('designation_id', $designation->id)->get();
        //     if (count($employee) == 0) {
        //         if ($designation->created_by == \Auth::user()->creatorId()) {
        //             $designation->delete();

        //             return redirect()->route('designation.index')->with('success', __('Designation successfully deleted.'));
        //         } else {
        //             return redirect()->back()->with('error', __('Permission denied.'));
        //         }
        //     } else {
        //         return redirect()->route('designation.index')->with('error', __('This designation has employees. Please remove the employee from this designation.'));
        //     }
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        $designation->delete();
        return redirect()->route('designation.index')->with('success', __('Designation deleted successfully.'));
    }
}
