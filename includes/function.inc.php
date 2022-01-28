<?php

function createUser($conn, $user_username,$user_pass,$user_type)
{
    $sql = "INSERT INTO user (user_username, user_pass, user_type) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        echo "Failed";
        exit();
    }
    else
    {
        $_SESSION['status'] = "User Successful Create!";
        header('Location: ../createuser.php');
    }
    
    mysqli_stmt_bind_param($stmt, "sss", $user_username,$user_pass,$user_type);
    mysqli_stmt_execute($stmt);

}

