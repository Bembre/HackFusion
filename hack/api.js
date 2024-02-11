const profanityList = ["rude", "offensive", "explicit", "vulgar", "inappropriate", "swear", "curse", "obscene", "nasty", "offensiveWord"];

function checkProfanity() {
  const textInput = document.getElementById("textInput");
  const profanityMessage = document.getElementById("profanityMessage");

  const inputText = textInput.value.toLowerCase();

  if (containsProfanity(inputText)) {
    profanityMessage.textContent = "Inappropriate language detected! Please remove offensive words.";
  } else {
    profanityMessage.textContent = "";
  }
}

function containsProfanity(text) {
  for (let word of profanityList) {
    if (text.includes(word)) {
      return true;
    }
  }
  return false;
}
