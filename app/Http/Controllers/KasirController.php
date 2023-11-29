<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $title = 'Data tenant';
        $data = Kasir::all(); // or any other method to get the data
        return view('page.kasir.index', compact('title', 'data'));
    }
}
