
<?php 
include 'connection.php';
$name = $_POST['name'];
  $brand = $_POST['brand'];
    $dosage = $_POST['dosage'];
      $my_serve = $_POST['my-serve'];
        $benefits = $_POST['benefits'];
          $pill_type = $_POST['pill-type'];
            $serve_size = $_POST['serve-size'];
              $daily = isset($_POST['day']) ? 1 : 0;
                $nightly = isset($_POST['night']) ? 1 : 0;
                $asNeeded = isset($_POST['as-needed']) ? 1 : 0;

$sql = "INSERT INTO info (`NAME`, `BRAND`, `SERVE_SIZE`, `PILL_TYPE`, `DOSAGE`, `MY_SERVING`, `DAILY`, `NIGHTLY`, `AS NEEDED`, `BENEFITS`) VALUES ('$name', '$brand', '$serve_size', '$pill_type', '$dosage', '$my_serve', '$daily', '$nightly', '$asNeeded', '$benefits')";

if ($conn->query($sql) === TRUE) {
    $response = [
      'success' => true,
      'message' => "Success, these items were inserted",
      'data' => [
        'name' => $name,
        'brand' => $brand,
        'dosage' => $dosage,
        'serve-size' => $serve_size,
        'my_serve' => $my_serve,
        'pill_type' => $pill_type,
        'day' => $daily,
        'night' => $nightly,
        'asNeeded' => $asNeeded,
        'benefits' => $benefits
      ]
    ];
  } else {
    $response = [
      'success' => false,
      'message' => "Error: " . $sql . "<br>" . $conn->error
    ];
  }

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);

?>
