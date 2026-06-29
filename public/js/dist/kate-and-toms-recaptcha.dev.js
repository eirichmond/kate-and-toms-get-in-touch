"use strict";

(function () {
  var recaptcha = ktrecaptcha_object.key;
  debugger; // Execute reCAPTCHA and get the token

  grecaptcha.ready(function () {
    grecaptcha.execute(recaptcha, {
      action: "submit"
    }).then(function (token) {
      // Set the token in the hidden input field
      document.getElementById("recaptchaResponse").value = token;
      document.getElementById("recaptchaResponseBookNow").value = token;
    });
  });
})();