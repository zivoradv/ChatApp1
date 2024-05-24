<?php
$con = mysqli_connect("localhost:4307", "root", "", "myChat");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = "SELECT * FROM users";
$run_user = mysqli_query($con, $user);

if (!$run_user) {
    die("Query failed: " . mysqli_error($con));
}

while ($row_user = mysqli_fetch_array($run_user)) {
    $user_id = $row_user['user_id'];
    $user_name = $row_user['user_name'];
    $user_profile = $row_user['user_profile'];
    $login = $row_user['log_in'];

    echo "
        <li>
            <div class='chat-left-img'>
                <img src='$user_profile' alt='Profile Picture'>
            </div>
            <div class='chat-left-details'>
                <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";

    if ($login == 'Online') {
        echo "<span><i class='fa fa-circle' aria-hidden='true'></i>Online</span>";
    } else {
        echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";
    }

    echo "
            </div>
        </li>
    ";
}
?>
