<?php
// session_start();
// if (isset($_SESSION['username'])) {
// $username = $_SESSION['username'];
// } else {
// echo "You have not signed in";
// }
?>

<?php
// Deze code is NIET werkend! <--- Ik heb hulp nodig hierbij, ik kan het ook niet echt testen aangezien het de~
// ~gegevens van de user veranderd. En ik ben natuurlijk niet inglogd.
include("connect.php");


if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $postcode  = $_POST['postcode'];
    $street_number  = $_POST['street_number'];
    $street  = $_POST['street'];
    $plaats = $_POST['woonplaats'];
    //Check if content is present
    if(!empty($username)  && !empty($password) && !empty($email) && !empty($phone) && !empty($postcode)
    && !empty($street_number) && !empty($street) && !empty($plaats)){
        //Update DB
        $q = mysql_query("UPDATE users SET username='$username', password='$password', email='$email', phone='$phone',
          postcode='$postcode', street_number='$street_number', street='$street', plaats='$straat' WHERE username='$username' LIMIT 1");
        //Create Debug Message
        if(!$q){
            die("Failed to update database check query string or input values.");
        }
        //If query is good, head back to desired page.
        header("profile.php");
        exit;
    }else{
        //Create Empty Error Message
        $error = "Error! No Changes Made";
    }
}
?>

<table border = 1 >
<form action=" " method="post">
    <tr><td>Username:</td><td> <input type="text" name="username"></td></tr><br />
    <tr><td>Password:</td><td> <input type="text" name="firstname"></td></tr><br />
    <tr><td>Email:</td><td> <input type="text" name="email"></td></tr><br />
    <tr><td>Phone:</td><td> <input type="text" name="phone"></td></tr><br />
    <tr><td>Postcode:</td><td> <input type="text" name="postcode"></td></tr><br />
    <tr><td>Street Number:</td><td> <input type="text" name="street_number"></td></tr><br />
    <tr><td>Street:</td><td> <input type="text" name="street"></td></tr><br />
    <tr><td>Plaats:</td><td> <input type="text" name="plaats"></td></tr><br />
</table><table>
    <td><input type="button" name="edit" value="Verander"></td>
    <td><a href="profiel.php"><input type = "button" name = 'cancel' value = 'Annuleren' ></td>
    </table>
</form>

    <?php if(isset($error) != NULL):?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
