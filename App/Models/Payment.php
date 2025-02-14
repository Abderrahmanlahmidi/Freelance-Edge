<?php

class Payment
{

    private int $id;
    private int $budget;
    private int $PaymentDate;
    private Project $projectName;

    public function __construct()
    {
    }

    public function getId(): int{
        return $this->id;
    }

    public function setBudget(int $budget){
        $this->budget = $budget;
    }

    public function getBudget(): int{
        return $this->budget;
    }

    public function setPaymentDate(int $PaymentDate){
        $this->PaymentDate = $PaymentDate;
    }
    public function getPaymentDate(): int{
        return $this->PaymentDate;
    }

    public function setProjectName(int $ProjectName){
        $this->projectName = $ProjectName;
    }

    public function getProjectName(){
        return $this -> projectName;
    }

    public function createPayment(){

    }

    public function cancelPayment(){}


}