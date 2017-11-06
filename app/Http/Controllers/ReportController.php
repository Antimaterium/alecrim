<?php

namespace Alecrim\Http\Controllers;

use Illuminate\Http\Request;
use Alecrim\Product;
use Alecrim\Item;
use Alecrim\Order;

class ReportController extends Controller
{
    public function spendings() {
    	$result 			= array();
	   	$data               = array();
	   	$usersOpenedOrder   = array();
	   	$totalCost			= 0;
	   	$totalProfits 		= 0;
	   	$order_list         = Order::whereHas('items', function($query) {
	                               		$query->where(
	                                   		[
	                                       		['order_status', '=' , 'pago' ]
	                                   		]);
	                           		})->get();
	   	$data['order'] = $order_list;
	   	// iterando todos os pedidos para trazer seus dados e items
	   	foreach ($order_list as $keyOrder => $order) {
	       	$data['order'][$keyOrder]['items']   = $order->items;
	       	// iterando todos os items para trazer todos seus dados e produtos
	       	foreach ($order->items as $keyItem => $item) {
	       		$data['order'][$keyOrder]['items'][$keyItem]['products'] = $item->products;
	       		$result[$keyOrder]['cost'] = 0;
	       		// iterando todos os produtos para obter o valor de custo
	       		foreach ($item->products as $keyProduct => $product) {
	       			$result[$keyOrder]['cost'] += $product->product_purchase_unit_price;
	       			$totalCost += $result[$keyOrder]['cost'];
	       		}

	       	}
	       	$result[$keyOrder]['date']		= date('d/m/Y', strtotime($order->updated_at));
	       	$result[$keyOrder]['profits']	= $order->order_total - $result[$keyOrder]['cost'];
	   		$result[$keyOrder]['total'] 	= $order->order_total;
	       	$totalProfits += $result[$keyOrder]['profits'];
	   	}

	   	$values['totalProfits']	= $totalProfits;
	   	$values['totalCost']	= $totalCost;

    	return view('/reports/spendings', compact('result', 'values'));
    }

}
