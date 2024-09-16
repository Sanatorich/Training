<?php
class Customer
{
    private $age;
    private $price;

    public function __construct($age, $price)
    {
        $this->age = $age;
        $this->price = $price;
    }

    public function allow()
    {
        echo "Customer are (in Parent Class)";
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
?>
