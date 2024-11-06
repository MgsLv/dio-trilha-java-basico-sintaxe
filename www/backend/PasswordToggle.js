// PasswordToggle.js
const passwordInput = document.getElementById("password");
const togglePasswordIcon = document.getElementById("icon-toggle-password");

togglePasswordIcon.addEventListener("click", function() {
  const isPasswordVisible = passwordInput.type === "text";
  passwordInput.type = isPasswordVisible ? "password" : "text";

  const iconPath = isPasswordVisible ?
    "../../assets/images/eye-open.png" :
    "../../assets/images/eye-closed.png";

  document.getElementById("toggle-icon").src = iconPath;
});