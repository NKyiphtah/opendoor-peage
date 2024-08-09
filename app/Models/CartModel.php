<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'book_id', 'quantity'];

    public function addToCart($userId, $bookId)
    {
        $existingItem = $this->where(['user_id' => $userId, 'book_id' => $bookId])->first();

        if ($existingItem) {
            $this->update($existingItem['id'], ['quantity' => $existingItem['quantity'] + 1]);
        } else {
            $this->insert(['user_id' => $userId, 'book_id' => $bookId, 'quantity' => 1]);
        }
    }

    public function getCartItems($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}


