<?php
session_start();

include('connection.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- jquery-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.add-button').click(function(){
                $('#modal').modal({
                    backdrop: 'static'
                });
            }); 
        });
    </script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <section class="crud-section-edit">
        <div id="crudBox">
            <div class="members-edit-container">
                <div class="edit-members-container">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "interviewdb");
                if (isset($_POST['data_edit'])) {
                    $id = $_POST['edit_id'];

                    $query = "SELECT * FROM applicant_table WHERE id = '$id' ";
                    $query_run = mysqli_query($conn, $query);
                    foreach ($query_run as $row) {
                ?>
                    <div class="d-flex justify-content-between edit-heading-part">
                    <h1>Edit Applicant</h1>
                        <a href="index.php" class="">
                            <span class="edit-close"><i class='bx bx-arrow-back'></i></span>
                        </a>
                    </div>
                        <form action="actions.php" method="POST" enctype="multipart/form-data" class="edit-form">
                            <input type="hidden" name="edited_id" value="<?php echo $row['id'] ?>">
                                <div class="">
                                    <div class="add-modal-column">
                                        <label>First Name</label>
                                        <input type="text" placeholder="<?php echo $row['first_name'] ?>" name="first_name" value="<?php echo $row['first_name'] ?>">
                                    </div>
                                    <div class="add-modal-column">
                                        <label>Middle Name</label>
                                        <input type="text" placeholder="<?php echo $row['middle_name'] ?>" name="middle_name" value="<?php echo $row['middle_name'] ?>">
                                    </div>
                                    <div class="add-modal-column">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="<?php echo $row['last_name'] ?>" name="last_name" value="<?php echo $row['last_name'] ?>">
                                    </div>
                                </div>

                                <div class="">
                                    <div class="add-modal-column">
                                        <label>Birthdate</label>
                                        <input type="date" name="birthdate" value="<?php echo $row['birthdate'] ?>">
                                    </div>
                                    <div>
                                        <p>Gender</p>
                                        <div class="gender-buttons d-flex">
                                            <?php

                                            $selectedValue = $row['gender'];
                                                echo '<div><input type="radio" name="gender" value="male" ' . ($selectedValue == "male" ? 'checked' : '') . '> <label>Male</label></div>';
                                                echo '<div><input type="radio" name="gender" value="female" ' . ($selectedValue == "female" ? 'checked' : '') . '> <label>Female</label></div>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="add-modal-column">
                                        <label>Cellphone Number</label>
                                        <input type="text" placeholder="<?php echo $row['cellphone_no'] ?>" name="cellphone_no" value="<?php echo $row['cellphone_no'] ?>">
                                    </div>
                                </div>

                                <div class="">
                                    <div class="add-modal-column">
                                        <label>Address</label>
                                        <input type="text" placeholder="<?php echo $row['address'] ?>" name="address" value="<?php echo $row['address'] ?>">
                                    </div>
                                </div>
                            <div class="d-flex justify-content-end">
                                <button name="update" type="submit">update</button>
                            </div>
                        </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>

</body>
</html>