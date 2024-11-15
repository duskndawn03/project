<?php

namespace App\Controllers;

use App\Models\BooksModel;

class BooksController extends BaseController
{
    public function index()
    {
        $model = new BooksModel();

        // Fetch all categories
        $categories = $model->getCategories();

        // Prepare an array to store book details for each category
        $categoryData = [];
        foreach ($categories as $category) {
            // For each category, fetch related books
            $books = $model->getBooksByCategory($category['book_category']);
            $categoryData[] = [
                'category' => $category['book_category'],
                'books' => $books
            ];
        }

        // Pass data to the view
        $data['categoryData'] = $categoryData;

        // Return the view with the data
        return view('books/index', $data);
    }
    // Method to handle the search request
    public function searchBooks()
    {
        // Get the search query from the GET request
        $query = $this->request->getGet('query');
        
        // Initialize the model
        $model = new BooksModel();

        // Get the search results from the model
        if (!empty($query)) {
            $results = $model->searchBooks($query);

            // Return results as JSON
            return $this->response->setJSON($results);
        } else {
            // Return an empty array if no query is provided
            return $this->response->setJSON([]);
        }
    }
    
    public function viewAllBooks()
    {
        // Check if the category parameter is provided in the URL
        $category = $this->request->getGet('category');
        
        // If no category is provided, show an error message
        if (!$category) {
            return view('error', ['message' => 'Category not specified.']);
        }

        // Initialize the BooksModel
        $model = new BooksModel();

        // Fetch the books for the provided category
        $books = $model->getBooksByCategory($category);

        // Prepare the data to pass to the view
        $data = [
            'category' => $category,
            'books' => $books,
        ];

        // Return the view with the data
        return view('books/view_all_books', $data);
    }
}
