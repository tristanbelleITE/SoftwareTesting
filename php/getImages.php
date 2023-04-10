<?php
// Include the database configuration file
include 'dbConfig.php';

// Get the ID of the image to display
$imageID = 9;

// Query the database for the image with the specified ID
$query = $db->query("SELECT * FROM images WHERE id = $imageID");

if ($query->num_rows > 0) {
    // Retrieve the image data from the database
    $row = $query->fetch_assoc();
    $imageURL = 'uploads/' . $row["file_name"];
?>
    <!-- Display the image on the web page -->
    <img src="<?php echo $imageURL; ?>" alt="">
<?php
} else {
    echo "Image not found";
}
?>