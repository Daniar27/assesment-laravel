<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Tenant;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        $title = 'Data Barang';
        $data = Barang::with('tenant')->get(); // or any other method to get the data
        return view('page.barang.index', compact('title', 'data'));
    }

    public function create()
    {
        $tenants = Tenant::all();
        return view ('page.barang.add', compact('tenants'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'kode_barang' => 'required|string|max:255',
                'satuan' => 'required|string|max:255',
                'harga_satuan' => 'required|numeric',
                'stok' => 'required|numeric',
                'tenant_id' => 'required|numeric|exists:tenants,id', // Check if the tenant_id exists in the tenants table
                // Add any other validation rules for your fields
            ]);

            // Create a new Barang record
            $barang = new Barang();
            $barang->nama_barang = $request->input('nama_barang');
            $barang->kode_barang = $request->input('kode_barang');
            $barang->satuan = $request->input('satuan');
            $barang->harga_satuan = $request->input('harga_satuan'); // Corrected field name
            $barang->stok = $request->input('stok');
            $barang->tenant_id = $request->input('tenant_id');
            $barang->save();

            return redirect()->route('barang.index')->with('success', 'Barang created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while creating data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $tenants = Tenant::all();

        return view('page.barang.edit', compact('barang', 'tenants'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'nama_barang' => 'required|string|max:255',
                'kode_barang' => 'required|string|max:255',
                'satuan' => 'required|string|max:255',
                'harga_satuan' => 'required|numeric',
                'stok' => 'required|numeric',
                'tenant_id' => 'required|numeric|exists:tenants,id',
                // Add any other validation rules for your fields
            ]);

            // Find the Barang record by ID
            $barang = Barang::findOrFail($id);

            // Update the Barang record
            $barang->update([
                'nama_barang' => $request->input('nama_barang'),
                'kode_barang' => $request->input('kode_barang'),
                'satuan' => $request->input('satuan'),
                'harga_satuan' => $request->input('harga_satuan'),
                'stok' => $request->input('stok'),
                'tenant_id' => $request->input('tenant_id'),
            ]);

            return redirect()->route('barang.index')->with('success', 'Barang updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while updating data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();

            return redirect()->route('barang.index')->with('success', 'Barang deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while deleting data: ' . $e->getMessage());
        }
    }

    public function getBarang(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Barang::with('tenant')->get();

                return DataTables::of($data)
                    ->addColumn('id', function ($row) {
                        static $index = 0;
                        $index++;
                        return $index;
                    })
                    ->addColumn('options', function ($barang) {
                        return "<a href='news/{$barang->id}/edit'><i class='fas fa-edit fa-lg'></i></a>
                                <a style='border: none; background-color:transparent;' class='hapusData' data-id='$barang->id' data-url='news/{$barang->id}'><i class='fas fa-trash fa-lg text-danger'></i></a>";
                    })
                    ->make(true);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while showing data: ' . $e->getMessage());
        }
    }

}
