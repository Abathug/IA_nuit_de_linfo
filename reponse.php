<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
  <meta charset=utf-8 />
  <title>Gilbert</title>
</head>
<body>
  <h1>Bonjour. </h1>
  <p> je suis Gilbert, je suis là pour répondre à vos questions et pour vous raconter des blagues si vous le désirez </p>
  <form method="post" action="reponse.php">
      <label id="Label1">Pose ta question ici : </label><input name="question" type="text"><br>
      <input name="Envoyer" type="submit" value="Envoyer">
      <input name="Effacer" type="reset" value="Effacer">


      <?php
      echo 'Ta question est : ' .$_POST['question'];
       ?>
  </form>
</body>
</html>
