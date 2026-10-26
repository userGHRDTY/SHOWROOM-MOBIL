<?php

namespace App\Http\Controllers;

use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Daftar semua mobil
     */
    public function index()
    {
        $mobil = Mobil::latest()->get();

        return MobilResource::collection($mobil)
            ->additional(['message' => 'Daftar mobil berhasil diambil']);
    }

    
    /**
    * Daftar semua mobil
    */
    /**
     * Tambah mobil baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'brand'       => 'required|string|max:100',
            'harga'       => 'required|integer|min:0',
            'tahun'       => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'transmisi'   => 'required|in:Manual,Matic,CVT',
            'bahan_bakar' => 'required|in:Bensin,Diesel,Hybrid,Listrik',
            'status'      => 'required|in:tersedia,sold',
            'foto'        => 'nullable|url',
        ], [
            'nama.required'  => 'Kolom nama mobil wajib diisi.',
            'harga.required' => 'Kolom harga wajib diisi.',
            'harga.integer'  => 'Kolom harga harus berupa angka.',
        ]);

        $mobil = Mobil::create($validated);

        return (new MobilResource($mobil))
            ->additional(['message' => 'Data mobil berhasil ditambahkan'])
            ->response()
            ->setStatusCode(201);
    }

     /**
    * Daftar semua mobil
    */
    /**
     * Detail satu mobil
     */
    public function show(string $id)
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return response()->json(['message' => 'Data mobil tidak ditemukan'], 404);
        }

        return (new MobilResource($mobil))
            ->additional(['message' => 'Detail mobil berhasil diambil']);
    }

     /**
    * Daftar semua mobil
    */
    /**
     * Perbarui data mobil
     */
    public function update(Request $request, string $id)
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return response()->json(['message' => 'Data mobil tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama'        => 'sometimes|required|string|max:255',
            'brand'       => 'sometimes|required|string|max:100',
            'harga'       => 'sometimes|required|integer|min:0',
            'tahun'       => 'sometimes|required|integer|min:1990|max:' . (date('Y') + 1),
            'transmisi'   => 'sometimes|required|in:Manual,Matic,CVT',
            'bahan_bakar' => 'sometimes|required|in:Bensin,Diesel,Hybrid,Listrik',
            'status'      => 'sometimes|required|in:tersedia,sold',
            'foto'        => 'nullable|url',
        ]);

        $mobil->update($validated);

        return (new MobilResource($mobil))
            ->additional(['message' => 'Data mobil berhasil diperbarui']);
    }

     /**
    * Daftar semua mobil
    */
    /**
     * Hapus mobil
     */
    public function destroy(string $id): JsonResponse
    {
        $mobil = Mobil::find($id);

        if (! $mobil) {
            return response()->json(['message' => 'Data mobil tidak ditemukan'], 404);
        }

        $mobil->delete();

        return response()->json(['message' => 'Data mobil berhasil dihapus']);
    }
}