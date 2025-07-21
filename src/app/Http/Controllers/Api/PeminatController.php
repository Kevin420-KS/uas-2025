<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Peminat;
use Illuminate\Http\Request;

class PeminatController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/peminats",
     *     tags={"Peminat"},
     *     summary="Ambil daftar semua peminat",
     *     @OA\Response(response=200, description="Daftar peminat berhasil diambil")
     * )
     */
    public function index()
    {
        return Peminat::all();
    }

    /**
     * @OA\Post(
     *     path="/api/peminats",
     *     tags={"Peminat"},
     *     summary="Tambahkan peminat baru",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"nama", "minat"},
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="minat", type="string")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Peminat berhasil ditambahkan")
     * )
     */
    public function store(Request $request)
    {
        return Peminat::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/peminats/{id}",
     *     tags={"Peminat"},
     *     summary="Ambil detail peminat",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Detail peminat")
     * )
     */
    public function show($id)
    {
        return Peminat::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/api/peminats/{id}",
     *     tags={"Peminat"},
     *     summary="Update data peminat",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="nama", type="string"),
     *             @OA\Property(property="minat", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Data peminat diperbarui")
     * )
     */
    public function update(Request $request, $id)
    {
        $peminat = Peminat::findOrFail($id);
        $peminat->update($request->all());
        return $peminat;
    }

    /**
     * @OA\Delete(
     *     path="/api/peminats/{id}",
     *     tags={"Peminat"},
     *     summary="Hapus peminat",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Peminat dihapus")
     * )
     */
    public function destroy($id)
    {
        Peminat::destroy($id);
        return response()->noContent();
    }
}
