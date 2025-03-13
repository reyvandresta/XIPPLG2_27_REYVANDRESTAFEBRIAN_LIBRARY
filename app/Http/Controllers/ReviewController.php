<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    // Menampilkan semua review
    public function index()
    {
        $reviews = Review::all();

        return response()->json([
            'status' => 200,
            'message' => 'Reviews retrieved successfully.',
            'data' => $reviews
        ], 200);
    }

    // Menyimpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Review created successfully.',
            'data' => $review
        ], 201);
    }

    // Menampilkan review berdasarkan ID
    public function show($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
                'data' => null
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Review retrieved successfully.',
            'data' => $review
        ], 200);
    }

    // Mengupdate review berdasarkan ID
    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
                'data' => null
            ], 404);
        }

        $request->validate([
            'rating' => 'integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Review updated successfully.',
            'data' => $review
        ], 200);
    }

    // Menghapus review berdasarkan ID
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'status' => 404,
                'message' => 'Review not found.',
                'data' => null
            ], 404);
        }

        $review->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Review deleted successfully.',
            'data' => null
        ], 200);
    }
}
