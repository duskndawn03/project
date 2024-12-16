<?php

namespace App\Controllers;

use App\Models\BooksModel;

class BooksController extends BaseController
{
    public function index()
    {
        $model = new BooksModel();

        // Pagination setup
        $currentPage = $this->request->getVar('page') ?? 1; // Get current page from query string
        $booksPerPage = 24; // Number of books per page
        $offset = ($currentPage - 1) * $booksPerPage;

        // Fetch all categories
        $categories = $model->getCategories();

        // Prepare an array to store book details for each category
        $categoryData = [];
        foreach ($categories as $category) {
            // For each category, fetch related books (not paginated yet)
            $books = $model->getBooksByCategory($category['book_category']);
            $categoryData[] = [
                'category' => $category['book_category'],
                'books' => $books
            ];
        }

        // Fetch all books (for pagination purpose) - across all categories
        $allBooks = [];
        foreach ($categories as $category) {
            // For each category, fetch all books
            $allBooks = array_merge($allBooks, $model->getBooksByCategory($category['book_category']));
        }

        // Paginate the books data
        $paginatedBooks = array_slice($allBooks, $offset, $booksPerPage);

        // Initialize pagination
        $pager = \Config\Services::pager();
        $pager->makeLinks($currentPage, $booksPerPage, count($allBooks));

        // Pass data to the view
        $data = [
            'categoryData' => $categoryData,
            'paginatedBooks' => $paginatedBooks, // books for current page
            'pager' => $pager, // pagination links
        ];

        // Return the view with the data
        return view('books/index', $data);
    }

    public function details($slug)
    {
        $model = new BooksModel();

        // Fetch book details by slug
        $book = $model->getBookBySlug($slug);

        if (!$book) {
            // If no book is found, show a 404 error
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Book not found");
        }

        // Pass book data to the view
        $data['book'] = $book;
        return view('books/details', $data);
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
    
    public function readBook() {
        return view('books/pdf_viewer');
    }
}
