<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        // if (\Auth::user()->can('Manage Employee')) {
            // if (Auth::user()->type == 'employee') {
                // $employees = Employee::where('user_id', '=', Auth::user()->id)->get();
            // } else {
                // $employees = Employee::where('created_by', \Auth::user()->creatorId())->with(['branch', 'department', 'designation', 'user'])->get();
            // }

            // return view('employee.index', compact('employees'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }

        $clients = Client::all();

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        // if (\Auth::user()->can('Create Employee')) {
        //     $company_settings = Utility::settings();
        //     $documents        = Document::where('created_by', \Auth::user()->creatorId())->get();
        //     $branches         = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //     $departments      = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //     $designations     = Designation::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        //     $employees        = User::where('created_by', \Auth::user()->creatorId())->get();
        //     $employeesId      = \Auth::user()->employeeIdFormat($this->employeeNumber());

        //     return view('employee.create', compact('employees', 'employeesId', 'departments', 'designations', 'documents', 'branches', 'company_settings'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }

      

        return view('client.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        //  Validate the input data
    $request->validate([
        'client_name' => 'required',
        'address' => 'required',
        'phone_no' => 'required|string|max:15',
        // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'logo' => 'nullable',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone_number' => 'required|string|max:15',
        'email' => 'required|email',
        'is_active' => 'nullable',
        'erp_client_id' => 'nullable',
    ]);
    // dd($request->all());
    // Handle file upload
    $logoPath = null;
    // if ($request->hasFile('logo')) {
    //     // $logoPath = $request->file('logo')->store('logo', 'public');
    //     // $logo = $request->file('logo');
    //     // dd($logo);
    //     // $logoPath = $logo->storeAs('logos', $logo->getClientOriginalName(), 'public');
    //     // $logoPath = $logo->storeAs('logos', 'logo.png', 'public');

    //     $logo = $request->file('logo');
    //     // dd(storage_path('app/public/logos'));
     

    //     $logoPath = $logo->storeAs('logos', $logo->getClientOriginalName(), 'public')?? null;
    //     // dd($logoPath);


    // }

    if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
        $logo = $request->file('logo');
        
        // Define the path where the file should be moved
        $path = public_path('storage/logos');
        
        // Ensure the directory exists
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        
        // Move the file to the desired location
        $logo->move($path, $logo->getClientOriginalName());
        
        // Get the file path
        $logoPath = 'logos/' . $logo->getClientOriginalName();
        // dd($filePath); // Outputs the path like "logos/filename.png"
    }
    

    // Save data
    Client::create([
        'client_name' => $request->input('client_name'),
        'address' => $request->input('address'),
        'phone_no' => $request->input('phone_no'),
        'logo_path' => $logoPath ?? null,
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'phone_number' => $request->input('phone_number'),
        'email' => $request->input('email'),
        'is_active' => $request->input('is_active', 0), // Default to 0 if not checked
        'erp_client_id' => $request->input('erp_client_id', 0), // Default to 0 if not checked
    ]);

    return redirect()->route('client.index')->with('success', 'Client created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $client = Client::find($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $client = Client::find($id);
        $request->validate([
            'client_name' => 'required',
            'address' => 'required',
            'phone_no' => 'required|string|max:15',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email',
            'is_active' => 'nullable',
            'erp_client_id' => 'nullable',
        ]);
    
        // Handle file upload
        $logoPath = $client->logo_path; // Retrieve the existing logo path from the database

        // if ($request->hasFile('logo')) {
        //     //     // If the user uploaded a new logo, delete the old logo
        //     //     if ($logoPath && \Storage::disk('public')->exists($logoPath)) {
        //     //         \Storage::disk('public')->delete($logoPath);
        //     //     }
        
        //     // Store the new logo with the original file name
        //     $logo = $request->file('logo');
        //     // dd($logo->getClientOriginalName());

        //     // dd(storage_path('app/public/logos'));
        //     $logoPath = $logo->storeAs('logo', 'logo.png', 'public');
            

        // }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
        
            // Get the old logo file path (from the database or storage)
            // $oldLogoPath = 'storage/logos/old_logo.png'; // Example: Replace this with the actual old logo path from your database
            $oldLogoPath =$logoPath; 
            
            // Check if the old logo exists and delete it
            if($oldLogoPath && file_exists(public_path($oldLogoPath))) {
                unlink(public_path($oldLogoPath));  // Delete the old file
            }
            // if (file_exists(public_path($oldLogoPath))) {
            //     unlink(public_path($oldLogoPath));  // Delete the old file
            // }
    
            // Get the new logo file
            $logo = $request->file('logo');
    
            // Define the new path where the file should be stored
            $newPath = public_path('storage/logos');
    
            // Ensure the directory exists
            if (!file_exists($newPath)) {
                mkdir($newPath, 0755, true);
            }
    
            // Store the new logo in the logos directory with its original name
            $newFileName = $logo->getClientOriginalName();
            $logo->move($newPath, $newFileName);
    
            // Construct the path for the new logo
            $logoPath = 'logos/' . $newFileName;
    
        }
        
    
        // Save data
        $client->update([
            'client_name' => $request->input('client_name'),
            'address' => $request->input('address'),
            'phone_no' => $request->input('phone_no'),
            'logo_path' => $logoPath,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'is_active' => $request->input('is_active', 0), // Default to 0 if not checked
            'erp_client_id' => $request->input('erp_client_id', 0), // Default to 0 if not checked
        ]);
    
        return redirect()->route('client.index')->with('success', 'Client updated successfully.');
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $client = Client::find($id);
        Client::where('clientid', $id)->delete();
        return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
    }

    public function export()
    {
        $name = 'client_' . date('Y-m-d i:h:s');
        $data = Excel::download(new EmployeesExport(), $name . '.xlsx');


        return $data;
    }
}
