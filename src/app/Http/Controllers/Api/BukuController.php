<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bukus",
     *     tags={"Buku"},
     *     summary="Ambil daftar semua buku",
     *     @OA\Response(response=200, description="Daftar buku berhasil diambil")
     * )
     */
    public function index()
    {
        return Buku::all();
    }

    /**
     * @OA\Post(
     *     path="/api/bukus",
     *     tags={"Buku"},
     *     summary="Tambahkan buku baru",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"judul", "penulis"},
     *             @OA\Property(property="judul", type="string"),
     *             @OA\Property(property="penulis", type="string")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Buku berhasil ditambahkan")
     * )
     */
    public function store(Request $request)
    {
        return Buku::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/bukus/{id}",
     *     tags={"Buku"},
     *     summary="Ambil detail buku",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detail buku")
     * )
     */
    public function show($id)
    {
        return Buku::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/bukus/{id}",
     *     tags={"Buku"},
     *     summary="Update data buku",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="judul", type="string"),
     *             @OA\Property(property="penulis", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data buku diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return $buku;
    }

    /**
     * @OA\Delete(
     *     path="/api/bukus/{id}",
     *     tags={"Buku"},
     *     summary="Hapus buku",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Buku dihapus")
     * )
     */
    public function destroy($id)
    {
        Buku::destroy($id);
        return response()->noContent();
    }
}
