<?php
$errorMSG = "";
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
$EmailTo = "kontakt@domki-korem.pl";
$Subject = "Wiadomosc ze strony Domki Korem";
// prepare email body text
$Body = "";
$Body .= "Imie: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email nadawcy: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Tresc wiadomosci: ";
$Body .= $message;
$Body .= "\n";
// send email
$success = mail($EmailTo, $Subject, $Body, "Od:".$email);
// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
