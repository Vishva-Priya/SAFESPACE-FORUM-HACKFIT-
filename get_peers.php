<?php
$servername="localhost";
$username="root";
$password="";
$dbname="safespaceforum";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$sql="SELECT * FROM peers";
$result=$conn->query($sql);
$peers=[];
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $slots_sql="SELECT * FROM slots WHERE peer_id=".$row['id'];
        $slots_result=$conn->query($slots_sql);
        $slots=[];
        while($slot=$slots_result->fetch_assoc()) $slots[]=$slot;
        $row['slots']=$slots;
        $peers[]=$row;
    } 
}
$conn->close();
echo json_encode($peers);
?>
