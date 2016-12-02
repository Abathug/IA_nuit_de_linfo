<!DOCTYPE html>
<html>
<head>
  <title>Test API_Wiki</title>
</head>
<body>
  <?php
    $lang = $_GET["lang"];
    $motcle = $_GET["keyword"];
    trim($motcle);
    $motcle = str_replace (' ' , '_' , $motcle);
    $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
    // $url = "https://".$lang.".wikipedia.org/w/api.php?format=xml&action=query&prop=extracts&exintro=&explaintext=&titles=".$motcle;
    $url = "https://".$lang.".wikipedia.org/w/api.php?action=opensearch&search=".$motcle."&limit=1&format=xml";
    $text = file_get_contents($url, false, $context);
    $balisedebut = "<Description xml:space=\"preserve\">";
    $balisefin = "</Description>";
    echo getStringBetween($text,$balisedebut,$balisefin);

    function getStringBetween($str,$from,$to)
    {
      $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
      return substr($sub,0,strpos($sub,$to));
    }
  ?>
</body>
</html>
