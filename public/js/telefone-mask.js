const input = document.querySelector("#telefone");

window.intlTelInput(input, {
  initialCountry: "br",
  preferredCountries: ["br", "us", "pt"],
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});
