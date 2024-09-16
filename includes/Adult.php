<?php
class Adult extends Customer
{
    private $vip;

    public function __construct($age, $price, $vip)
    {
        $this->vip = $vip;
        parent::__construct($age, $price);
    }

    public function allow()
    {
        echo "Adults are";
    }

    public function setVIP($vip)
    {
        $this->vip = $vip;
    }

    public function getVIP()
    {
        return $this->vip;
    }
}
?>
