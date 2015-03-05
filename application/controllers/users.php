<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		if (!isset($results['results'])) {
			$results['results'] = $this->User->show_all();
			$this->session->set_userdata('category', "all_products");
		}
		// $this->session->sess_destroy();
		$this->load->view('products_view', $results);
	}
	public function show_all()
	{
		$results['results'] = $this->User->show_all();
		$this->load->view('item_view', $results['results']);
	}
	public function show_item($id)
	{
		$results = $this->User->show_item($id);
		var_dump($results[0]);
		$this->load->view('item_view', $results[0]);
	}
	public function cart()
	{
		$cart['products'] = $this->cart->contents();
		$this->load->view('order_view', $cart);
	}
	public function add_to_cart()
	{
		$item[] = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('item_price'),
			'size' => $this->input->post('size'),
			'qty' => $this->input->post('qty'),
			'qty_in_stock' => $this->input->post('qty_in_stock')
		);
		$this->cart->insert($item);
		redirect("/cart");
		break;
	}
	public function update_cart()
	{
		$item = array(
			'rowid' => $this->input->post('rowid'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->update($item);
		redirect("/cart");
		break;
	}
	public function remove_from_cart($id)
	{
		$item = array(
			'rowid' => $id,
			'qty' => 0
		);
		$this->cart->update($item);
		redirect("/cart");
		break;
	}
	public function category($id1, $id2)
	{
		$results['results'] = $this->User->category_sort($id1, $id2);
		$this->session->set_userdata('category', "sorted");
		$this->session->set_userdata('results', $results);
		$this->load->view('products_view', $results);
	}
	public function order()
	{
		echo "I am in the order";
		// $results = $this->User->show_item()
		$results = $this->input->post();
		var_dump($results);
		$this->User->submit_order();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */