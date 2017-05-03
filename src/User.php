<?php
/*
 * User.php
 * Created by Dong Nguyen on 05/03/17.
 */

class User
{
    private $uid    = "";
    private $email  = "";
    private $name   = "";
    public $cart   = array();

    function __construct()
    {
        $this->uid = uniqid('', false);
        $this->cart = new ShoppingCart($this->uid);
    }

    /*
     * @param   String Username
     * @return  self
     */
    public function setName($name)
    {
        $this->ensureIsNotEmptyName($name);
        $this->name    = $name;
        return $this;
    }

    /*
     * @param   Void
     * @return  String User name
     */
    public function getName()
    {
        print("\nName: ".$this->name);
        return $this->name;
    }

    /*
     * @param   String Email
     * @return  self
     */
    public function setEmail($email)
    {
        $this->ensureIsValidEmail($email);
        $this->email    = $email;
        return $this;
    }

    /*
     * @param   Void
     * @return  String Email
     */
    public function getEmail()
    {
        print("\nEmail: ".$this->email);
        return $this->email;
    }

    /*
     * @param   Void
     * @return  String User ID
     */
    public function getUserId()
    {
        return $this->uid;
    }

    /*
     * Check the email is valid
     *
     * @param   String Email
     * @return  mixed
     */
    private function ensureIsValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                )
            );
        }
    }

    /*
     * Check the user name is empty
     *
     * @param   String User name
     * @return  mixed
     */
    private function ensureIsNotEmptyName($name){
        if(empty($name))
        {
            throw new InvalidArgumentException(
                sprintf(
                    'Name is not empty'
                )
            );
        }
    }
}