<?php
include 'vendor/autoload.php';
$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();//Load .env File


use Accredify\Connect as AccredifyConnect;
  $AccredifyConnect = new AccredifyConnect;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>

<pre>
<?php $connectURL = $AccredifyConnect->getConnectLink('StateVarGoesHereOptional');?>
<!-- generates connection to Accredify Link -->
<a href="<?php echo $connectURL;?>">Click here to connect</a>
<?php
if(isset($_GET['code']) && $_GET['code']){
    $Tokens = $AccredifyConnect->getAccessToken($_GET['code']);//Option 1
    /* 
        $Tokens::
        Array ( 
            [access_token] => uVZpA3aSDzxuMFqbYJgjoB9cRKs6xwbfzBxcMt6k 
            [token_type] => Bearer 
            [expires_in] => 7776000 
            [refresh_token] => vZpboiXBXexmWC0jNJ2FGaBWd1bxYvw5PTzZm9LJ
            )
    */
    //Get User
    $AccredifyUser = $AccredifyConnect->getUser($Tokens['access_token']);
    echo "<pre>";
    print_R($AccredifyUser);
}
?>
</body>
</html>