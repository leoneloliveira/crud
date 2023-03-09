<!DOCTYPE html5>
<html>

<head>
  <title>Login</title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="view/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="view/css/sweetalert2.min.css" type="text/css" />
  <link rel="stylesheet" href="view/css/style.css" type="text/css" />
</head>

<body class="h-100 bg-primary">

  <div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="content bg-light">
      <h1 class="text-center">Acesso ao sistema</h1>
      <form method="post">
        <div class="form-group mb-4">
          <label for="loginTxt" class="control-label">Login:</label>
          <input type="email" 
                 class="form-control bg-primary text-light"
                 placeholder="Digite seu email"
                 name="loginTxt"
                 id="loginTxt"
                 maxlength="50"
                 required />
        </div>
        <div class="form-group mb-4">
          <label for="senhaTxt" class="control-label">Senha:</label>
          <input type="password" 
                 class="form-control bg-primary text-light"
                 placeholder="Digite sua senha"
                 name="senhaTxt"
                 id="senhaTxt"
                 maxlength="20"
                 required />
        </div>
        <div class="row m-0 p-0">
          <button type="button"
                  id="loginBtn"
                  class="btn btn-success btn-block">
            ACESSAR
          </button>
        </div>
      </form>
    </div>
  </div>
</body>

<script src="view/js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="view/js/sweetalert2.all.min.js" type="text/javascript"></script>
<script src="view/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#loginBtn').on('click', async function(e) {
      e.preventDefault();

      const config = {
        method: "post",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          login: $('#loginTxt').val(),
          senha: $('#senhaTxt').val()
        })
      };

      const request = await fetch('controller/login/logar.php', config);
      const response = await request.json();

      alert(`status: ${JSON.stringify(response)}`);
      if (response.status === 1) {
        window.location.href = 'view/usuarios.php';
      }
      else {
        Swal.fire({
          title: 'Atenção!', 
          text: 'Login ou senha incorretos',
          icon: 'error'
        });
      }
    });
  });
</script>

</html>