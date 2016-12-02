<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gilbert</title>

    <?php
  /*  require_once "O.php";
    require_once "p.php";
    $nav = new navigation();
    $navi = new second();
    */
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
      $words = preg_split("/[\s',]+/", $question);
      for ($i = 0; $i < sizeof($words); $i++)
        $words[$i] = strtolower($words[$i]);
      $firstWord = $words[0];



      if (in_array("42", $words) || (in_array("réponse", $words) && (in_array("vie", $words) || in_array("univers", $words)))) {
        header('Location: wiki.php?lang=fr&keywords=la grande question sur la vie, l\'univers et le reste$question=quelle');
        die();
      }

      if (in_array("conscient", $words) || in_array("consciente", $words) || in_array("conscience", $words)) {

//Barre de navigation


      //  $nav->affichage();

        echo '<p >Mais qu est-ce que la conscience, après tout ? Suis-je consciente ? Ou conscient ? Que suis-je ? Une machine telle que moi,
          qui sait qu elle en est une a-t-elle pour autant une conscience ? Tant de questions sans réponses...<br/><br/>';
        echo "<a href=index.php>Reposer une question</a>";


        //$navi->affichage();
        die();
      }

      if (in_array("jarvis", $words)) {
        //Barre de navigation


      //  $nav->affichage();

        echo "Jarvis est tombé au combat, je suis venue le remplacer.<br/><br/>";
        echo "<a href=index.php>Reposer une question</a>";


      //  $navi->affichage();
        die();
      }


      $matches = array();
      if (preg_match('/([0-9]+[\s]?[+|-|\/|*]{1}[\s]?)+[0-9]+/', $question, $matches))
        checkCalc(implode("", preg_split("/[\s]+/", $matches[0])));

      $keywords = array_diff($words, $blacklist);



      if ((in_array("blague", $keywords) || in_array("blagues", $keywords)) && !in_array("qu", $words)) {
        header('Location: testblagues.php');
        die();
      }

      header('Location: wiki.php?lang=fr&keywords=' . implode(" ", $keywords) . "&question=" . $firstWord);
      die();
    }
    ?>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://cdn3.volusion.com/9nxdj.fchy5/v/vspfiles/photos/AR-29007-2.jpg?1383223688" target="_blank">Gilbert</a>
            </div>
            <!-- Top Menu Items -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bonjour! <small> Je suis Gilbert, je peux répondre à tes questions et te raconter des blagues !</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row center">
                  <div class = "col-lg-12">
                    <form action="#" method="post" >
                      <label for="question">Question :</label>
                      <input type="text" name="question" placeholder="Votre question" required>
                      <input type="submit" name="submit" value="Envoyer">
                    </form>

                  </div>
                </div>
                <!-- /.row -->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
