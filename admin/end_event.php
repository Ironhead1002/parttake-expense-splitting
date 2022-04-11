<?php
    $data = $_GET["data"];
    $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");

        $event_status = 'ended';

        $End = "UPDATE event set event_status='$event_status' WHERE event_id = $data";
        $con->query($End);
?>
<script>
    alert("Event Ended Successfully!!");
    location.replace('Past_events.php');    
</script>