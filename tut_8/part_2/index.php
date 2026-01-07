<?php
include "connection.php";

$movies = [];
$error = "";

if (isset($_GET['s']) && $_GET['s'] !== "") {
    $search = trim($_GET['s']); 
    $search_db = mysqli_real_escape_string($conn, $search); 
    $search_api = urlencode($search); 

    $query = "SELECT * FROM movie WHERE Title LIKE '%$search_db%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $movies[] = $row;
        }
    } else {
        $apiKey = "67652950";
        $url = "https://www.omdbapi.com/?s=$search_api&apikey=$apiKey";

        $response = file_get_contents($url);

        if ($response === FALSE) {
            $error = "Unable to fetch data from API.";
        } else {
            $data = json_decode($response, true);

            if ($data['Response'] === "True") {
                $movies_api = $data['Search'];

                foreach ($movies_api as $movie) {
                    $title = mysqli_real_escape_string($conn, $movie['Title']);
                    $year = mysqli_real_escape_string($conn, $movie['Year']);
                    $type = mysqli_real_escape_string($conn, $movie['Type']);
                    $poster = mysqli_real_escape_string($conn, $movie['Poster']);

                    $check_query = "SELECT * FROM movie WHERE imdbID='" . mysqli_real_escape_string($conn, $movie['imdbID']) . "'";
                    $check_result = mysqli_query($conn, $check_query);

                    if (mysqli_num_rows($check_result) === 0) {
                        $insert_query = "INSERT INTO movie (Title, Year, Type, Poster, imdbID) VALUES 
                                         ('$title', '$year', '$type', '$poster', '" . mysqli_real_escape_string($conn, $movie['imdbID']) . "')";
                        mysqli_query($conn, $insert_query);
                    }

                    $movies[] = [
                        'Title' => $title,
                        'Year' => $year,
                        'Type' => $type,
                        'Poster' => $poster
                    ];
                }
            } else {
                $error = $data['Error'];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Result</title>
</head>
<body>

<input type="text" id="inputData" placeholder="Enter movie name">
<br><br>
<button id="btn">Search</button>

<h2>Movie Search Result</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (!empty($movies)): ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Poster</th>
            <th>Title</th>
            <th>Year</th>
            <th>Type</th>
        </tr>

        <?php foreach ($movies as $movie): ?>
            <tr>
                <td>
                    <?php if ($movie['Poster'] && $movie['Poster'] !== "N/A"): ?>
                        <img src="<?php echo $movie['Poster']; ?>" width="80">
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td><?php echo $movie['Title']; ?></td>
                <td><?php echo $movie['Year']; ?></td>
                <td><?php echo $movie['Type']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
<script src="main.js"></script>
</html>


