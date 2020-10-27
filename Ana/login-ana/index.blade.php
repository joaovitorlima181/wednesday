<!DOCTYPE html>
<html>
    <head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{{asset('login/estilo.css')}}">

	</head>

	<body>
		<div id="container">
        <img src="imagens/LOGO.jpeg">

		 <div class="form-group">
	         <label class="email" for="email">E-mail</label>
	         <input class="email" type="email" name="email" id="email" placeholder="Digite seu email" required class="form-control">
	     </div>

	      <div class="form-group">
	         <label class ="senha" for="password">Senha </label>

	         <input class="senha" type="password" name="password" id="password" placeholder="Digite sua senha" required min="1" class="form-control">

	         <a href="/forgot-password">Esqueci a senha</a>
	      </div>

          <div>
	         <input class="submit" type="submit" value="Entrar">
	      </div>

	        <a class="registrar" href="/registrar" class="btn btn-secondary mt-3">
	            Registrar-se
	        </a>

	</body>
</html>
