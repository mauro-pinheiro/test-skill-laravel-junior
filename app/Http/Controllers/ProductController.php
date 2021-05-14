<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *      tags={"/products"},
     *      summary="Display list of resources",
     *      description="get all products on the database and paginate them",
     *      path="/products",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="limit per page",
     *          @OA\Schema(type="int"),
     *          style="form"
     *      ),
     *      @OA\Response(
     *          response="200", description="List of products"
     *      )
     *  )
     * @return ProductCollection
     */
    public function index(Request $request)
    {
        return new ProductCollection(Product::paginate($request->limit ?? null));
    }

    /**
     * @OA\Post(
     *      tags={"/products"},
     *      summary="Update the expecified resources",
     *      description="Update product on database",
     *      path="/products",
     *      security={{"bearerAuth": {}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="description", type="string"),
     *              @OA\Property(property="price", type="string"),
     *              @OA\Property(property="sku", type="string"),
     *              @OA\Property(property="stock_amount", type="string"),
     *              @OA\Property(property="client_id", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="201", description="Product created"
     *      )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        return Product::create($request->validated());
    }

    /**
     * @OA\Get(
     *      tags={"/products"},
     *      summary="Display the expecified resources",
     *      description="show product",
     *      path="/products/{product}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="product",
     *          in="path",
     *          description="Product ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\Response(
     *          response="200", description="Show product"
     *      )
     *  )
     * @return ClientResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * @OA\Put(
     *      tags={"/products"},
     *      summary="Update the expecified resources",
     *      description="Update product on database",
     *      path="/products/{product}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="product",
     *          in="path",
     *          description="Product ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              type="object",
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="description", type="string"),
     *              @OA\Property(property="price", type="string"),
     *              @OA\Property(property="sku", type="string"),
     *              @OA\Property(property="stock_amount", type="string"),
     *              @OA\Property(property="client_id", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response="200", description="product Updated"
     *      )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $request->validated();
        return $product->update($request->validated());
    }

    /**
     * @OA\Delete(
     *      tags={"/products"},
     *      summary="Display the expecified resources",
     *      description="show product",
     *      path="/products/{product}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="product",
     *          in="path",
     *          description="Product ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\Response(
     *          response="204", description="Product Deleted"
     *      )
     *  )
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
