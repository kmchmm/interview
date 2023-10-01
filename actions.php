<?php
session_start();

include('connection.php');


////////////////////////////
/////////// add ////////////
////////////////////////////
if (isset($_POST['save'])){
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $cellphone_number = $_POST['cellphone_no'];
    $address = $_POST['address'];

    $query =  mysqli_query ($conn, "INSERT INTO applicant_table (first_name,middle_name,last_name,birthdate,gender,cellphone_no,address) VALUES ('$first_name','$middle_name','$last_name','$birthdate','$gender','$cellphone_number','$address')");
    if ($query) {
        header('Location: index.php');
      } else {
        header('Location: index.php');
      }
}

////////////////////////////
////////// edit ////////////
////////////////////////////

if(isset($_POST['update'])){
    $id = $_POST['edited_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $gender = $_POST['gender'];
    $cellphone_number = $_POST['cellphone_no'];
    $address = $_POST['address'];

    $query =  "UPDATE applicant_table SET first_name = '$first_name',middle_name = '$middle_name',last_name = '$last_name',birthdate = '$birthdate',gender = '$gender',cellphone_no = '$cellphone_number',address = '$address'  WHERE id = '$id'";
    $query_run = mysqli_query($conn,$query);

    header('Location: index.php');
}


//////////////////////////////
/////////// show /////////////
//////////////////////////////


if(isset($_POST['checking_viewbtn'])){
  $m_id = $_POST['applicant_id'];

  $query = "SELECT * FROM applicant_table WHERE id = '$m_id' ";
  $query_run = mysqli_query($conn, $query);

  if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $row){
          echo $return = '

          <div class="show-divs">
              <div class="">

                  <div class="">
                      <div class="show-labels">
                          <span>First Name: </span>
                          <span>'.$row['first_name'].'</span>
                      </div>
                      <div class="show-labels">
                          <span>Middle Name: </span>
                          <span>'.$row['middle_name'].'</span>
                      </div>  
                      <div class="show-labels">
                          <span>Last Name: </span>
                          <span>'.$row['last_name'].'</span>
                      </div>                                                        
                  </div>

                  <div class="">
                      <div class="show-labels">
                          <span>Birthdate: </span>
                          <span>'.$row['birthdate'].'</span>
                      </div>
                      <div class="show-labels">
                          <span>Gender: </span>
                          <span>'.$row['gender'].'</span>
                      </div>
                      <div class="show-labels">
                          <span>Cellphone Number: </span>
                          <span>'.$row['cellphone_no'].'</span>
                      </div>
                  </div>
                  <div>
                  <div class="show-labels">
                      <span>Address: </span>
                      <span class="address">'.$row['address'].'</span>
                  </div>
                  </div>
              </div>
          </div>
          ';
      }
  }
}





//////////////////////////////
////////// delete ////////////
//////////////////////////////

if(isset($_POST['data_delete'])){

    $id = $_POST['delete_id'];    
    
    $query = "DELETE FROM applicant_table WHERE id = '$id'" ; 
    $query_run = mysqli_query($conn,$query);


    if($query_run){
        $_SESSION['success'] = "Data successfully deleted!";
        header("Location: index.php");

    } else {
        $_SESSION['success'] = "Data not deleted!";
        header("Location: index.php");

    }

}
