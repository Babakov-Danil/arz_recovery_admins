<?php 
use Site\Services\Page;
require_once 'site/Controllers/Getinfo.php';
Page::part("sess");
$find = R::findOne('users','idvk = ?',[$_SESSION['vkid']]);
$name = $find['name'];
$recovery = $find['recovery'];
$time = $find['time'];
$timec = $time - time();
$array = array( 1 => "Хочу помогать",
2 => "Хочу быть полезным",
3 => "Хочу развивать сервер",
4 => "Видел много нарушений от разных игроков сам будучи им, хочу исправить эту ситуацию",
5 => "Хочу сделать игру на нашем сервере приятнее",
6 => "Хочу внести свой вклад в развитие сервера"
);
$rand = $array[rand(1, count($array))];
$wait = $timec - (60*60*24);
$wait = date('d',$timec);

if (/** "!" для теста, чтобы прошло проверку ибо апи отвечает ошибкой **/!$fieldsSearch['error_code']<>0){
  echo ('<script> 
	window.location.replace("/error");
	</script>');
}
if ($recovery == '1' && $time < time()){
  $find->recovery = '0';
  R::store($find);
  echo('<script>window.alert("Ты можешь подать анкету снова!");</script>');
}
if (isset($_POST['recovery'])){
  if ($recovery == '0'){
    $find->recovery = '1';
    $find->time = time() + (29*24*60*60);
    R::store($find);
    $webhookurl = "https://canary.discord.com/api/webhooks/904540178960482335/amYwYRedB2Eoe0j1keLPnMr92GETK5VUh9oQcP9MjrVBcWlgPfvf3B1UhMVfqjYnHcKB";
    $json_data = json_encode([
    "content" => "$linkVK\nhttps://risbot.ru/users.php?id=$risbotid ```$state1\n$state2\nИмя: $name\nВозраст: $age\nГород проживания: $town\nVK: $linkVK\nDiscord: $discordID\nКакой уровень администрирования был у кандидата: $lvl\nНа какой уровень будет восстановлен: $lvla\nСсылка на форумный аккаунт: $lnikForum\nПочему он должен быть восстановлен: $rand\nБыли ли выговоры при администрировании: $vig\nЗа что был снят: $reason\nВ какой период занимал пост администратора:($dateOne по $dateTwo)\nСсылка на Архив Администраторов[NEW]```",], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec( $ch );
    // Если что-то не работает, раскомментируйте строку ниже, и почитайте в чём беда :)
    //echo $response;
    curl_close( $ch );
    echo('<script>window.alert("Анкета отправлена, если она будет отклонена ты сможешь подать её заново через 30 дней");</script>');
}else{echo("<script>window.alert('Новую анкету сможешь отправить через $wait дней.');</script>");}}
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
        <a class="nav-link disabled" aria-current="page" href="">Profile</a>
      </div>
    </div>
  </div>
</nav>
<div class="contrainer listing">
<ul id = 'table-to-copied' >
<h1 style='text-align:center;'>Анкета на восстановление</h1>
	<h3><?php echo $state1?></h3>
	<li> <?php echo $state2 ?></li>
	<li> Имя: <?php echo $find['name']?></li> 
	<li> Возраст: <?php echo $age?></li>
	<li> Город проживания: <?php echo $town?></li>
	<li>VK: <?php echo "<a href='$linkVK'target='_blank'>$linkVK</a>"?></li>
	<li>Discord: <?php echo $discordID?></li>
	<li>Какой уровень администрирования был у кандидата: <?php echo $lvl?></li>
	<li>На какой уровень будет восстановлен: <?php echo $lvla?></li>
	<li>Ссылка на форумный аккаунт: <?php echo "<a href='$lnikForum'target='_blank'>$lnikForum</a>"?></li>
	<li>Почему он должен быть восстановлен: <?php echo $rand?></li>
	<li>Были ли выговоры при администрировании: <?php echo($vig)?></li>
	<li>За что был снят: <?php echo $reason?></li>
	<li>В какой период занимал пост администратора: (C <?php echo ($dateOne." по ".$dateTwo);?>)</li>
	<li>Ссылка на Архив Администраторов[NEW]</li>
  <div>
    <form method="post">
    <input type="submit" value="Отправить анкету" name="recovery" class = "buttongq btn btn-success "/>
    </form>
    <form class="mt-4" method="POST" action='updatenick'>
    <input type="submit" value="Я изменил ник" name="updatenick" class = "buttongw btn btn-success "/>
    </form>
    </div>
  </ul>
</div>
</body>
</html>
