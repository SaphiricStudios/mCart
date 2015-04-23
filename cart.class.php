<?php
/**
 *
 * Shopping Cart
 *
 * @package mCart
 * @version 0.1
 * @author Aderemi Adewale(modpluz) - go@remmy.me
 * @copyright (c) 2015 Aderemi Adewale - http://remmy.me/
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License v3
 *
 */
//initialize session object
if(!isset($_SESSION)){
    session_start();
    session_regenerate_id();
}

class Cart {
	private $cart_name = 'mCart';

        public function __construct($cart_name = ''){
        	if(!is_null($cart_name) && $cart_name != ''){
        		$this->cart_name = $cart_name;
        	}

        	if(!isset($_SESSION[$this->cart_name])){
        		$_SESSION[$this->cart_name] = array();
        	}
        }

        public function add($item){
        	$cart = $this->getItems();
        	array_push($cart, $item);
			$this->setItems($cart);
        }

        public function update($index, $item){
            $cart = $this->getItems();
            $cart[$index] = $item;
//        	array_push($cart, $item);
			$this->setItems($cart);
        }

        public function getItems(){
        	return $_SESSION[$this->cart_name];
        }

        public function setItems($items){
        	$_SESSION[$this->cart_name] = $items;
        }


        public function remove($key, $value){
        	$cart = $this->getItems();

            $itm_pos = array_search($value, array_column($cart, $key));
            if ($itm_pos !== FALSE) {
               unset($cart[$itm_pos]);

               $this->setItems($cart);
            }
        }

        public function exists($key, $value){
        	$cart = $this->getItems();

            $itm_pos = array_search($value, array_column($cart, $key));
            if ($itm_pos !== FALSE) {
               return TRUE;
            }

            return FALSE;       	
        }

        public function destroy(){
        	if(isset($_SESSION[$this->cart_name])) unset($_SESSION[$this->cart_name]);
        }
       
}
