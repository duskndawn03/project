<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class FileController extends BaseController
{
    public function serve($filename)
    {
        $filePath = WRITEPATH . 'uploads/' . $filename;

        if (file_exists($filePath)) {
            // Serve the PDF file
            return $this->response
                        ->setHeader('Content-Type', 'application/pdf')
                        ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                        ->setBody(file_get_contents($filePath));
        }

        // If the file does not exist, show a 404 error
        return $this->response->setStatusCode(404, 'File Not Found')->setBody('The requested file was not found.');
    }

    public function viewer($filename)
    {
        // Pass the filename to the view
        return view('books/pdf_viewer', ['filename' => $filename]);
    }
}
