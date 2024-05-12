<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Model;



class DokumenController extends Controller
{
    public function input(){
        return view('input_dokumen');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'deskripsi_dokumen' => 'required|string',
            'kategori_dokumen' => 'required|string',
            'tanggal_dokumen' => 'required|date',
            'dokumen_file' => 'required|file|mimes:pdf,docx,jpeg,png,jpg|max:2048', // Adjust file types and size limits as needed
            'tags' => 'nullable|string',
        ]);

        // Handle file upload (assuming 'dokumen_file' is the file input name)
        $fileName = time().'.'.$request->dokumen_file->getClientOriginalExtension();
        $request->dokumen_file->storeAs('public/documents', $fileName);

        $dokumen = Dokumen::create([
            'judul_dokumen' => $validatedData['judul_dokumen'],
            'deskripsi_dokumen' => $validatedData['deskripsi_dokumen'],
            'kategori_dokumen' => $validatedData['kategori_dokumen'],
            'tanggal_dokumen' => $validatedData['tanggal_dokumen'],
            'dokumen_file' => $fileName,
            'tags' => $validatedData['tags'],
        ]);

        return redirect()->route('list-dokumen')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function listDokumen()
    {
        $documents = Dokumen::all();
        return view('list-dokumen', ['documents' => $documents]);
    }

    public function processList(Request $request)
    {
        return redirect()->route('list-dokumen')->with('success', 'Data berhasil diproses.');
    }
};