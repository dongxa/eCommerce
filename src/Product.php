<?php
/*
 * Product.php
 * Created by Dong Nguyen on 05/03/17.
 */

class Product
{
    private $id     = "";
    private $name   = "";
    private $price  = 0;

    /*
     * @param   String Product name
     * @param   Float Product price
     * @return  mixed
     */
    function __construct($name, $price = 0)
    {

        if(empty($name))
        {
            throw new InvalidArgumentException(
                sprintf(
                    'Product name is not empty'
                )
            );
        }
        $this->name = $name;

        if(!(is_numeric($price) && $price >= 0))
        {
            throw new InvalidArgumentException(
                sprintf(
                    'Invalid product price'
                )
            );
        }
        $this->price = floatval($price);

        $this->id = uniqid('', false);

        print("\n\nCreate product: ".$this->name);
        print("\nProduct ID: ".$this->id);
    }

    /*
     * @param   Void
     * @return  String Product name
     */
    public function getName()
    {
        return $this->name;
    }

    /*
     * @param   Void
     * @return  Float Product price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /*
     * @param   Void
     * @return  String Product ID
     */
    public function getId()
    {
        return $this->id;
    }
}