<?php


/*
    CartController.php

    Котроллер для корзины товаров
 */


class CartController {

    protected $countOrders;

    protected $db;

    public function __construct($pdo)
    {
        $db = new QueryBuilder($pdo);
    }

    public function addToCart($id,$count=1)
    {

        if(!empty($_SESSION['products'][$id]))
        {
            $_SESSION['products'][$id]['count']++;
        }

        else {
            $_SESSION['products'][$id] = array();

            $row = $this->db->Get('akb','id',$id);

            $_SESSION['products'][$id]['cost'] = $row['price'];
            $_SESSION['products'][$id]['count'] = $count;

            $this->UpdateCart();
        }
    }

    public function UpdateCart()
    {
        $_SESSION['product_incart'] = count($_SESSION['products']);
        $_SESSION['cart_cost'] = 0;
        foreach ($_SESSION['products'] as $key=>$value) {
            $_SESSION['cart_cost'] += $_SESSION['products'][$key]['cost'] * $_SESSION['products'][$key]['count'];
        }
    }


    public function updateProductCart($id,$count) {
        $_SESSION['products'][$id]['count'] = $count;

        $this->UpdateCart();
    }

    public function removeFromCart($id,$count=1)
    {
        unset($_SESSION['products'][$id]);
        $this->UpdateCart();

    }

    public function clearCart()
    {

    }

    public function GetCountOrders()
    {
        return $this->countOrders;
    }



}

?>