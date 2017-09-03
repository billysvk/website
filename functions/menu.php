<?php
$serverName = 'DESKTOP-IQAL01N';
$connectionInfo=array('Database' => 'calendar');
global $con;
$con = sqlsrv_connect($serverName, $connectionInfo);
	function get_menu ()
	{
		global $con;

		$sql = "SELECT id, name FROM menu ORDER BY position";
		$result = sqlsrv_query ( $con,$sql );

		$rows = array ();
		while ( $row = sqlsrv_fetch_array ( $result ) )
		{
			$rows [] = $row;
		} // end while

		return $rows;
	} // end function get_menu

	function get_page ( $id )
	{
		global $con;

		$sql = "SELECT title, content FROM menu WHERE id = ".$id;
		$result = sqlsrv_query ( $con, $sql);

		$row = array ();
		if ( sqlsrv_num_rows ( $result ) > 0 )
		{
			$row = sqlsrv_fetch_array ( $result );
		} // end if

		return $row;
	} // end function get_page

	function get_all_data_for_this_lab($labId, $dateSelected,$temp)
	{
		global $con;
		$row = array ();
        $intLabId = (int)$labId;
        $rowTemp = array ();
		$sql = "SELECT * FROM event_calendar WHERE labId = $intLabId AND event_date = '$dateSelected'";
		$result = sqlsrv_query ( $con, $sql);

		while( $rowTemp = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
         $row[] = $rowTemp;
        }  

        if(!$row){

				$resultsNULL = "true";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }else {
        	    $resultsNULL = "false";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }


        if($temp == "true") {
			$boxesThatShouldBeClosed = array();
			 foreach($row as $templab) {
              //echo "test";
                 for($i=1; $i<7;$i++){
                   if ($templab["h_".$i] == 1 ) {
                     $boxesThatShouldBeClosed[$i-1] = 1;
                   }
                 }
               }
          if($boxesThatShouldBeClosed){
          	if( isset($boxesThatShouldBeClosed[0]) ) {
    			  $h_1 = $boxesThatShouldBeClosed[0];
			}else{
 				  $h_1 = 0;
			}
			if( isset($boxesThatShouldBeClosed[1]) ) {
    			  $h_2 = $boxesThatShouldBeClosed[1];
			}else{
 				  $h_2 = 0;
			}
			if( isset($boxesThatShouldBeClosed[2]) ) {
    			  $h_3 = $boxesThatShouldBeClosed[2];
			}else{
 				  $h_3 = 0;
			}
			if( isset($boxesThatShouldBeClosed[3]) ) {
    			  $h_4 = $boxesThatShouldBeClosed[3];
			}else{
 				  $h_4 = 0;
			}
			if( isset($boxesThatShouldBeClosed[4]) ) {
    			  $h_5 = $boxesThatShouldBeClosed[4];
			}else{
 				  $h_5 = 0;
			}
			if( isset($boxesThatShouldBeClosed[5]) ) {
    			  $h_6 = $boxesThatShouldBeClosed[5];
			}else{
 				  $h_6 = 0;
			}
          }
               return $boxesThatShouldBeClosed;
        }
        	
        
        if($temp == "false"){
        	$temparray = array("0","0","0","0","0","0");
        	$_SESSION['h_1'] = $temparray[0];
        	$_SESSION['h_2'] = $temparray[1];
        	$_SESSION['h_3'] = $temparray[2];
        	$_SESSION['h_4'] = $temparray[3];
        	$_SESSION['h_5'] = $temparray[4];
        	$_SESSION['h_6'] = $temparray[5];
        	return $temparray;
        }
        if($temp == "dontCheck") {
        	  if(!$row){

				$resultsNULL = "true";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }else {
        	    $resultsNULL = "false";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }
        }
	    //$row = sqlsrv_fetch_array ( $result );
		return $row;
	}

	function add_event_for_this_lab($data)
	{
		global $con;
		$row = array ();
        $intLabId = (int)$data ['labId'];
        $uid = (int)$data ['uid'];
        // exw kai to urole
        $sql = "INSERT INTO event_calendar (labId,event_date,Title,description,h_1,h_2,h_3,h_4,h_5,h_6,status, UserId, UserRole) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$params = array($intLabId, $data ['event_date'],$data ['Title'],$data ['description'], $data ['h_1'],$data ['h_2'],$data ['h_3'],$data ['h_4'],$data ['h_5'],$data ['h_6'],$data ['status'], $uid, $data ['urole']);
		$stmt = sqlsrv_query( $con, $sql, $params);
	}

	function check_if_data_exists($labId, $dateSelected)
	{
		global $con;
		$row = array ();
        $intLabId = (int)$labId;

		$sql = "SELECT * FROM event_calendar WHERE labId = $intLabId AND event_date = '$dateSelected'";
		$result = sqlsrv_query ( $con, $sql);

		while( $rowTemp = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
         $row[] = $rowTemp;
        }  

        if(!$row){

				$resultsNULL = "true";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }else {
        	    $resultsNULL = "false";
				$_SESSION['resultsNULLTrue'] = $resultsNULL;
				//header("Location: ../labs/labpage.php");
        }

		return null;
	}

	function get_my_events($UserId) {
		global $con;
		$row = array ();
  		$UserIdInt = (string)$UserId;
		$sql = "SELECT * FROM event_calendar WHERE UserId = ".$UserIdInt;
		$result = sqlsrv_query ( $con, $sql);
		
	   while( $rowTemp = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
         $row[] = $rowTemp;
        }  
		return $row;

	}
?>