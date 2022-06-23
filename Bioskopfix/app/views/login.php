<?php 
if(isset($_SESSION['login'])){
  if($_SESSION['login'] == "true"){
    $url = BASEURL;
    header('Location: Home/home');
  }
}
?>
<div class="row align-items-center text-light" style="margin-top: 40vh; margin-bottom: 40vh; margin-right: 70vh; margin-left: 70vh; ">
<form action="<?= BASEURL?>home/home" method="post" class="shadow p-3 mb-5 rounded" style="background-color: #BC85A3;">
    <h1 class="text-center mb-3"><i class="bi bi-person-circle"></i> Login</h1>
  <div class="mb-3">
    <label for="username" class="form-label mb-3">Username</label>
    <input type="username" name="user" class="form-control" id="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-5">
    <label for="password" class="form-label mb-3">Password</label>
    <input type="password" name="pass" class="form-control" id="password">
  </div>
  <button type="submit" value="submit" class="text-light btn mb-5" style="background-color: #FEADB9;">Login</button>
</form>
  </div>
