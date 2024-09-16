<?php
class Child extends Customer
{
    private $rec;

    public function __construct($age, $price, $rec)
    {
        $this->rec = $rec;
        parent::__construct($age, $price);
    }

    public function allow(){
        echo "Children are <strong>NOT</strong>";
    }

    public function setRec($rec)
    {
        $this->rec = $rec;
    }

    public function getRec()
    {
        return $this->rec;
    }
}
?>
