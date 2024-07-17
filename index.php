<?php require 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Health System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="grid">
            <div class="left">
                <div class="title">
                    <p>ZaRy Medical Center</p>
                </div>
                <div class="image">
                    
                </div>
            </div>
            <div class="right">
                <div class="logo">
                    <img src="logo.png" alt="PEACI">
                </div>
                <div class="form-container">
                    <div class="tabs">
                        <button class="tab active">Sign Up</button>
                        <button class="tab ">Sign In</button>
                    </div>
                    <form action="dashboard.php" method="POST">
                        <div class="form-group">
                            <label for="full-name">Full Name</label>
                            <input type="text" id="full-name" name="fullName" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" name="signup">Sign Up</button>
                    </form> 
                    <div class="footer">
                
                        <div class="contact">
                            <p>1234567</p>
                            <p>betlog.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        // AJAX for form submission
        $('#signupForm').on('submit', function(e){
            e.preventDefault(); // Prevent default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: 'dashboard.php', // Backend PHP script
                data: formData,
                success: function(response){
                    // Handle success response
                    alert(response); // Alert success message (you can customize this)
                    // Optionally redirect to another page
                    // window.location.href = 'success.php';
                },
                error: function(xhr, status, error){
                    // Handle error
                    console.error('AJAX error:', status, error);
                    alert('Error occurred. Please try again.'); // Alert error message
                }
            });
        });
    });
    </script>
</html>
