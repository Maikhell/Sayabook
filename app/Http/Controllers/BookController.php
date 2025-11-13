<?php

// BookController.php (Use this version)

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function store(Request $request)
    {
        // 0. IMPORTANT FIX: Prepare the Request data
        // Convert any empty strings for nullable fields to actual null values.
        // This is crucial for fields with specific rules like 'url'.
        $request->merge(
            $request->except('books') + [
                'books' => collect($request->input('books'))->map(function ($book) {
                    foreach (['book_description', 'book_category', 'book_genre', 'book_online_link'] as $field) {
                        if (isset($book[$field]) && $book[$field] === '') {
                            $book[$field] = null;
                        }
                    }
                    return $book;
                })->all()
            ]
        );

        // 1. Define the validation rules for ALL books using array notation
        $rules = [
            'books.*.book_title' => 'required|string|max:255',
            'books.*.book_author' => 'required|string|max:255',
            'books.*.book_description' => 'nullable|string',
            'books.*.book_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'books.*.book_status' => 'required|in:reading,completed,to_read,dropped',
            'books.*.book_category' => 'nullable|string|max:50',
            'books.*.book_genre' => 'nullable|string|max:50',
            'books.*.book_privacy' => 'required|in:public,private',
            'books.*.book_online_link' => 'nullable|url', // This rule now correctly handles nulls
            'books.*.date_added' => 'required|date',
        ];

        // 2. Run the validator on the entire request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'validation_error',
                'message' => 'Validation failed for one or more books.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // 3. Get the validated data
        $validatedData = $validator->validated();
        $booksData = $validatedData['books'] ?? [];

        $savedBooks = [];

        if (empty($booksData)) {
            return response()->json(['status' => 'error', 'message' => 'No book data was found after validation.'], 422);
        }

        // 4. Loop through the *validated* data to save each book
        foreach ($booksData as $index => $book) {

            $bookCoverFile = $request->file("books.{$index}.book_cover");
            $coverPath = null;

            if ($bookCoverFile) {
                try {
                    $coverPath = $bookCoverFile->store('covers', 'public');
                } catch (\Exception $e) {
                    Log::error("File storage failed for Book Index {$index}: " . $e->getMessage());
                }
            }

            // 5. Create the Book record
            $bookToCreate = array_merge($book, [
                'book_cover' => $coverPath,
            ]);

            try {
                $newBook = auth()->user()->books()->create($bookToCreate);
                $savedBooks[] = $newBook;
            } catch (\Exception $e) {
                Log::error("Database creation failed for Book Index {$index}: " . $e->getMessage());
            }
        }

        // 6. Redirect the user
        $count = count($savedBooks);
        $status = $count > 0 ? 'success' : 'error';
        $message = $count > 0
            ? "Successfully added {$count} book(s) to your collection!"
            : 'No books were saved. Please check your inputs.';

        return response()->json([
            'status' => $status,
            'message' => $message,
        ], $count > 0 ? 200 : 422);
    }
}