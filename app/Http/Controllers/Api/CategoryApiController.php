<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::withCount('products')->get();

            return response()->json([
                'message' => 'Categories retrieved successfully',
                'data' => $categories
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Error retrieving categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name'
            ]);

            $category = Category::create($validated);

            Log::info('Menambah data kategori', [
                'list' => $category
            ]);

            return response()->json([
                'message' => 'Kategori berhasil ditambahkan!!',
                'data' => $category,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah kategori', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Error saat menambah kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Category retrieved successfully',
                'data' => $category
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data kategori', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Error retrieving category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan',
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $id
            ]);

            $category->update($validated);

            Log::info('Mengupdate data kategori', [
                'list' => $category
            ]);

            return response()->json([
                'message' => 'Kategori berhasil diupdate!!',
                'data' => $category,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengupdate kategori', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Error saat mengupdate kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Kategori tidak ditemukan',
                ], 404);
            }

            $category->delete();

            Log::info('Menghapus data kategori', [
                'id' => $id
            ]);

            return response()->json([
                'message' => 'Kategori berhasil dihapus!!',
            ], 204);
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus kategori', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Error saat menghapus kategori',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
