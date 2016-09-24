<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 24/09/16
 * Time: 17:18
 */

namespace CLASSES;


class BMI
{
    public $length;
    public $weigth;
    private $bmi;
    private $result;


    public function __construct($length, $weigth)
    {
       $this->length = $length;
       $this->weigth = $weigth;
    }

    public function result()
    {
        $this->length = $this->length /100;
        $this->bmi = $this->weigth / pow($this->length,2);
        $this->bmi = round($this->bmi,2);

        return $this->bmi;
    }

    public function feedback()
    {
        if ($this->bmi < 18.5) {
            $this->result = 'Underweight';
        } elseif ($this->bmi < 25) {
            $this->result = 'Normal weight';
        } elseif ($this->bmi < 30) {
            $this->result = 'Overweight';
        } else {
            $this->result = 'Serious overweight';
        }
        return $this->result;
    }


}