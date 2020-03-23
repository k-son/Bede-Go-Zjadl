const difficultyLevelText = document.querySelectorAll('.difficulty-level__text');

const toPreviousPostsLink = document.querySelectorAll('.previous_posts a');
const toNextPostsLink = document.querySelectorAll('.next_posts a');
const blogFeedHeading = document.querySelector('.blog-feed h2');


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

blogFeedHeading.innerText = "NAJNOWSZE WPISY";
toPreviousPostsLink.forEach(el => el.innerText = "STARSZE WPISY");
toNextPostsLink.forEach(el => el.innerText = "NOWSZE WPISY");