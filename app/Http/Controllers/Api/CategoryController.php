<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $category = Category::with('products')->get();

        $category = $category->makeHidden('slug');

        return response($category, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response([
            'data' => $category,
            'message' => 'Record added successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Category
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response([
            'data' => $category,
            'message' => 'Record edited successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response([
            'message' => 'Record deleted successfully'
        ], 200);
    }

    public function custom1()
    {
        return Category::pluck('id', 'name');
    }

    public function custom2()
    {
        return DB::table('category_product as cp')
            ->selectRaw('c.name, COUNT(*) as total')
            ->join('categories as c', 'c.id', '=', 'cp.category_id')
            ->join('products as p', 'p.id', '=', 'cp.product_id')
            ->groupBy('c.name')
            ->orderByRaw('COUNT(*) DESC')
            ->get();
    }
}
