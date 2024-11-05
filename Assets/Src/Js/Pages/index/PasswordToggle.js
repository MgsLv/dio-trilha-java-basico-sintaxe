// PasswordToggle.js
const passwordInput = document.getElementById("password");
const togglePasswordIcon = document.getElementById("icon-toggle-password");

togglePasswordIcon.addEventListener("click", function() {
  const isPasswordVisible = passwordInput.type === "text";
  passwordInput.type = isPasswordVisible ? "password" : "text";

  const iconPath = isPasswordVisible ?
    "/Public/imagens/icons/eye-open.png" :
    "/Public/imagens/icons/eye-closed.png";

  document.getElementById("toggle-icon").src = iconPath;
});