<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Product[]|Collection
     */
    public function index(Request $request)
    {
//        return Product::all();
//        return response()->json(Product::all(),200);
//        return response(Product::all(), 200);
//        return response(Product::paginate(3), 200);

        $offset = $request->has('offset') ? $request->query('offset') : 0;
        $limit = $request->has('limit') ? $request->query('limit') : 10;

        $products = Product::query();

        if ($request->has('q')) {
            $products->where('name', 'like', '%' . $request->query('q') . '%');
        }

        if($request->has('sortBy')){
            $products->orderBy($request->query('sortBy'),$request->query('sort','DESC'));
        }

        $data = $products->offset($offset)->limit($limit)->get();

        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();

        $product = Product::create($inputs);

        return response([
            'data' => $product,
            'message' => 'Record added successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Product
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {

            return response($product, 200);
        } else {

            return response([
                'message' => 'No Such As Record'
            ], 404);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $inputs = $request->all();

        $product->update($inputs);

        return response([
            'data' => $product,
            'message' => 'Record edited successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response([
            'message' => 'Record deleted successfully'
        ], 200);
    }
}
