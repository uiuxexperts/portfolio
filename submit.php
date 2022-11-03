<?php
include('db.php');
if(isset($_POST) && !empty($_POST) && !empty($_POST['full_name'])){
	 $fullname = $_POST['full_name'];
	 $requirement = $_POST['requirement'];
	 $phone_number = $_POST['phone_number'];
	 $email = $_POST['email'];
	 $sql = "INSERT INTO contact_form (full_name,requirement,phone_number,email)
	 VALUES ('$fullname','$requirement','$phone_number','$email')";
	 if (mysqli_query($conn, $sql)) {
	     $msg = '<table width="100%" border="1">
                    <tr>
                      <td class="column">
                        Name
                      </td>
                      <td class="column">
                        '.$fullname.'
                      </td>
                    </tr>
                    <tr>
                      <td class="column">
                        requirement
                      </td>
                      <td class="column">
                        '.$requirement.';
                      </td>
                    </tr>
                     <tr>
                      <td class="column">
                        Phone
                      </td>
                      <td class="column">
                        '.$phone.'
                      </td>
                    </tr>
                    <tr>
                      <td class="column">
                        Email
                      </td>
                      <td class="column">
                        '.$email.';
                      </td>
                    </tr>';

	 $msg .='</table>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <info@engineersahab.website>' . "\r\n";
	mail($email,"Submit Question",$msg,$headers);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
	exit();
}
?>