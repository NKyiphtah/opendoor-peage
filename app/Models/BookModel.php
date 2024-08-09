<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'isbn', 'price', 'description', 'image'];

    public function getBooks()
    {
        return $this->findAll();
    }

    public function getBook($id)
    {
        return $this->find($id);
    }
}
