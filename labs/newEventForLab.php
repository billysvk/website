<?php
	include ( "../functions/menu.php" );

	if ( isset ( $_POST ['labId'] ) )
	{
				$data ['event_date'] = $_POST ['event_date'];
				$data ['Title'] =  $_POST ['Title']; // Αν πρόκειται για αλφαριθμητικό, χρησιμοποιούμε την mysql_real_escape_string
				$data ['description'] = $_POST ['Description']; // Αν θέλουμε ακέραια τιμή, χρησιμοποιούμε την (int)
				$data ['labId'] =  $_POST ['labId'];
				$data ['uid'] =  $_POST ['uid'];
				$data ['urole'] =  $_POST ['urole'];
				if(!isset($_POST [1])){
					$data ['h_1'] = 0;
				}else{
					$data ['h_1'] = (int)$_POST [1];
				}

				if(!isset($_POST [2])){
					$data ['h_2'] = 0;
				}else{
					$data ['h_2'] = (int)$_POST [2];
				}

				if(!isset($_POST [3])){
					$data ['h_3'] = 0;
				}else{
					$data ['h_3'] =(int)$_POST [3];
				}

				if(!isset($_POST [4])){
					$data ['h_4'] = 0;
				}else{
					$data ['h_4'] = (int)$_POST [4];
				}

				if(!isset($_POST [5])){
					$data ['h_5'] = 0;
				}else{
					$data ['h_5'] = (int)$_POST [5];
				}

				if(!isset($_POST [6])){
					$data ['h_6'] = 0;
				}else{
					$data ['h_6'] = (int)$_POST [6];
				}
				
				$data ['status'] =  0;

				
				add_event_for_this_lab($data);
echo '<script language="javascript">';
echo 'alert("Event successfully submitted!")';
echo '</script>';
		header ( "location:labpage.php?id=".$data ['labId']."" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
	} // end if
?>