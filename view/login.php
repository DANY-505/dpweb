<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #25252b;
    }

    .container {
      position: relative;
      width: 750px;
      height: 450px;
      border: 2px solid #ff2770;
      box-shadow: 0 0 25px #ff2770;
      overflow: hidden;
    }

    .form-box {
      position: absolute;
      top: 0;
      left: 0;
      padding: 0 40px;
      width: 50%;
      height: 100%;
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .form-box h2 {
      font-size: 2rem;
      text-align: center;
      color: white;
    }

    .input-box {
      position: relative;
      width: 100%;
      height: 50px;
      margin-top: 25px;
      color: white;
      font-size: 1.1rem;
    }

    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      font-size: 1rem;
      color: white;
      font-weight: bold;
      border-bottom: 2px solid white;
      padding-right: 24px;
    }

    .input-box label {
      position: absolute;
      top: 50%;
      left: 0;
      transition: .5s;
    }

    .input-box input:focus~label,
    .input-box input:valid~label {
      top: -5px;
      color: #ff2770;

    }

    .btn {
      position: relative;
      width: 100%;
      height: 45px;
      background: transparent;
      border-radius: 40px;
      cursor: pointer;
      font-weight: 600;
      overflow: hidden;
      z-index: 1;
      color: white;
    }

    .btn::before {
      content: "";
      position: absolute;
      height: 300%;
      width: 100%;
      background: linear-gradient(#25252b, #ff2770, #25252b, #ff2770);
      top: -100%;
      left: 0;
      z-index: -1;
      transition: .5s;
    }

    .btn:hover:before {
      top: 0;
    }

    .regi a {
      font-size: 1rem;
      color: white;
      text-align: center;
      margin: 20px 0 10px;
      display: flex;
      justify-content: center;
      text-decoration: none;
    }

    .info-content {
      position: absolute;
      top: 0;
      height: 100%;
      width: 50%;
      display: flex;
      justify-content: center;
      flex-direction: column;
      right: 0;
      text-align: right;
      padding: 0 40px 60px 150px;
      color: white;
    }

    .info-content h2 {
      color: white;
      text-transform: uppercase;
      font-size: 2rem;
      line-height: 1.3;
    }

    .container .contai {
      position: absolute;
      right: 0;
      top: -5px;
      height: 600px;
      width: 850px;
      background: linear-gradient(450deg, #25252b, #ff2770);
      transform: rotate(10deg) skewY(40deg);
      transform-origin: bottom right;
    }
  </style>

  <script>
    const base_url = '<?= BASE_URL;?>';
  </script>
</head>

<body>
  <div class="container">
    <div class="contai"></div>
    <div class="form-box Login">
      <h2>LOGIN</h2>
      <form id="frm_login">

        <div class="input-box">
          <input type="text" id="username" name="username" required>
          <label for="">Usuario</label>
        </div>

        <div class="input-box">
          <input type="password" id ="password" name="password" required>
          <label for="">Password</label>
        </div>

        <div class="input-box">
          <button class="btn" type="button" onclick="iniciar_sesion();">Iniciar Sesion</button>
        </div>

      </form>
    </div>
    <div class="info-content">
      <h2>BIENVENIDO DE NUEVO</h2>
    </div>
  </div>
  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>
</html>