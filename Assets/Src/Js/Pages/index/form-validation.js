 // form-validation.js
 
 // Obtém o formulário e o botão de envio
 const form = document.getElementById("login-form");
 const botao = document.getElementById("button-login-submit");

 form.addEventListener("input", function() {
   // Verifica se todos os campos são válidos
   const todosValidos = [...form.elements].every(input => input.checkValidity());
   botao.disabled = !todosValidos; // Habilita o botão se todos forem válidos
 });

 form.addEventListener("submit", function(event) {
   if (!form.checkValidity()) {
     event.preventDefault(); // Previne o envio se o formulário não for válido
     alert("Por favor, preencha todos os campos corretamente.");
   }
 });