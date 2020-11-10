<?php

    require_once 'db.php';
    require_once 'util.php';
    $db = new Database;
    $util = new Util;

    // Handle add new user
    if(isset($_POST['add'])){
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);

        if($db->insert($fname, $lname, $email, $phone)) {
            echo $util->showMessage('success', 'User inserted successfully');
        }else{
            echo $util->showMessage('danger', 'User inserted error');
        }

    }

    // Handle fetch all users
    if(isset($_GET['read'])) {
        $users = $db->read();
        $output = '';
        if($users) {
            foreach ($users as $row) {
                $output .= '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['first_name'].'</td>
                <td>'.$row['last_name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['phone'].'</td>
                <td>
                    <a href="#" id="'.$row['id'].'" class="btn btn-success btn-sm rounded-pill py-0">Edit</a>
                    <a href="#" id="'.$row['id'].'" class="btn btn-danger btn-sm rounded-pill py-0">Delete</a>
                </td>
            </tr>';
            }
            echo $output;
        }else{
            echo '<tr>
            <td colspan="6">No Users Found</td>
            </tr>';
        }
    }

?>