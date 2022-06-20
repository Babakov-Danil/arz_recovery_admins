<?php 
use Site\Services\Page;
$params = array(
  'client_id'     => '7953449',
  'redirect_uri'  => '/login',
  'scope'         => 'offline',
  'response_type' => 'code',
);

$info = ['response' => [[
  'first_name' => 'test',
  ]]
];
$data = [
  'user_id' => '1',
  'access_token' => '1',
];
/**if (isset($_GET['code'])) {
  class_alias('\RedBeanPHP\R', '\R');
  $params = array(
    'client_id'     => '7953449',
    'client_secret' => '**',
    'redirect_uri'  => '/login',
    'code'          => $_GET['code']
      
  );

// Получение access_token
  $data = file_get_contents('https://oauth.vk.com/access_token?' . urldecode(http_build_query($params)));
  $data = json_decode($data, true);
  if (!empty($data['access_token'])) {
    $params = array(
      'v'            => '5.126',
      'uids'         => $data['user_id'],
      'access_token' => $data['access_token'],
      'fields'       => 'first_name',
    );
    $info = file_get_contents('https://api.vk.com/method/users.get?' . urldecode(http_build_query($params)));
    $info = json_decode($info, true);	**/
    if (isset($info)){
      print_r($info['response'][0]);
      $info = $info['response'][0];
      $user_name = $info['first_name'];
    //  echo($user_name . '\n');
      $user_id = $data['user_id'];
      $_SESSION['token'] = $data['access_token'];
      $_SESSION['vkid'] = $user_id;
      $find = R::findOne('users','idvk = ?',[$user_id]);
    #echo($find[1]['idvk'] . ' <-||-> ' . $user_id);
      if (!$find['idvk']==$user_id){
        #echo('не нашло');
        $users = R::dispense('users');
        $users->idvk = $data["user_id"];
        $users->name = $user_name;
        $users->recovery = '0';
        $users->time = '-1';
        $users->nicknew = 'nil';
        R::store($users);
      }
    }
    #print_r($_SESSION['user_id']);
    //header('Refresh: 0; url=/');
 // }
//}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    Page::part("head");
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://vk.com/brainburg_arizona">ArzBrainburg</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link disabled" aria-current="page" href="#">Profile</a>
      </div>
    </div>
  </div>
</nav>
<form class="mt-4" method="POST" action='/'>
  <div class="contrainer">
    <button type="submit" class="btnauth btn btn-success btn-lg">Авторизация через VK</button>
  </div>
</form>
<div>
</div>
</body>
</html>