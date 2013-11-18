<?php
class ModelShippingExpress extends Model {
	function getQuote($address) {
		$this->load->language('shipping/express');
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0') LIMIT 1");
//	 $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('express_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		if ($query->num_rows)
		{	
			$cost=$this->config->get("de_cost_".$query->row["geo_zone_id"]);
		}		
		
		if(!isset($cost) || $cost==""){
			$cost=$this->config->get("de_cost");
		}

		$weight=$this->cart->getWeight();
		
		if($weight<1){
			$weight=1;
		}else{
			$weight=ceil($weight);
		}
		
//		$cost=$cost*$weight;

		$method_data = array();
		
		$quote_data = array();
		
		$quote_data['express'] = array(
			'code'         => 'express.express',
			'title'        => $this->language->get('text_description'),
			'cost'         => $cost,
        	'tax_class_id' => $this->config->get('flat_tax_class_id'),
			'text'         => $cost
		);

		$method_data = array(
			'code'       => 'express',
			'title'      => $this->language->get('text_title'),
			'quote'      => $quote_data,
			'sort_order' => $this->config->get('express_sort_order'),
			'error'      => false
		);
			
		return $method_data;
	}
}
?>