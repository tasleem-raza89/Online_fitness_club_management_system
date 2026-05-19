<?php include 'header.php'; // Include Header ?>
<?php include 'config.php'; // Database Connection ?>
<?php include 'hero.php'; // Database Connection ?>


<div class="gallery">
    <ul class="controls">
        <li class="buttons active" data-filter="all">All</li>
        <li class="buttons" data-filter="gym">Gym</li>
        <li class="buttons" data-filter="yoga">Yoga</li>
        <li class="buttons" data-filter="diet">Diet</li>
    </ul>

    <div class="image-container">
        <?php
        $sql = "SELECT * FROM gallery";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="' . $row['image_path'] . '" class="image ' . $row['category'] . '">';
                echo '<img src="' . $row['image_path'] . '" alt="Gallery Image">';
                echo '</a>';
            }
        } else {
            echo "<p>No images found!</p>";
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; // Include Footer ?>
