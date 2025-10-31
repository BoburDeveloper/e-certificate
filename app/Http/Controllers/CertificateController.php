<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('certificate.index', compact('certificates'));
    }

    public function create()
    {
        return view('certificate.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'category_id' => 'required|integer',
            'reg_date'=>'required',
            'description' => 'required|string|max:2048',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('certificates', 'public');
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('certificates-file', 'public');
        }

        $unique = microtime();
        $validated['link'] = base64_encode($unique);
        Certificate::create($validated);
        return redirect()->route('certificate.index')->with('success', 'Certificate added successfully!');
    }

    public function edit(Certificate $certificate)
    {
        return view('certificate.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'category_id' => 'required|integer',
            'reg_date'=>'required',
            'description' => 'required|string|max:2048',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status'=>'nullable|integer',
        ]);
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('certificates', 'public');
            unlink(storage_path('app/public/'.$certificate->photo));
        } else {
            $validated['photo'] = $certificate->photo;
        }
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('certificates-file', 'public');
            unlink(storage_path('app/public/'.$certificate->file));
        } else {
            $validated['photo'] = $certificate->file;
        }
        $certificate->update($validated);
        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }

    public function destroy(Certificate $certificate)
    {

        unlink(storage_path('app/public/'.$certificate->photo));
        $certificate->delete();
        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
    }

    public function show(Certificate $certificate){
        $certificate->load('role');
        return view('certificate.show', compact('certificate'));
    }

    public function view($link){
        $certificate = Certificate::with('role')->where('link', $link)->first();
                return view('certificate.view', compact('certificate'));
    }
}
