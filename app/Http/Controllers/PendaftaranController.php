<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('golongan_darah', 'like', "%$search%");
        }

        $pendaftarans = $query->get()->map(function ($pendaftaran) {
            $pendaftaran->age = $pendaftaran->tanggal_lahir ? now()->diffInYears($pendaftaran->tanggal_lahir) : null;
            return $pendaftaran;
        });

        return view('pendaftarans.index', compact('pendaftarans'));
    }

    public function create()
    {
        return view('pendaftarans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string', 
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required|string|max:3',
            'no_hp' => 'required|string|max:15',
        ]);

        Pendaftaran::create(array_merge($validated, [
            'tempat_lahir' => $request->input('tempat_lahir', 'Unknown'),
        ]));

        return redirect()->route('pendaftarans.index')->with('success', 'Pendonor berhasil didaftarkan.');
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string', 
            'tanggal_lahir' => 'required|date',
            'golongan_darah' => 'required|string|max:3',
            'no_hp' => 'required|string|max:15',
        ]);

        $pendaftaran->update($validated);

        return redirect()->route('pendaftarans.index')->with('success', 'Pendonor berhasil diperbarui.');
    }
}
