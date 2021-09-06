<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script src="jQuerry.min.js"></script>
    <title>Login page</title>



</head>

<body>
    <section>
        <!-- If this page is loaded from validateRegister.php then page is loaded to display registration form -->
        <div class="container w3-display-topmiddle ">

            <!-- Login -->
            <div class="user signInBox w3-row">
                <div class="imgBox w3-half">
                    <img src="images\keyhole.jpg" alt="Sign in picture">
                </div>

                <div class="formBox w3-half ">
                    <form id="loginFrom">
                        <h1>Sign in</h1>
                        <input type="text" placeholder="Username" id="loginUsername">
                        <input type="password" placeholder="Password" id="loginPassword">
                        <input type="submit" value="Login">

                        <!-- Display error if there is a registration failure -->
                        <small id="logingErrMsg"></small>

                        <p class="switch">Don't have an account yet? <a href="#" class="goToSingUp" onclick="toggleForm();">Create one.</a></p>
                    </form>
                </div>
            </div>

            <!-- Registration -->
            <div class="user signUpBox w3-row">

                <div class="formBox w3-half ">
                    <!-- action="validateRegister.php" method="POST" -->
                    <form id="registrationFrom">
                        <h1>Create an account</h1>
                        <input type="text" placeholder="First and last name" id="regUser" required>
                        <input type="text" placeholder="Username" id="regUsername" required>
                        <span id="available" style="margin-left: 20px;"></span>
                        <input type="email" placeholder="Email" id="regEmail" required>
                        <input type="password" placeholder="Password" id="regPassword1" required>
                        <input type="password" placeholder="Confirm password" id="regPassword2" required>
                        <input type="submit" value="Sign up" id="signUpBtn">

                        <!-- Display error if there is a registration failure -->
                        <small id="regErrMsg"></small>

                        <p class="switch">Already have an account? <a href="#" class="goToSingIn" onclick="toggleForm();">Sign in.</a></p>
                    </form>
                </div>

                <div class="imgBox w3-half">
                    <img src="images\key.jpg" alt="Sign in picture">
                </div>

            </div>

        </div>
    </section>



    <script>
        // adds/removes 'active' class from container div
        function toggleForm() {
            section = document.querySelector('section');
            container = document.querySelector('.container');
            container.classList.toggle('active');
            section.classList.toggle('active');
        }


        const registrationForm = document.getElementById("registrationFrom");
        const regUser = document.getElementById("regUser");
        const regUsername = document.getElementById("regUsername");
        const regEmail = document.getElementById("regEmail");
        const regPassword1 = document.getElementById("regPassword1");
        const regPassword2 = document.getElementById("regPassword2");
        const regErrMsg = document.getElementById("regErrMsg");


        // Validate registration
        registrationForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // reset the error message and all the red borders
            regErrMsg.innerHTML = "";
            inputs = document.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                inputs[index].style.border = "none";
            }

            // go to validateRegister.php
            $.ajax({
                url: "validateRegister.php",
                type: "POST",
                data: {
                    user: regUser.value,
                    username: regUsername.value,
                    email: regEmail.value,
                    password1: regPassword1.value,
                    password2: regPassword2.value
                },
                success: function(returnedData) {
                    if (returnedData == "emptyUser") {
                        regErrMsg.innerHTML = "You must enter your name!";
                        regUser.style.border = "2px solid red";

                    }
                    if (returnedData == "wrongUsername") {
                        regErrMsg.innerHTML = "Username must be at least 6 characters long";
                        regUsername.style.border = "2px solid red";

                    }
                    if (returnedData == "wrongEmail") {
                        regErrMsg.innerHTML = "Enter a valid email";
                        regEmail.style.border = "2px solid red";

                    }
                    if (returnedData == "shortPassword") {
                        regErrMsg.innerHTML = "Password must be at least 8 characters long";
                        regPassword1.style.border = "2px solid red";
                    }
                    if (returnedData == "matchingPassword") {
                        regErrMsg.innerHTML = "Your passwords do not match";
                        regPassword1.style.border = "2px solid red";
                        regPassword2.style.border = "2px solid red";
                    }
                    if(returnedData == "Username taken"){
                        regErrMsg.innerHTML = "Username is taken";
                        regUsername.style.border = "2px solid red";
                    }
                    if (returnedData == "User added") {
                        window.location="mainPage.php";
                    }
                    if (returnedData == "Error!") {
                        alert("Error while validating registration!");
                    }
                },
                async: false
            });

        });


        // Validate login
        const loginFrom = document.getElementById("loginFrom");
        const loginUsername = document.getElementById("loginUsername");
        const loginPassword = document.getElementById("loginPassword");
        const logingErrMsg = document.getElementById("logingErrMsg");

        loginFrom.addEventListener('submit', (e) => {
            e.preventDefault();

            logingErrMsg.innerHTML = "";
            inputs = document.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                inputs[index].style.border = "none";
            }

            $.ajax({
                url: "validateLogin.php",
                type: "POST",
                data: {
                    username: loginUsername.value,
                    password: loginPassword.value

                },
                success: function(returnedData) {
                    if (returnedData == "No such user") {
                        logingErrMsg.innerHTML = "No such user";
                    }
                    if(returnedData == "Login successful"){
                        window.location="mainPage.php";
                    }
                    if (returnedData == "Error!") {
                        alert("Error while validating Login!");
                    }
                },
                async: false
            });

        });


        // check if username is aveliable
        const signUpBtn = document.getElementById("signUpBtn"); 
        let timeout = null;
        $(document).on("keyup", "#regUsername", function(){
            
            //get username from input
            let regusername = $(this).val();
            // reset timer
            clearTimeout(timeout);

            if(regusername.length == 0){
                $("#available").text("");
                return false; // dont do ajax request
            }

            // ever 1 second do the ajax request 
            timeout = setTimeout(function(){
                $.ajax({
                        url: "ajax_checkUsername.php",
                        type: "POST",
                        data:{
                            username: regusername
                        },
                        success: function(data){
                            if(data == true){
                                // username available
                                $("#available").text("Available");
                                $("#available").css("color", "green");

                            }else{
                                // username unavailable
                                $("#available").text("Unavailable");
                                $("#available").css("color", "red");
                                signUpBtn.disabled = true;
                                signUpBtn.style.color = "#48584b"
                            }
                        }
                });
                }, 1000);
            

        });
    </script>



</body>

</html>