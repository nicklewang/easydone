<?php
class ModelShippingOmail extends Model {
	function getQuote($address) {
		$this->load->language('shipping/omail');
		
		$method_data = array();
		$cost = $this->config->get('omail_cost');	
		$quote_data = array();
		
		$quote_data['omail'] = array(
			'code'         => 'omail.omail',
			'title'        => $this->language->get('text_description'),
			'cost'         => $cost,
        	'tax_class_id' => $this->config->get('flat_tax_class_id'),
			'text'         => $cost
		);

		$method_data = array(
			'code'       => 'omail',
			'title'      => $this->language->get('text_title'),
			'quote'      => $quote_data,
			'sort_order' => $this->config->get('omail_sort_order'),
			'error'      => false
		);
	
		return $method_data;
	}
}
?>