<?php
/*
 * ShoppingCart.php
 * Created by Dong Nguyen on 05/03/17.
 */

class ShoppingCart{
    private $uid    = "";
    private $items  = array();

    /*
     * @param   String User ID
     * @return  Void
     */
    function __construct($uid)
    {
        $this->uid = $uid;
        // Get shopping cart from DB or Session
        // ...
    }

    /*
     * @param   Object Product
     * @param   Int Quantity
     * @return  true or false
     */
    public function addProduct($product, $qty)
    {
        if(empty($product)) return false;
        if(!(is_numeric($qty) && $qty > 0)) return false;

        $item_id = $product->getId();

        if(isset($this->items[$item_id])){
            $this->items[$item_id]['qty'] += $qty;
        }else{
            $this->items[$item_id] = array(
                'product'   => $product,
                'qty'       => $qty
            );
        }

        return true;
    }

    /*
     * @param   Object Product
     * @param   Int Quantity
     * @return  true or false
     */
    public function removeProduct($product, $qty)
    {
        if(empty($product)) return false;
        if(!(is_numeric($qty) && $qty > 0)) return false;

        $item_id = $product->getId();

        if(isset($this->items[$item_id])){
            $this->items[$item_id]['qty'] -= $qty;

            if($this->items[$item_id]['qty'] <= 0) unset($this->items[$item_id]);
        }

        return true;
    }

    /*
     * @param   void
     * @return  self
     */
    public function truncate()
    {
        $this->items = array();
        return $this;
    }

    /*
     * @param   String User ID
     * @return  Array Items
     */
    public function getCart()
    {
        return $this->items;
    }

    /*
     * @param   Voice
     * @return  Float Total price
     */
    public function getTotalPrice()
    {
        $total_price = 0;
        foreach ($this->items as $item_id => $item){
            $total_price += $item['product']->getPrice() * $item['qty'];
        }
        return $total_price;
    }
}