<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

/* ===== BACKGROUND ANIMATION ===== */
body {
  margin: 0;
  height: 100vh;
  font-family: 'Poppins', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(-45deg, #0e2941, #232f3e, #ff9900, #ffb347);
  background-size: 400% 400%;
  animation: bgMove 10s ease infinite;
}

@keyframes bgMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* ===== GLASS LOGIN BOX ===== */
.form {
  backdrop-filter: blur(15px);
  background: rgba(14,41,65,0.85);
  width: 360px;
  padding: 35px;
  border-radius: 16px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);
  text-align: center;
  color: white;
  animation: fadeIn 0.8s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ===== HEADING ===== */
.form h2 {
  font-size: 26px;
  font-weight: 700;
  color: #ff9900;
  letter-spacing: 2px;
  margin-bottom: 25px;
}

/* ===== INPUT GROUP ===== */
.input-group {
  position: relative;
  margin-bottom: 20px;
}

.input-group input {
  width: 100%;
  padding: 12px;
  border-radius: 8px;
  border: none;
  font-size: 14px;
  background: rgba(255,255,255,0.1);
  color: white;
  outline: none;
  border: 1px solid rgba(255,255,255,0.2);
}

.input-group label {
  position: absolute;
  top: 50%;
  left: 12px;
  transform: translateY(-50%);
  color: #ccc;
  font-size: 13px;
  pointer-events: none;
  transition: 0.3s;
}

.input-group input:focus + label,
.input-group input:not(:placeholder-shown) + label {
  top: -8px;
  left: 8px;
  background: #0e2941;
  padding: 0 6px;
  font-size: 11px;
  color: #ff9900;
}

/* ===== PASSWORD TOGGLE ===== */
.toggle-pass {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 14px;
  color: #ff9900;
}

/* ===== BUTTON ===== */
.form input[type="submit"] {
  width: 100%;
  padding: 12px;
  border-radius: 8px;
  border: none;
  background: #ff9900;
  color: white;
  font-size: 15px;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
  box-shadow: 0 0 0 rgba(255,153,0,0.5);
}

.form input[type="submit"]:hover {
  background: #e68a00;
  box-shadow: 0 0 15px rgba(255,153,0,0.7);
  transform: translateY(-2px);
}

/* ===== FOOTER TEXT ===== */
.footer-text {
  margin-top: 15px;
  font-size: 12px;
  color: #ccc;
}

</style>
</head>

<body>

<div class="form">
  <form action="login.php" method="POST">
    <h2>LOGIN</h2>

    <div class="input-group">
      <input type="text" name="username" required placeholder=" ">
      <label>Username</label>
    </div>

    <div class="input-group">
      <input type="password" id="password" name="password" required placeholder=" ">
      <label>Password</label>
      <span class="toggle-pass" onclick="togglePassword()">👁</span>
    </div>

    <input type="submit" value="LOGIN">

    <div class="footer-text">Amazon Internship Admin Panel</div>
  </form>
</div>

<script>
function togglePassword() {
  let pass = document.getElementById("password");
  pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>