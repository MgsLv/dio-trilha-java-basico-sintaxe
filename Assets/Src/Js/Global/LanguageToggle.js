document.addEventListener("DOMContentLoaded", function() {
  const languageSelector = document.getElementById("language-selector");
  const translations = {};

  // Função para carregar traduções
  function loadTranslations() {
    fetch('/Public/data/translations.json')
      .then(response => {
        if (!response.ok) {
          throw new Error("Erro ao carregar o JSON: " + response.statusText);
        }
        return response.json();
      })
      .then(data => {
        Object.assign(translations, data);
        updateLanguage("pt"); // Define o idioma padrão
      })
      .catch(error => console.error("Erro ao carregar traduções:", error));
  }

  // Função para atualizar a língua
  function updateLanguage(language) {
    // Atualiza textos dos elementos com data-translate
    document.querySelectorAll("[data-translate]").forEach(el => {
      const key = el.getAttribute("data-translate");
      el.innerHTML = translations[key] && translations[key][language] ? translations[key][language] : el.innerHTML; // Mantém o texto original se não encontrar a tradução
    });

    // Atualiza textos dos botões de login social sem remover os ícones
    const socialButtons = document.querySelectorAll(".button-social-login");
    socialButtons.forEach((button, index) => {
      const key = translations.socialLoginButtons[language][index];
      const icon = button.querySelector("img").outerHTML; // Mantém o ícone
      button.innerHTML = `${icon} ${key}`;
    });
  }

  // Evento de mudança de idioma
  languageSelector.addEventListener("change", function() {
    const selectedLanguage = this.value;
    updateLanguage(selectedLanguage);
  });

  loadTranslations(); // Carrega as traduções ao iniciar
});