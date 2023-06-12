<?php

$servername = "localhost";
$username = "root";
$password = "JVprog97#";
$dbname = "htmlpages";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//echo('test test');

if(isset($_POST['rating_value'])){

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $rating_value = $_POST['rating_value'];
    $userName = $_POST['userName'];
    $userMessage = $_POST['userMessage'];
    $now = time();
    $title = $_POST['title'];
    //var_dump($_POST); // adi nchofo chno kaiwwslo fl post 
    if(isset($_POST['title'])){
        echo "test test";
        var_dump($_POST['title'] + "test");
        $title = $_POST['title'];
        // Use the title variable in your PHP code as needed
        //echo "Received title: " . $title;
    }
        
    $sql = "INSERT INTO rating (name, rating, message, datetime, item)
    VALUES ('$userName', '$rating_value', '$userMessage', '$now', '$title')";

    if (mysqli_query($conn, $sql)) {
        echo "New Review Added Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

}



if(isset($_POST['action'])){
    $avgRatings = 0;
    $avgUserRatings = 0;
    $totalReviews = 0;
    $ratingsList = array();
    $totalRatings_avg = 0;



    $sql = "SELECT * FROM rating ORDER BY review_id DESC";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)) {
        $ratingsList[] = array(
            'review_id' => $row['review_id'],
            'name' => $row['name'],
            'rating' => $row['rating'],
            'message' => $row['message'],
            'datetime' => date('l jS \of F Y h:i:s A',$row['datetime']) 
        );
        $totalReviews++;
        $totalRatings_avg = $totalRatings_avg + intval($row['rating']);  
    }
    $avgUserRatings = $totalRatings_avg / $totalReviews;

    $output = array( 
        'avgUserRatings' => number_format($avgUserRatings, 1),
        'totalReviews' => $totalReviews,
        'ratingsList' => $ratingsList
    );

    echo json_encode($output);

}

?> 


