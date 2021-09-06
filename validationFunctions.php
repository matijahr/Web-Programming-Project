<?php



function emptyUser($user)
{
    $error = '';
    $user_val = trim($user); // prevention from blank spaces

    //check lenght
    if (strlen($user_val) < 1) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}


function checkUsername($username)
{
    $error = '';
    $user_val = trim($username);

    if (strlen($user_val) < 6) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}


function checkEmail($email)
{
    $error = '';

    //returns true if first parameter satisfies email address
    //FILTER_VALIDATE_EMAIL - https://www.php.net/manual/en/filter.filters.validate.php#118591 (5.8.2021.)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}

function checkPassword($password1,$password2){
    //remove blank spaces
    $password1_val = trim($password1);
    $password2_val = trim($password2);

    if(strlen($password1_val) < 8){
        return "password1 is short";
    }elseif($password1_val != $password2_val){
        return "passwords do not match";
    }
}
