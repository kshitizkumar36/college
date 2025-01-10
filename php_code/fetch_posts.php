<?php
include '../includes/connect.php';

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT id, title, category1, category2, DATE_FORMAT(date, '%d %M %Y') as formatted_date, views, image, thumb FROM banner";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="slider-container">'; // Add this line to wrap the slider items

    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="slider-single">
            <div class="post-thumb position-relative">
                <div class="thumb-overlay position-relative" style="background-image: url(' . htmlspecialchars($row["image"]) . ')">
                    <div class="post-content-overlay">
                        <div class="container">
                            <div class="entry-meta meta-0 font-small mb-20">
                                <a href="category.html" tabindex="0"><span class="post-cat text-info text-uppercase">' . htmlspecialchars($row["category1"]) . '</span></a>
                                ' . (!empty($row["category2"]) ? '<a href="category.html" tabindex="0"><span class="post-cat text-warning text-uppercase">' . htmlspecialchars($row["category2"]) . '</span></a>' : '') . '
                            </div>
                            <h1 class="post-title mb-20 font-weight-900 text-white">
                                <a class="text-white" href="single.html?id=' . htmlspecialchars($row["id"]) . '" tabindex="0">' . htmlspecialchars($row["title"]) . '</a>
                            </h1>
                            <div class="entry-meta meta-1 font-small text-white mt-10 pr-5 pl-5">
                                <span class="post-on">' . htmlspecialchars($row["formatted_date"]) . '</span>
                                <span class="hit-count has-dot">' . htmlspecialchars($row["views"]) . ' Views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    echo '</div>'; // Close the slider container div
} else {
    echo "No posts available.";
}
$connect->close();
?>
