<h1 class="mt-5">Login</h1>


<form action="<?php echo BASE_URL;?>/auth" method="post">
  <div class="mb-3">
    <label for="InputEmail1" class="form-label">Email</label>
    <input placeholder="Digite o Email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="InputPassword1" class="form-label">Senha</label>
    <input placeholder="Digite a senha" type="password" class="form-control" id="InputPassword1" name="password" required minlength="8">
  </div>
  <?php if(isset($_GET['erro'])):?>
    <div class="alert bg-danger">
      <?php echo $_GET['erro'];?>
    </div>

  <?php endif;?>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>