<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompaniesController extends Controller
{

    public function create(){
        return view('create-companies');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name_companies' => 'required|string|max:255',
            'email_companies' => 'required|string|email|max:255|unique:companies,company_email',
            'logo_companies' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'website_companies' => 'nullable|url|max:255',
        ]);

        // Handle the file upload
        $logoPath = $request->file('logo_companies')->store('logo', 'public');

        // Save the company information to the database
        $company = new Companies;
        $company->company_name = $request->name_companies;
        $company->company_email = $request->email_companies;
        $company->company_logo = $logoPath;
        $company->company_website = $request->website_companies;
        $company->user_id = auth()->id();
        $company->save();

        return redirect('/dashboard')->with('success', 'Company created successfully!');
    }

    public function showEditComapny(Companies $company){
        if(auth()->user()->id !== $company->user_id){
            return redirect('/');
        }
    
        return view('edit-companies', ['company' => $company]);
    }
    
    public function editCompany(Request $request, Companies $company){
        if(auth()->user()->id !== $company->user_id){
            return redirect('/');
        }
    
        // Validate the request
        $request->validate([
            'name_companies' => 'required|string|max:255',
            'email_companies' => 'required|string|email|max:255|unique:companies,company_email,' . $company->id,
            'logo_companies' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'website_companies' => 'nullable|url|max:255',
        ]);
    
        // Handle the file upload
        if ($request->hasFile('logo_companies')) {
            $logoPath = $request->file('logo_companies')->store('logo', 'public');
            $company->company_logo = $logoPath;
        }
    
        // Save the company information to the database
        $company->company_name = $request->name_companies;
        $company->company_email = $request->email_companies;
        $company->company_website = $request->website_companies;
        $company->user_id = auth()->id();
        $company->save();
    
        return redirect('/dashboard')->with('success', 'Company updated successfully!');
    }
    
    public function deleteCompany(Companies $company){
        if(auth()->user()->id === $company->user_id){
            $company->delete();
        }
        return redirect('/dashboard');
    }
}