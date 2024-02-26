<?php
/*
Plugin Name: Cloud Retail Systems A/S - Vis status
Plugin URI: http://cloudretailsystems.dk
Description: vis status på produkt siden: [crs_vis_status].
Author: Cloud Retail Systems A/S - Søren Højby
Version: 1.0
Author URI: http://cloudretailsystems.dk
*/

function crs_vis_status() {
    global $product;

    $backorder  = $product->get_backorders();
    $status  = $product->get_stock_status();
    $quantity = $product->get_stock_quantity();

    $html="";
    if($backorder =="notify"){
        if($quantity){
            $html .= "<div style='text-align:center;color:Green;'>På lager (leveringstid 1-5 dage)</div>";
        }else{
            $html .= "<div style='text-align:center;color:Green;'>Tilgængelig på restordre</div>";
        }

    }else{
        if($product->is_in_stock()){
            $html .= "<div style='text-align:center;color:Green;'>På lager (leveringstid 1-5 dage)</div>";
        }else{
            $html .= "<div style='text-align:center;color:red;'>Udsolgt </div>";
        }
    }

    return $html;
	}
	




    add_shortcode('crs_vis_status', 'crs_vis_status');
