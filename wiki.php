<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gilbert</title>




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
                <a class="navbar-brand" href="index.html">Gilbert</a>
            </div>
            <!-- Top Menu Items -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Documentation</a>
                    </li>
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
                    <?php
                      $lang = $_GET["lang"];
                      $motcle = $_GET["keywords"];
                      trim($motcle);
                      $motcle = str_replace (' ' , '_' , $motcle);
                      $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
                      // $url = "https://".$lang.".wikipedia.org/w/api.php?format=xml&action=query&prop=extracts&exintro=&explaintext=&titles=".$motcle;
                      $url = "https://".$lang.".wikipedia.org/w/api.php?action=opensearch&search=".$motcle."&limit=1&format=xml";
                      $text = file_get_contents($url, false, $context);
                      $balisedebut = "<Description xml:space=\"preserve\">";
                      $balisefin = "</Description>";
                      $text = getStringBetween($text,$balisedebut,$balisefin);
                      echo $text . "<br/><br/>";
                      if(strlen($text) == 0) {
                        echo "Désolé, je n'ai trouvé aucun résultat... :(<br/><br/>";
                      }
                      echo "<a href=index.php>Reposer une question</a>";

                      function getStringBetween($str,$from,$to)
                      {
                        $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
                        return substr($sub,0,strpos($sub,$to));
                      }
                    ?>

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
