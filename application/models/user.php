<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function show_all()
	{
		$query = "SELECT products.id, name, description, item_price FROM products LEFT JOIN items ON items.products_id = products.id";
		var_dump($query);
		return $this->db->query($query)->result_array();
	}
	public function category_sort($id1, $id2)
	{
		$query = "SELECT products.id, name, description, item_price, category, subcategory FROM products LEFT JOIN items ON items.products_id = products.id LEFT JOIN categories ON categories.id = products.categories_id LEFT JOIN subcategories ON subcategories.id = products.subcategories_id WHERE products.categories_id = '{$id1}' AND products.subcategories_id = '{$id2}'";
		var_dump($query);
		// products.id, name, description, item_price, categories_id, subcategories_id
		return $this->db->query($query)->result_array();
	}
	public function show_item($id)
	{
		$query = "SELECT products.id, name, description, item_price, qty_in_stock, size FROM products LEFT JOIN items ON items.products_id = products.id LEFT JOIN sizes ON sizes.id = products.sizes_id WHERE products.id = '{$id}'";
		var_dump($query);
		// products.id, name, description, item_price, qty_in_stock
		return $this->db->query($query)->result_array();
	}
	public function submit_order()
	{
		echo "I am in the order submission model.";
	}
}