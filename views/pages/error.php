<?php 
use Site\Services\Page;
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
        <a class="nav-link" aria-current="page" href="#">Profile</a>
      </div>
    </div>
    <a class="nav-link1" aria-current="page" href="/login">Login</a>
  </div>
</nav>
<div class="container">
    <h1 class="errorsec"> ВК не закреплен за админским аккаунтом</h1>
</div>
</body>
</html>