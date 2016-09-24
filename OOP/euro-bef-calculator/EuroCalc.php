<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 24/09/16
 * Time: 19:12
 */




class EuroCalc
{
    public $amount;
    private $ratio = 40.3399;
    public $result;


    public function __construct($amount=0)
    {
        $this->setAmount($amount);

    }

    public function toEuro()
    {
        $this->result = $this->amount / $this->ratio;
        return round($this->result,2);
    }

    public function toBEF()
    {
        $this->result = $this->amount * $this->ratio;
        return round($this->result,2);
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }



}