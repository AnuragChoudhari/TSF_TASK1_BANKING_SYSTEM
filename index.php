<?php include './include/conn.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link href="http://localhost/TSF_TASK1/css/index.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="icon" type="image/x-icon" href="icon.ico">


</head>

<body>

    <div class="ui container" id="main_container">
     <nav>
        <div class="logo">
            <img src="http://localhost/TSF_TASK1/logo.png" alt="" height="40px" width="40px">
        </div>
            <ul>
                <li><a href="home.html">Home</a></li> |
                <li><a href="about.html">About Us</a></li> |
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>    



        <div class="ui container" id="buttons_container">
            <button class="ui green button " id="openModalButton" style="margin-bottom: 20px" ><i class="ui money bill alternate outline icon"></i>Transfer Money</button>
            <button class="ui primary button " id="openModalButton2" style="margin-bottom: 20px"><i class="ui address book outline icon"></i>View Transactions</button>
        </div>

        <!-- Start modal -->
        <!-- Modal Structure -->
        <div class="ui tiny modal" id="myModal">
            <i class="close icon"></i>
            <div class="header">
                <h1 class="ui blue header">Transfer Money </h1>
            </div>
            <div class="content">
                <h3>Select the sender and recipient</h3>

                <h4>Sender</h4>
                <form action="" method="post">
                    <select required class="ui dropdown" id="sender_name" name="sender_name" onchange="disableRecipient()">
                        <option value="">Sender Name</option>
                        <?php
                        // Retrieve the list of ingredients from the database
                        $sql2 = "SELECT * FROM customers";
                        $result = mysqli_query($conn, $sql2);
                        while ($row1 = mysqli_fetch_assoc($result)) {
                            // Generate an option tag for each ingredient
                            echo "<option value=\"" . $row1['cust_name'] . "\">" . ucwords($row1['cust_name']) . "</option>";
                        }
                        ?>
                    </select>

                    <h4>Recipient</h4>
                    <form action="" method="post">
                    <select required class="ui dropdown" id="recipient_name" name="recipient_name">
                        <option value="">Recipient Name</option>
                        <?php
                        // Retrieve the list of ingredients from the database
                        $sql2 = "SELECT * FROM customers";
                        $result = mysqli_query($conn, $sql2);
                        while ($row1 = mysqli_fetch_assoc($result)) {
                            // Generate an option tag for each ingredient
                            echo "<option value=\"" . $row1['cust_name'] . "\">" . ucwords($row1['cust_name']) . "</option>";
                        }
                        ?>
                    </select>


                    <h3>Enter amount</h3>

                    <div class="ui input">
                        <input type="number" placeholder="Enter value in digits" name="amount" id="amount" min=0 max=10000 required>
                    </div>
            </div>
            <div class="actions">
                <div class="ui negative button">Cancel</div>
                <input type="submit" class="ui positive button" name="send_amt" value="Send" onclick="transferAmt()"></input>
            </div>
        </div>
        </form>
        <!-- End Modal  -->


        <!-- Start View Transaction Modal  -->

        <div class="ui modal" id="myModal2">
            <i class="close icon"></i>
            <div class="header">
                <h1 class=""><i class="ui book icon"></i>Transactions Log</h1>
            </div>
            <div class="content">

                <div class="ui container" id="table_container">

                    <table class="ui celled table">
                        <thead>
                            <tr>
                                <th>Transaction Id</th>
                                <th>Transaction Date</th>
                                <th>Transaction Time</th>
                                <th>Transaction Info</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM transfers";

                            $res = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['transaction_id'] ?></td>
                                    <td><?php echo $row['transaction_date'] ?></td>
                                    <td><?php echo $row['transaction_time'] ?></td>
                                    <td><?php echo $row['transaction_data'] ?></td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
     
    </div>
    </form>

    <!-- End View Transaction Modal -->

    <!-- Start Customer Table -->

    <div class="ui container" id="table_container">

        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM customers";

                $res = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td><?php echo $row['cust_id'] ?></td>
                        <td><?php echo $row['cust_name'] ?></td>
                        <td><?php echo $row['cust_email'] ?></td>
                        <td><?php echo "$" . $row['cust_balance'] ?></td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>

    </div>
        <footer>
                <h3>&copy; 2023 Created by Anurag Choudhri. All rights reserved.</h3>
         
            </footer>

    </div>
    <!-- End Customer Table -->
    
 
    
    <script>
        // Initialize the modal
        $('#openModalButton').click(function() {

            $('#myModal').modal({
                    closable: false,

                    onApprove: function() {

                       
                        return false;
                    }
                })
                .modal('show')
        });

        $('#openModalButton2').click(function() {

            $('#myModal2').modal({

                })
                .modal('show')
        });
    
    </script>
    
    <!-- Disable the same option values -->
    <script>
    function disableRecipient() {
    let senderSelect = document.getElementById('sender_name');
    let recipientSelect = document.getElementById('recipient_name');
    let selectedSender = senderSelect.value;

    for (let i = 0; i < recipientSelect.options.length; i++) {
        let option = recipientSelect.options[i];

        // Enable all options initially
        option.disabled = false;

        // Disable the option if it matches the selectedSender value
        if (option.value === selectedSender) {
            option.disabled = true;
        }
    }
}

</script>

</body>

</html>


<?php

if (isset($_POST['send_amt'])) {
    $sender_name = $_POST['sender_name'];
    $recipient_name = $_POST['recipient_name'];
    $amount = $_POST['amount'];
    $transactionID = uniqid('tid_');
    // echo "<script>console.log('$user_id, $amount');</script>";


    $recieve_amt = "UPDATE customers SET cust_balance = cust_balance + $amount WHERE cust_name = '$recipient_name';";
    $deduct_amt = "UPDATE customers SET cust_balance = cust_balance - $amount WHERE cust_name = '$sender_name';";
    $insert_transaction_details = "INSERT INTO transfers (transaction_id, transaction_data) VALUES ('$transactionID', '$sender_name sent $$amount to $recipient_name')";

    $recieve_amt_query = mysqli_query($conn, $recieve_amt);
    $deduct_amt_query = mysqli_query($conn, $deduct_amt);
   

    $insert_transaction_details_query = mysqli_query($conn, $insert_transaction_details);

    if ($recieve_amt_query && $deduct_amt_query && $insert_transaction_details_query) {
        echo "<script>Swal.fire(
            'Transaction Completed!',
            '<b>$$amount</b> Sent to $recipient_name successfully through $sender_name.',
            'success'
          )</script>";
        echo "<script>setTimeout(function(){ window.location.href = '" . $_SERVER['PHP_SELF'] . "'; }, 4000);</script>";
    } else {
        echo "Update failed: " . mysqli_error($conn);
        
    }
    
    
}

?>