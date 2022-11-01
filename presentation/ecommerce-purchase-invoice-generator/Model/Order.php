<?php
namespace Phppot;

use Phppot\DataSource;

class Order
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getAllOrders()
    {
        $query = "SELECT * FROM sales_order_information ";
        $result = $this->ds->select($query);
        return $result;
    } 

    function getPdfGenerateValues($id)
    {
        $query = "SELECT * FROM sales_order_information  WHERE sales_order_id='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getOrderItems($order_id)
    {
        // $sql = "SELECT tbl_order_items.*,tbl_product.product_title FROM tbl_order_items
        //         JOIN tbl_product ON tbl_order_items.product_id=tbl_product.id WHERE tbl_order_items.order_id='" . $order_id . "'";
        $query = "SELECT * FROM sales_order_add_items WHERE sales_order_id='" . $order_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getProduct($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE id='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }
}
