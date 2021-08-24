<?php
include "header.php";
include "functions.php";
?>

<div class="panierUp"></div>
<form method="GET" action="index.php">
  <div class="mb-3">
    <label for="lastName" class="form-label">Nom</label>
    <input type="text" class="form-control" id="lastName" required>
  </div>
  <div class="mb-3">
    <label for="firstName" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="firstName" required>
  </div>
  <div class="mb-3">
    <label for="Email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="Email"required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>