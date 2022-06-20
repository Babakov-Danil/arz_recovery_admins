<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo ('<script> 
	window.location.replace("/");
	</script>');
}
use Site\Services\Page;
Page::part("sess");
if(isset($_POST['setnick'])){
    if (preg_match("/^[a-zA-Z_]+_[a-zA-Z_]*$/",$_POST['setnick'])){
        $correct = true;
        $nick = $_POST['setnick'];
        $find = R::findOne('users','idvk = ?',[$_SESSION['vkid']]);
        $find->nicknew = $nick;
        R::store($find);
        echo ("<script> 
        window.setTimeout(function(){
        window.location.href = '/';}, 3);</script>");
    }
    else {$warning=true;}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    Page::part("head");
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">ArzBrainburg</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" aria-current="page" href="/">Profile</a>
        <a class="nav-link disabled" aria-current="page" href="#">Change Nick</a>
      </div>
    </div>
  </div>
</nav>
        <div class="header">
        <h3 class="margins" style='text-align:center;'>Введи новый ник</h3>
        </div>
        <div class="wrapper">
            <div class="clear"></div> 
            <form action="#" method="post">
                <div>
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    echo('<input class="user-input" type="text" name="setnick" id="name" placeholder=""  />
                    <div>
                    <input type="submit" value="Save" class="confirmnick buttong btn btn-success "/>
                    </div>');
                }?>
                <?php if($warning==true){
                {echo '<a class="warningcolor">Ошибка</a>: ник введен некорректно.<br> Пример: Danny_Fortuna ';}
                }elseif($correct == true){
                echo("<a class='variablecolor'>Ник изменён на ".$nick."</a>");} ?>
            </form>  
        </div>
    </body>
</html>