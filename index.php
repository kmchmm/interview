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
    <section class="crud-section">
        <div id="crudBox">
            <div class="addbutton">
                <input type="button" class="btn btn-lg btn-primary add-button" value="Add Applicants">
            </div>

            <!------------------------------------->
            <!-------------ADD MODAL--------------->
            <!------------------------------------->
            <div id="modal" class="modal">
                <div class="modal-content">
                    <div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1>Add Applicants</h1>
                    </div>
                    <div>
                        <form action="actions.php" method="POST" class="add-form" enctype="multipart/form-data">
                            <div class="d-flex justify-content-between">
                                <div class="add-modal-column">
                                    <label>First Name</label>
                                    <input type="text" placeholder="Enter First Name" name="first_name" required>
                                </div>
                                <div class="add-modal-column">
                                    <label>Middle Name</label>
                                    <input type="text" placeholder="Enter Middle Name" name="middle_name" required>
                                </div>
                                <div class="add-modal-column">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Enter Last Name" name="last_name" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="add-modal-column">
                                    <label>Birthdate</label>
                                    <input type="date" name="birthdate" required>
                                </div>
                                <div>
                                    <p>Gender</p>
                                    <div class="gender-buttons">
                                        <input type="radio" id="male" name="gender" value="male">
                                        <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="female">
                                        <label for="female">Female</label>
                                    </div>
                                </div>
                                <div class="add-modal-column">
                                    <label>Cellphone Number</label>
                                    <input type="text" placeholder="Enter Cellphone Number" name="cellphone_no" required>
                                </div>
                            </div>

                            <div class="">
                                <div class="add-modal-column">
                                    <label>Address</label>
                                    <input type="text" placeholder="Enter Address" name="address" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" name="save" id="" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "interviewdb");
                    $query = "SELECT * FROM applicant_table";
                    $query_run = mysqli_query($conn, $query);
                ?>
                <table id="applicants">
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Cellphone Number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <tr>
                        <td class="applicant_name" style="display: none;"><?php echo $row['id'] ?></td>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['middle_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['birthdate'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['cellphone_no'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td class="form-buttons d-flex justify-content-center">

                            <!--------------------->
                            <!-----SHOW BUTTON----->
                            <!--------------------->
                            <button class="show-button" id="showBtn" name="show_data" value="<?php echo $row['id'] ?>"><i class='bx bx-low-vision' ></i></button>
                                <div id="myShowModal" class="modal show-modal">
                                    <div class="show_modal_content" style="color: #013237;">
                                        <div class="d-flex justify-content-between">
                                            <h1>Applicant's Information</h1>
                                            <span class="show-close" data-dismiss="modal" aria-label="Close"><a href="index.php" rel="modal:close">&times;</a></span>
                                        </div>
                                        <div class="flex-display flex-space-between show-modal-content-divs">
                                            
                                        </div>
                                    </div>
                                </div>
                            <!--------------------->
                            <!-----EDIT BUTTON----->
                            <!--------------------->
                            <div>
                                <form action="edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                                    <button name="data_edit"><i class='bx bxs-edit'></i></button>
                                </form>
                            </div>


                            <!-------------------->
                            <!---DELETE BUTTON---->
                            <!-------------------->
                            <div>
                                <form action="actions.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                    <button name="data_delete"><i class='bx bxs-trash' ></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    
                    <?php
                            }
                        }

                    ?>
                </table>
            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
    <script>
            $(document).ready(function() {

                $('.show-button').click(function(e) {
                    e.preventDefault();

                    var applicant_name = $(this).closest('tr').find('.applicant_name').text();

                    $.ajax({
                        type: "POST",
                        url: "actions.php",
                        data: {
                            'checking_viewbtn': true,
                            'applicant_id': applicant_name,
                        },
                        success: function(response) {
                            $('.show-modal-content-divs').html(response);
                            $('#myShowModal').modal('show');
                        }
                    });

                });
            });
        </script>
</body>
</html>