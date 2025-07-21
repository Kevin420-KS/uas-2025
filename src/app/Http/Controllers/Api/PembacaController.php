<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembaca;
use Illuminate\Http\Request;

class PembacaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pembacas",
     *     tags={"Pembaca"},
     *     summary="Ambil daftar semua pembaca",
     *     @OA\Response(response=200, description="Daftar pembaca berhasil diambil")
     * )
     */
    public function index()
    {
        return Pembaca::all();
    }

    /**
     * @OA\Post(
     *     path="/api/pembacas",
     *     tags={"Pembaca"},
     *     summary="Tambahkan pembaca baru",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nama", "email"},
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Pembaca berhasil ditambahkan")
     * )
     */
    public function store(Request $request)
    {
        return Pembaca::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/pembacas/{id}",
     *     tags={"Pembaca"},
     *     summary="Ambil detail pembaca",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detail pembaca")
     * )
     */
    public function show($id)
    {
        return Pembaca::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/pembacas/{id}",
     *     tags={"Pembaca"},
     *     summary="Update data pembaca",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="email", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data pembaca diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $pembaca = Pembaca::findOrFail($id);
        $pembaca->update($request->all());
        return $pembaca;
    }

    /**
     * @OA\Delete(
     *     path="/api/pembacas/{id}",
     *     tags={"Pembaca"},
     *     summary="Hapus pembaca",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Pembaca dihapus")
     * )
     */
    public function destroy($id)
    {
        Pembaca::destroy($id);
        return response()->noContent();
    }
}
