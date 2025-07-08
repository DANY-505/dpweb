<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>login</title>
<style>
        
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: "Poppins", sans-serif;
  background: #f6f5f7;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

h1 {
  font-weight: bold;
  color: #333;
  font-size: 2rem;
}

span {
    font-size: 1rem;
}

.container {
  background: #fff;
  box-shadow: 0 10px 10px black;
  position: relative;
  width: 800px;
  min-height: 500px;
  display: flex;
}

.form-container {
  width: 50%;
  height: 100%;
}

.sign-in-container {
  display: flex;
  align-items: center;
  justify-content: center;
  background: #fff;
}

.form-container form {
  background: #fff;
  display: flex;
  width: 250px;
  flex-direction: column;
  height: 100%;
  justify-content: center;
  align-items: center;
  text-align: center;
}


.form-container input {
  background: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

button {
  border-radius: 20px;
  background: black;
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  border: none;
  transition: transform 80ms ease-in;
  cursor: pointer;
}

button:active {
  transform: scale(0.95);
}
button:hover {
  background: blue;
}

.sign-up-container {
    display: flex;
    background-image: url('../img/moto.png');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    border-right: 1px solid black;
}

</style>
</head>
  <body>
    <div class="container">
      <div class="form-container sign-up-container">
      </div>
      <div class="form-container sign-in-container">
        <form action="#">
          <h1>BIENVENIDO</h1>
          <span>LOGIN</span>
          <input type="text" placeholder="Usuario" />
          <input type="password" placeholder="Password" />
 
          <button type="submit">Iniciar sesión</button>
        </form>
      </div>
    </div>
  </body>
</html>
