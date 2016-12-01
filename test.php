<!DOCTYPE html>
<html>
<head>
  <title>Test API_Wiki</title>
</head>
<body>
  <?php
    $lang = $_GET["lang"];
    $motcle = $_GET["keyword"];
    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
    $url = "https://".$lang.".wikipedia.org/w/api.php?format=xml&action=query&prop=extracts&exintro=&explaintext=&titles=".$motcle;
    $text = file_get_contents($url, false, $context);
    echo $text;
  ?>
</body>
</html>
