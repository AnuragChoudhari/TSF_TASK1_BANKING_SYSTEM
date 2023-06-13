<?php include './include/conn.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link href="http://localhost/TSF_TASK1/css/index.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="icon.ico">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #contact_us_container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: auto;
            width: 100%;
        }

        form {
            width: 50%;
        }   

        nav{
            margin: 40px;
        }


        footer{
    position: relative;

    color: rgba(0,0,0,0.8);   
    bottom: 20px;

}

footer h3{
    font-weight: 100;
    font-size: 14px;
    margin: 0;
}

#footer_links{
    display: flex;
    
    justify-content: center;
    align-items: center;
    margin: 5px;
}

#footer_links a{
    font-size: 24px;
    padding: 5px;
    transition: .4s ease-in-out;
    color: black;
}

#footer_links a:hover{
    transform: scale(1.5) rotate(360deg);
    filter: drop-shadow(2px 0px 10px rgba(244, 244, 244,0.5));
}

#footers{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
        

    </style>
</head>

<body>


<nav>
        <div class="logo">
            <img src="http://localhost/TSF_TASK1/logo.png" alt="" height="40px" width="40px">
        </div>
        <ul>
            <li><a href="home.html">Home</a></li> |
            <li><a href="about.html">About Us</a></li> |
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>



    <div id="contact_us_container">

        
        <div id="form_header" class="ui header">
            Contact Us
        </div>

        <form class="ui form" action="" method="post">
            <div class="ui field required" >
                <label>Full name</label>
                <input required type="text" name="full_name" placeholder="Enter your full name">
            </div>
            <div class="ui field required">
                <label>Email</label>
                <input required type="email" name="email" placeholder="Email">
            </div>
            <div class="ui field required">
                <label>Inquiry Details/Message</label>
                <textarea name="msg" max=10 required></textarea>
            </div>
            <div class="ui field required">
                <div class="ui checkbox">
                    <input required type="checkbox" tabindex="0">
                    <label>I agree to the Terms and Conditions</label>
                </div>
            </div>
            <button class="ui button" type="submit" name="sb_btn">Submit</button>
        </form>



    </div>
         <footer>
            <div id="footers">
                <div id="footer_links">
                    <a href="https://www.linkedin.com/in/anurag-choudhari-b3a35320a/"><i class="ui linkedin icon"></i></a>
                    <a href="https://www.youtube.com/@aceditsofficial9299"><i class="ui youtube icon"></i></a>
                    <a href="https://www.behance.net/17anurchoudha"><i class="ui behance icon"></i></a>
                </div>
                <h3>&copy; 2023 Created by Anurag Choudhri. All rights reserved.</h3>
        </div>
        </footer>
</body>

</html>

<?php
    if(isset($_POST['sb_btn'])){
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        $sql = "INSERT INTO inquiries VALUES ('','$full_name','$email','$msg')";

        $res = mysqli_query($conn,$sql);
        
        if($res){
            echo "<script>Swal.fire(
                'Form Submitted Successfully!',
                'Your response has been recorded.',
                'success'
              )</script>";
            echo "<script>setTimeout(function(){ window.location.href = '" . $_SERVER['PHP_SELF'] . "'; }, 4000);</script>";
        }
        
    }
?>