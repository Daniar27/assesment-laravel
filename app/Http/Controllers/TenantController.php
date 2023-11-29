<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $title = 'Data tenant';
        $data = Tenant::all(); // or any other method to get the data
        return view('page.tenant.index', compact('title', 'data'));
    }
}
