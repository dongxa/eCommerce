<?php
/*
 * eCommerceTest.php
 * Created by Dong Nguyen on 05/03/17.
 */

use PHPUnit\Framework\TestCase;

require_once('src/User.php');
require_once('src/Product.php');
require_once('src/ShoppingCart.php');

class eCommerceTest extends TestCase
{
    public function testCommerce()
    {
        print("\nCreate User");
        $JohnDoe = new User();
        $JohnDoe->setName("John Doe")->setEmail("john.doe@example.com");

        $this->assertEquals("John Doe", $JohnDoe->getName());
        $this->assertEquals("john.doe@example.com", $JohnDoe->getEmail());
        print("\nUser ID: ".$JohnDoe->getUserId());

        
        $apple_product = new Product("Apple", 4.95);
        $this->assertTrue(!empty($apple_product->getId()));

        $Orange_product = new Product("Orange", 3.99);
        $this->assertTrue(!empty($Orange_product->getId()));


        print("\n\nAdd 2 apple + 1 Orange product to ShoppingCart");
        $JohnDoe->cart->addProduct($apple_product, 2);
        $JohnDoe->cart->addProduct($Orange_product, 2);
        print("\nTotal price: $".number_format($JohnDoe->cart->getTotalPrice(), 2));

        print("\n\nTruncate ShoppingCart");
        $JohnDoe->cart->truncate();

        print("\n\nAdd 3 apple product");
        $JohnDoe->cart->addProduct($apple_product, 3);
        print("\nTotal price: $".number_format($JohnDoe->cart->getTotalPrice(), 2));

        print("\n\nRemove 1 apple product");
        $JohnDoe->cart->removeProduct($apple_product, 1);
        print("\nTotal price: $".number_format($JohnDoe->cart->getTotalPrice(), 2));
    }
}