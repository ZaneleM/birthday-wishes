<?php
include ('header.php')
?>
<body>

<div class="jumbotron text-center">
    <h1>Real M Digital Employees</h1>
    <p>We celebrate your birthday with you</p>
</div>

<div class="container ">
    <div class="row">
        <div class="col-sm-12">
            <h3>happy birthday</h3>

<?php

$api_url = 'https://interview-assessment-1.realmdigital.co.za/employees';
// Read JSON file

$json_data = file_get_contents( $api_url );
//print_r($json_data);

// Decode JSON data into PHP array
$response_data = json_decode( json_encode( $json_data ) );

// All user data exists in 'data' object
$user_data = json_decode( $response_data );

$today = date( "m-d" );
//$today = date( '07-05' );
$birthday = $user_data->dateOfBirth;


$have_started = date( 'Y-m-d' );
foreach ( $user_data as $user ) {
    $birthday = date( $user->dateOfBirth );
    if ( $user->employmentStartDate < $have_started || ( empty( $user->employmentEndDate ) ) ) {
        $my_year  = date( 'Y-m-d' );
        if ( $today == $birthday || $birthday > year_check( $my_year ) ) {
            echo "<br />";
            echo "\n Happy Birthday: " . $user->name . " " . $user->lastname;
            echo "<br />";
            echo "<p style='background: #a5912a; color: '>" . singHappyBirthday( $user->name );
            echo "";
            echo "<b>date of birth: </b>" . $birthday->format( 'm-d' );
            echo "<br /><br />";

            //user information has no email address to send message to, you can replace with your email to test
            $to = "zanele1.maluleke@yahoo.com";
            $subject = "birthday email";

            $message = "
<html>
<head>
<title>Happy Birthday</title>
</head>
<body>
<p>we wish you well!</p>
</body>
</html>
";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: zanele.maluleke@example.com' . "\r\n";
            $headers .= 'Cc: myboss@example.com' . "\r\n";

            mail($to, $subject, $message, $headers);
        }

    }
}

include('Functions.php');
include ('footer.php');
