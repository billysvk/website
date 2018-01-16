<?php
session_start();
if (isset($_SESSION['UserId'])) {
$uid = $_SESSION['UserId'];
//echo $uid;
}
if (isset($_SESSION['urole'])) {
$urole = $_SESSION['urole'];
//echo $uid;
}
global $dateChecked;
global $dateSelected;
$dateSelected = false;
if (isset($_POST["p_name"])) {
$dateChecked = $_POST["p_name"];
$dateSelected = true;
}
?>
<?php
include('../cms/functions/menu.php');
include('../functions/menu.php');

$resultsNULL = "null";
//global $resultsNULL;
global $addNewEventClicked;
$addNewEventClicked = false;
//$resultsNULL = "null";
global $dataForThisLab;

$dataForThisLab = array();
$boxesThatShouldBeClosed = array();

$var = $_GET['id']; // LabID
$labs = array();
$labs = get_labs();
$lab = null;
?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>

<body>

<form action="SubscribeActionsPage.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Εγγραφή στο μάθημα</h1>
    <p>Φόρμα δήλωσης ενδιαφέροντος</p>
    <hr>

    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label><b>Ονοματεπώνυμο</b></label>
    <input type="text" placeholder="Ονοματεπώνυμο" name="name" required>

    <label><b>Αριθμός Μητρώου</b></label>
    <input type="text" placeholder="Αριθμός Μητρώου" name="unic" required>

    <div class="clearfix">
      <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
      <input type="hidden" name="labId" value="<?php echo $var; ?>" />
      <button value="cancel" name='cancel' type="submit" class="cancelbtn">Επιστροφή</button>
      <button value="submit" name='submit' type="submit" class="signupbtn">Εγγραφή</button>
    </div>
  </div>
</form>

</body>
</html>
