<?php
$FirstSlider = $_POST['Slider1'];
$SecondSlider = $_POST['Slider2'];
$ThirdSlider = $_POST['Slider3'];
$ForthSlider = $_POST['Slider4'];
$FifthSlider = $_POST['Slider5'];
$SixthSlider = $_POST['Slider6'];


$conn = new mysqli('localhost','root','','robots_arm');
if($conn->connect_error){
    die('Connection Failed'.$conn->connect_error);
}else{
    $ArmDataBase = $conn->prepare("insert into arm(Arm1, Arm2, Arm3, Arm4, Arm5, Arm6, Run)
        values(?, ?, ?, ?, ? ,?, ?)");

    $ArmDataBase->bind_param("iiiiiii",$FirstSlider, $SecondSlider, $ThirdSlider, $ForthSlider, $FifthSlider, $SixthSlider, $RunKey);
    $ArmDataBase->execute();
    echo "info Saved";
    $ArmDataBase->close();

    $BaseDataBase = $conn->prepare("insert into Base(ForWard, BackWard, RightSide, LeftSide, Stop, RunBase)
        values(?, ?, ?, ?, ? ,?)");

    $BaseDataBase->bind_param("s",$ForWard, $BackWard, $RightSide, $LeftSide, $Stop, $RunBase);
    $BaseDataBase->execute();
    echo "info Saved";
    $BaseDataBase->close();
    }


    header('Location:https://localhost/SmartMethods/robots_Arm.html');
?>