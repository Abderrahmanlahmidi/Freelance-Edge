<?php
require_once basePath("App/Models/Test.php");

class TestController{
    private $testModel;
    public function getTestController(){
        $this->testModel = new Test();
        $tests = $this->testModel->getTest();
        require basePath("App/Views/testView.php");
    }


}

$testController = new TestController();
$testController->getTestController();