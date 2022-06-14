<?php

$conn = mysqli_connect('127.0.0.1','mrdesgm_user1','eZNCMGiV7iUg6bBT','mrdesgm_dbdental');
if(!$conn){
    echo "Error! database connection failed.".mysqli_error($conn);
}
?>