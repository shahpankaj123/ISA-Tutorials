<?php
$movies = [];
$error = "";

if (isset($_GET['s']) && $_GET['s'] !== "") {
    $search = urlencode($_GET['s']);
    $apiKey = "67652950";
    $url = "https://www.omdbapi.com/?s=$search&apikey=$apiKey";

    $response = file_get_contents($url);

    if ($response === FALSE) {
        $error = "Unable to fetch data from API.";
    } else {
        $data = json_decode($response, true);

        if ($data['Response'] === "True") {
            $movies = $data['Search'];
        } else {
            $error = $data['Error'];
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
                    <img src="<?php echo $movie['Poster']; ?>" width="80">
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
