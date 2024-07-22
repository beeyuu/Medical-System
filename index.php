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
                        <button class="tab active" onclick="Action(event, 'SignUp')">Sign Up</button>
                        <button class="tab" onclick="Action(event, 'SignIn')">Sign In</button>
                    </div>
                    <div id="SignUp" class="SignUp">
                        <form action="login.php" method="POST">
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
                    </div>
                    <div id="SignIn" class="SignIn" style="display:none">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="email-signin">Email</label>
                                <input type="email" id="email-signin" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password-signin">Password</label>
                                <input type="password" id="password-signin" name="password" placeholder="Password">
                            </div>
                            <button type="submit" name="signin">Sign In</button>
                        </form>
                    </div>
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
    function Action(event, cityName) {
        var i;
        var tabs = document.getElementsByClassName("tab");
        for (i = 0; i < tabs.length; i++) {
            tabs[i].classList.remove("active");
        }
        event.currentTarget.classList.add("active");

        var x = document.getElementsByClassName("SignUp");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x = document.getElementsByClassName("SignIn");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>
</html>
