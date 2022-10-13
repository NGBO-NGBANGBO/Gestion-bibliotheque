<?php
include("../setting.php");
session_start();
if(!isset($_SESSION['CIN']))
{
	
}
else{
  $CIN=$_SESSION['CIN'];
  $a=mysqli_query($set,"SELECT * FROM utilisateur WHERE CIN='$CIN'");
  $b=mysqli_fetch_array($a);
  $name=$b['name'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title> Gestion de bibliothèque</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>  
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .tag {display:inline;float:left;padding:2px 5px;width:auto;background:#F5A623;color:#fff;height:23px;}
        .tag-CINe{display:inline;float:left;}
        #books {border:1px solid #DEEAEE; margin-bottom:20px;padding-top:30px;padding-bottom:20px;background:#fff; margin-left:10%;margin-right:10%;}
        #description {border:1px solid #DEEAEE; margin-bottom:20px;padding:20px 50px;background:#fff;margin-left:10%;margin-right:10%;}
        #description hr{margin:auto;}
        #service{background:#fff;padding:20px 10px;width:112%;margin-left:-6%;margin-right:-6%;}
        .glyphicon {color:#D67B22;}
        .btn-lg{font-size:30px;}
    </style>

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" style="height:80px;">
      <div class="container-fluid">
        
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  href= "../kb/empr.php" ><img  src="img/applogo.jpeg"  style="width: 185px;height:78px;position:absolute;top:0px;left:0px;border-radios: 20px;"></a> 
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <?php
                  if(isset($_SESSION['CIN']))
                    {
                      echo'
                    <li> <a href="../changePassword.php" class="btn btn-lg"> Modifier mot de passe </a> </li>; 
                    <li> <a href="../logout.php" class="btn btn-lg"> Se déconecter </a> </li>
                         ';
                    }
               ?>
          </ul>
        </div>
      </div>
    </nav>

    <div id="top" >
    <div id="searchbox" class="container-fluid" style="height:70%;width:112%;margin-top:1.5%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Rechercher un livre , auteur ou categorie">
              </form>
          </div>
      </div>
   </div>


    <?php
    include "dbconnect.php";
    $PID=$_GET['ID'];
    $query = "SELECT * FROM books WHERE id='$PID'";
    $result = mysqli_query ($con,$query)or die(mysql_error());

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="../pic/".$row['image']."";
            $target="cart.php?ID=".$PID."&";
echo '
  <div class="container-fluid" id="books">
    <div class="row">
      <div class="col-sm-10 col-md-6">
                          <div class="tag">'.$row["author"].'</div>
                              <div class="tag-CINe"><img src="img/orange-flag.png">
                          </div>
                         <img class="center-block img-responsive" src="'.$path.'" height="600px" style="padding:20px;">
      </div>
      <div class="col-sm-10 col-md-4 col-md-offset-1">
        <h2> '. $row["name"] . '</h2>
                                <span style="color:#00B9F5;">
                                 #'.$row["author"].'&nbsp &nbsp #'.$row["qte"].'
                                </span>
        <hr>            
                                <span style="font-weight:bold;">Vous êtes suspendu  </span>';
                                
echo'                           <br><br><br>
                               <form method=POST action=#><table></tr>
							   <td>Date de retour</td><td><INPUT TYPE=DATE NAME=ds </td>
							   </tr>
							   <tr><td><p style=(font-family:arial;
							   color:red;)></b>  </p></td<tr>
							   <tr><td colspan=2><p><b>Veuillez contacter les responsables</b> </p></td<tr>
							  </table> </form>
						

      </div>
	  
    </div>
         
     ';
echo '
          <div class="container-fluid" id="description">
    <div class="row">
      <h2> Description </h2> 
                        <p>'.$row['Description'] .'</p>
                        <pre style="background:inherit;border:none;">
   Genre  '.$row["genre"].'   <hr> 
   Titre       '.$row["name"].' <hr> 
   Auteur       '.$row["author"].' <hr>
   ISBN        '.$row["id"].' <hr>
   
                        </pre>
    </div>
  </div>
';

            
            }
        }
    echo '</div>';

    ?>




 


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>
<script>
            $(function () {
                var link = $('#buyLink').attr('href');
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                $('#quantity').on('change', function () {
                    $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                });
            });
    </script>
</body>
</html>
<?php
$query = "SELECT * FROM books WHERE id='$PID'";
$result = mysqli_query ($con,$query)or die(mysql_error());
$row = mysqli_fetch_assoc($result);
$rendu=$_POST['ds'];       
$i=$row["id"];
$n=$row["name"];
$a=$row["author"];


    


?>