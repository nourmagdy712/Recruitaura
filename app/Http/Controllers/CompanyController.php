<?php

namespace App\Http\Controllers;

use App\Models\Company;


class CompanyController extends Controller
{
    public function show($id)
    {
        $company = Company::with('jobs')->findOrFail($id);

        return view('Company details', compact('company'));
    }
}
