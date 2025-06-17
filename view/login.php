<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
<link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #d3d3d3;
            background-size: cover;
            background-position: center;
        }

        .login-box {
            position: relative;
            width: 400px;
            height: 450px;
            background-image: url(img/mot.jpg);
            background-size: 100% 100%;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: white;
            text-align: center;
            font-size: 2rem;
            margin-top: 0;
            margin-bottom: 50px;
            text-shadow: 15px 15px 20px black;

        }

        .label {
            color: white;
            font-size: 1.2rem;
        }

        .input-box {
            position: relative;
            width: 300px;
            margin: 15px 0;
            border-bottom: 2px solid white;
        }

        .input-box input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1.1em;
            color: white;
        }

        button {
            width: 50%;
            height: 50px;
            background: white;
            border-radius: 40px;
            border: none;
            outline: none;
            color: black;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 70px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 3px 3px 6px white;
        }
        
    </style>
</head>
<body>
    <div class="login-box">
        <form action="inicio.php" method="POST" autocomplete="off">
            <h2>LOGIN</h2>
            <label class="label">Usuario</label>
            <div class="input-box">
                <input type="text" required>
            </div>
            
            <label class="label">Contraseña</label>           
            <div class="input-box"> 
                <input type="password" required>
            </div>

            <button type="submit">Iniciar Sesion</button>

        </form>
    </div>


</body>
</html>

