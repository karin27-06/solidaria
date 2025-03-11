<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class CategoryController extends Controller
{
    private const SUCCESS_MESSAGE = 'success';
    private const MESSAGE = 'message';
    private const DATA = 'data';
    private const PAGINATION = 'pagination';

    public function index()
    {
        Gate::authorize('viewAny', Category::class);
        return Inertia::render('Category/indexCategory');
    }

    public function listCategory(Request $request): JsonResponse
    {
        Gate::authorize('viewAny', Category::class);
        try {
            $categories = Category::when($request->query('name'), function ($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            ->orderBy('created_at', 'asc')
            ->paginate(10);

            return response()->json([
                self::DATA => CategoryResource::collection($categories),
                self::PAGINATION => [
                    'total' => $categories->total(),
                    'current_page' => $categories->currentPage(),
                    'per_page' => $categories->perPage(),
                    'last_page' => $categories->lastPage(),
                    'from' => $categories->firstItem(),
                    'to' => $categories->lastItem(),
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                self::MESSAGE => 'Error al cargar las categorías',
                'error' => $th->getMessage(),
            ], 500);
        }
    }


    // ! don't use a single request for store and update methods, create a separate request for each method storeRequest and updateRequest

    public function store(CategoryRequest $request): JsonResponse
    {
        Gate::authorize('create', Category::class);
        $category = Category::create($request->validated());

        return response()->json([
            self::SUCCESS_MESSAGE => true,
            self::MESSAGE => 'Categoría creada',
            self::DATA => new CategoryResource($category),
        ], 201);
    }

    public function update(CategoryRequest $request, Category $category): JsonResponse
    {
        Gate::authorize('update', $category);
        $category->update($request->validated());

        return response()->json([
            self::SUCCESS_MESSAGE => true,
            self::MESSAGE => 'Categoría actualizada',
            self::DATA => new CategoryResource($category),
        ], 200);
    }

    public function destroy(Category $category): JsonResponse
    {
        Gate::authorize('delete', $category);
        $category->delete();

        return response()->json([
            self::SUCCESS_MESSAGE => true,
            self::MESSAGE => 'Categoría eliminada',
        ], 200);
    }
}
