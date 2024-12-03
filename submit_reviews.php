<?php
// Connect to the database
include 'connection.php'; // Ensure to include your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_reviews'])) {
    $review_text = $_POST['review_text'];

    // Clean the data to prevent SQL injection
    $review_text = mysqli_real_escape_string($conn, $review_text);

    // Insert review into the database
    $query = "INSERT INTO reviews (review_text) VALUES ('$review_text')";
    
    if (mysqli_query($conn, $query)) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
