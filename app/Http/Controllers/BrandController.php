<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/brand",
     *     tags={"brand"},
     *     summary="index brand",
     *     description="show all brand without relations",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"done", "pending", "buy"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     *
     * )
     */
    public function index()
    {
        return Brand::all();
    }

    /**
     * @OA\Post(
     *      path="/api/brand",
     *      operationId="store",
     *      tags={"brand"},
     *      summary="Store new brand",
     *      description="store new brand in database and Returns project data",
     *      @OA\RequestBody(
     *      @OA\JsonContent(),
     *     @OA\MediaType(
     *          mediaType="multipart/form-data",
     *         @OA\Schema(
     *           type="object",
     *           required={"name","price","family","status"},
     *           @OA\Property(property="name",type="string"),
     *           @OA\Property(property="price",type="integer"),
     *           @OA\Property(property="family",type="text"),
     *           @OA\Property(property="status",type="boolean"),
     *        ),
     *     ),
     *
     *
     *      ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *     @OA\Response(
     *           response=500,
     *           description="Server Error"
     *       ),
     *
     * )
     */
    public function store(Request $request)
    {
        return Brand::create([
            'name' => $request->input('name'),
            'price' =>$request->input('price'),
            'family' =>$request->input('family'),
            'status' => (boolean)$request->input('status'),
        ]);
    }
}
