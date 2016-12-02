<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Une question ?</title>
    <?php
    if (isset($_POST["submit"])) {

    $blacklist = array("qui", "ou", "où", "quel", "quelle", "quoi", "pourquoi", "combien", "est", "a", "la", "le", "de", "des", "du", "en", "?", "que", "y", "a-t-il", "d",
    "font", "qu", "est-ce", "un", "une", "ce", "s", "est-il", "il", "à");

      function checkCalc($calcul) {
        $totalIndex = 0;
        $sousCalculs = preg_split("/[+|-]/", $calcul);
        $simpleCalc = "";
        foreach ($sousCalculs as $sc) {
          $lastSign = "none";
          $calc = "";
          $number = "";
          $index = 0;
          while ($index < strlen($sc)) {
            $char = substr($sc, $index, 1);
            if ($char == "*") {
              if ($calc == "") {
                $calc = (int) $number;
              } else if ($lastSign == "*") {
                $calc *= (int) $number;
              } else if ($lastSign == "/") {
                $calc /= (int) $number;
              }
              $lastSign = "*";
              $number = "";
            } else if ($char == "/") {
              if ($calc == "") {
                $calc = (int) $number;
              } else if ($lastSign == "*") {
                $calc *= (int) $number;
              } else if ($lastSign == "/") {
                $calc /= (int) $number;
              }
              $lastSign = "/";
              $number = "";
            } else {
              $number += $char;
            }
            $index++;
            $totalIndex++;
          }
          if ($calc == "") {
            $calc = (int) $number;
          } else if ($lastSign == "*") {
            $calc *= (int) $number;
          } else if ($lastSign == "/") {
            $calc /= (int) $number;
          }
          $simpleCalc += ($calc . substr($calcul, $totalIndex, 1));
          $totalIndex++;
        }
        echo $calcul . " = " . $simpleCalc;
        die();
      }

      $question = $_POST["question"];
      $words = preg_split("/[\s']+/", $question);
      for ($i = 0; $i < sizeof($words); $i++)
        $words[$i] = strtolower($words[$i]);
      $firstWord = $words[0];

      // echo "Question : " . $question . "<br/><br/>";
      // echo "Words : "; print_r($words); echo "<br/><br/>";
      // echo "First word : " . $firstWord . "<br/>";

      // checkCalc($words);
      $matches = array();
      if (preg_match('/([0-9]+[\s]?[+|-|\/|*]{1}[\s]?)+[0-9]+/', $question, $matches))
        checkCalc(implode("", preg_split("/[\s]+/", $matches[0])));

      $keywords = array_diff($words, $blacklist);

      // echo "Keywords : "; print_r($keywords); echo "<br>";

      if ((in_array("blague", $keywords) || in_array("blagues", $keywords)) && !in_array("qu", $words)) {
        header('Location: testblagues.php');
        die();
      }

      header('Location: wiki.php?lang=fr&keywords=' . implode(" ", $keywords) . "&question=" . $firstWord);
      die();
    }
    ?>
  </head>
  <body>
    <form action="#" method="post">
      <label for="question">Question :</label>
      <input type="text" name="question" value="Votre question" required>
      <input type="submit" name="submit" value="Envoyer">
    </form>
  </body>
</html>
