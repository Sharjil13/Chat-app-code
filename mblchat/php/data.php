<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * FROM message WHERE (incoming_msg_id = {$row['unique_id']} 
             OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
             OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
    } else {
        $result = 'No message aveliable';
    }
    //Triming messages if words are more hen 28
    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
    //Add YOU : if last msg is send by you
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

    //Cheak user is online or not
    ($row['status'] == "offline now") ? $offline = "offline now" : $offline = "";




    $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                <div class="content">
                <img src="php/images/' . $row['img'] . '" alt="">
                <div class="detail">
                    <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                    <p>' . $you . $msg . '</p>
                </div>
                </div>
                <div class="status_dot ' . $offline . '">
                <i class="fa fa-circle"></i>
                </div>
                </a>';
}
?>