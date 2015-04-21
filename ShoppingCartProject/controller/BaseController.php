<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author Leonardo
 */
class BaseController {
        
        private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemIamgeLocation="";

    function getItemsHandler($params){
            $infoToShow = new Item();
            $infoToShow->searchItemByName($params);
            
            $this->itemName = $infoToShow->getItemName();
            $this->itemBrand = $infoToShow->getItemBrand();
            $this->itemPrice = $infoToShow->getItemPrice();
            $this->itemQtty = $infoToShow->getItemQtty();
            $this->itemIamgeLocation = $infoToShow->getItemLocation();
            $this->printItemInfo($this->itemIamgeLocation, $this->itemName, $this->itemBrand, $this->itemPrice, $this->itemQtty);
    }



}
