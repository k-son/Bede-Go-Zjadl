const difficultyLevelText = document.querySelectorAll('.difficulty-level__text');


/// Difficulty level ///
difficultyLevelText.forEach(el => {

  if (el.innerText == "TRUDNY") {
    el.parentElement.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.lastElementChild.style.fill = 'red';
  } else if (el.innerText == "ŚREDNI") {
    el.parentElement.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.lastElementChild.style.fill = 'orange';
  } else if (el.innerText == "ŁATWY") {
    el.parentElement.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.firstElementChild.lastElementChild.style.fill = 'green';
  }
});
