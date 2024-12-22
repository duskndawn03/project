<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'book_category';
    protected $primaryKey = 'book_id';
    protected $allowedFields = ['book_category'];
    protected $useTimestamps = false;

    // Method to get all book categories
    public function getCategories()
    {
        return $this->findAll();
    }

    public function getBookBySlug($slug)
    {
        $slug = urldecode($slug);
        $db = \Config\Database::connect();
        $builder = $db->table('book_details');
        $builder->where('book_details_slug', $slug);
        return $builder->get()->getRowArray();
    }


    // Method to get book details by category
    public function getBooksByCategory($category)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('book_details');
        $builder->select('*');
        $builder->where('book_details_category', $category);
        return $builder->get()->getResultArray();
    }

    // Method to search for books by name, author, or category
    public function searchBooks($query)
    {
        $db = \Config\Database::connect();
        
        // Escape the query to prevent SQL injection
        $searchQuery = $db->escapeLikeString($query);

        // Build the SQL query to search for books by name, author, or category
        $sql = "SELECT * FROM book_details WHERE 
                book_details_name LIKE '%$searchQuery%' OR 
                book_details_author LIKE '%$searchQuery%' OR 
                book_details_category LIKE '%$searchQuery%'";

        // Execute the query and fetch results
        $queryResult = $db->query($sql);

        // Initialize the array to store the books
        $books = [];

        // If results exist, process and return them
        if ($queryResult->getNumRows() > 0) {
            foreach ($queryResult->getResultArray() as $row) {
                // Add the formatted result to the books array
                $books[] = [
                    'name' => htmlspecialchars($row['book_details_name']),
                    'author' => htmlspecialchars($row['book_details_author']),
                    'category' => htmlspecialchars($row['book_details_category']),
                    'image' => base_url('public/assets/img/shop/' . htmlspecialchars($row['book_details_image'])),
                ];
            }
        }

        // Return the books array
        return $books;
    }
}
