<?php
header('Content-Type: application/json');
$data=json_decode(file_get_contents('php://input'),true);
if(!$data || !isset($data['peer_id'],$data['slot_id'],$data['email'])){
    echo json_encode(['success'=>false,'message'=>'Invalid data']); exit;
}
$peer_id=(int)$data['peer_id'];
$slot_id=(int)$data['slot_id'];
$email=htmlspecialchars($data['email']);

$servername="localhost";
$username="root";
$password=""; 
$dbname="safespaceforum";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error) die(json_encode(['success'=>false,'message'=>'DB connection failed']));

$check_sql="SELECT available FROM slots WHERE id=$slot_id AND peer_id=$peer_id";
$res=$conn->query($check_sql);
if($res->num_rows==0){ echo json_encode(['success'=>false,'message'=>'Slot not found']); $conn->close(); exit;}
$row=$res->fetch_assoc();
if($row['available']==0){ echo json_encode(['success'=>false,'message'=>'Slot not available']); $conn->close(); exit;}

$insert_sql="INSERT INTO bookings (peer_id,slot_id,booked_by_email) VALUES ($peer_id,$slot_id,'$email')";
if($conn->query($insert_sql)===TRUE){
    $conn->query("UPDATE slots SET available=0 WHERE id=$slot_id");
    echo json_encode(['success'=>true]);
}else{
    echo json_encode(['success'=>false,'message'=>'Failed to book']);
}
$conn->close();
?>
