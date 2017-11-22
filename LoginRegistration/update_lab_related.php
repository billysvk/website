<?php
include ( "../cms/functions/menu.php" );

if ( isset ( $_POST ['action'] ) )
{
    switch ( $_POST ['action'] )
    {
        case "add": // Περίπτωση προσθήκης εγγραφής

            $data ['event_id'] =  (int) $_POST ['id'] ; // Αν πρόκειται για αλφαριθμητικό, χρησιμοποιούμε την mysql_real_escape_string
            $data ['labId'] =  (int) $_POST ['labId']; // Αν θέλουμε ακέραια τιμή, χρησιμοποιούμε την (int)
            $data ['title'] =  $_POST ['title'] ;
            $data ['comment'] =  $_POST ['comment'] ;

            add_lab_info ( $data );
            break;

        case "update": // Περίπτωση επεξεργασίας εγγραφής
            $data ['event_id'] =  $_POST ['id'];
            $data ['labId'] =  $_POST ['labId'] ;
            $data ['title'] =  $_POST ['title'];
            $data ['comment'] =  $_POST ['comment'] ;

            update_lab_info ( $data );
            break;

    } // end switch
    $whereToGo = (int) $_POST['id'];
    header ( "location:application_edit.php?id=$whereToGo" ); // Ο χρήστης κατευθύνεται πάλι στη λίστα με τις εγγραφές
} // end if
?>