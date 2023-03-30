function checkLoggedIn() {
  const isLoggedIn = sessionStorage.getItem('loggedIn');

  if (isLoggedIn) {
    document.getElementById('addRecipeLink').href = "addRecipe.php";
  } else {
    document.getElementById('addRecipeLink').href = "#";
    document.getElementById('addRecipeLink').setAttribute('data-bs-toggle', 'modal');
    document.getElementById('addRecipeLink').setAttribute('data-bs-target', '#exampleModal');
  }
}

window.addEventListener('DOMContentLoaded', checkLoggedIn);

document.addEventListener('DOMContentLoaded', function () {
  updateLoginLogoutButtons();
});

function submitRecipe() {
  const title = document.getElementById('titel').value;
  const category = document.getElementById('kategorie').value;
  const duration = document.getElementById('dauer').value;
  const difficulty = document.getElementById('schwierigkeit').value;
  const ingredients = document.getElementById('zutaten').value;
  const preparation = document.getElementById('zubereitung').value;
  const imageFile = document.getElementById('formFileMultiple').files;

  const formData = new FormData();
  formData.append('title', title);
  formData.append('category', category);
  formData.append('duration', duration);
  formData.append('difficulty', difficulty);
  formData.append('ingredients', ingredients);
  formData.append('preparation', preparation);

  if (imageFile.length > 0) {
    for (let i = 0; i < imageFile.length; i++) {
      formData.append('image[]', imageFile[i]);
    }
  }

  fetch('addRecipeAction.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((result) => {
      if (result.status.includes("erfolgreich")) {
        alert(result.status);
        window.location.href = "index.html";
      } else {
        alert("Fehler beim Hinzufügen des Rezepts. Bitte versuchen Sie es erneut.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("Fehler beim Hinzufügen des Rezepts. Bitte versuchen Sie es erneut.");
    });
}

function updateLoginLogoutButtons() {
  const loggedIn = sessionStorage.getItem('loggedIn');
  const loginButton = document.querySelector('[data-bs-target="#exampleModal"]');
  const logoutButton = document.getElementById('logoutButton');

  if (loggedIn) {
    loginButton.style.display = 'none';
    logoutButton.style.display = 'block';
  } else {
    loginButton.style.display = 'block';
    logoutButton.style.display = 'none';
  }
}

function logoutUser() {
  sessionStorage.removeItem('loggedIn');
  updateLoginLogoutButtons();
  alert("Erfolgreich abgemeldet!");
  window.location.href = "index.html";
}

function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

// Login-Funktion
function loginUser() {
  const email = document.getElementById("login-email").value;
  const password = document.getElementById("login-password").value;

  if (!validateEmail(email)) {
    alert("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
    return;
  }

  if (!password || password.length < 6) {
    alert("Bitte geben Sie ein gültiges Passwort ein (mindestens 6 Zeichen).");
    return;
  }

  const data = new FormData();
  data.append('login-email', email);
  data.append('login-password', password);

  fetch('login.php', {
    method: 'POST',
    body: data
  })
    .then(response => response.json())
    .then(result => {
      if (result.status.startsWith("Erfolgreich")) {
        sessionStorage.setItem('loggedIn', true);
        checkLoggedIn();
        updateLoginLogoutButtons();
        alert(result.status);
        window.location.href = "index.html";
      } else {
        alert(result.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

// Registrierungs-Funktion
function registerUser() {
  const firstname = document.getElementById("firstname").value;
  const lastname = document.getElementById("lastname").value;
  const email = document.getElementById("register-email").value;
  const password = document.getElementById("register-password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  //const profileImageInput = document.getElementById("profile-image");

  if (!validateEmail(email)) {
    alert("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
    return;
  }

  if (!password || password.length < 6) {
    alert("Bitte geben Sie ein gültiges Passwort ein (mindestens 6 Zeichen).");
    return;
  }

  if (password !== confirmPassword) {
    alert('Passwörter stimmen nicht überein. Bitte versuchen Sie es erneut.');
    return;
  }

  const formData = new FormData();
  formData.append('firstname', firstname);
  formData.append('lastname', lastname);
  formData.append('email', email);
  formData.append('password', password);

  fetch('register.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(result => {
      if (result.status.startsWith("Erfolgreich")) {
        alert(result.status);
        window.location.href = "index.html";
      } else {
        alert(result);
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
}

// Event-Listener für Login- und Registrierungs-Buttons
$(document).ready(function () {
  $('#login-button').on('click', function (e) {
    e.preventDefault();
    loginUser();
  });


  $('#register-button').on('click', function (e) {
    e.preventDefault();
    registerUser();
  });
});

function searchRecipes() {
  const searchTerm = document.getElementById("searchBar").value;

  if (!searchTerm) {
    // Wenn der Suchbegriff leer ist, zeigen Sie die regulären Rezepte an.
    displayAllRecipes();
    return;
  }

  fetch(`search.php?searchTerm=${searchTerm}`)
    .then((response) => response.json())
    .then((recipes) => {
      displayFilteredRecipes(recipes);
    });
}

function displayAllRecipes() {
  fetch("fetch_recipes.php")
    .then((response) => response.json())
    .then((recipes) => {
      displayRecipes(recipes);
    });
}

function displayFilteredRecipes(recipes) {
  displayRecipes(recipes);
}

function displayRecipes(recipes) {
  // Löschen Sie zuerst den Inhalt der Karussells.
  const categories = ["Abendessen", "Mittagessen", "Frühstück", "Snacks", "Getränke"];
  categories.forEach((category) => {
    const carousel = document.querySelector(`.carousel-${category}`);
    carousel.innerHTML = "";
  });

  // Befüllen Sie die Karussells mit den neuen Rezepten.
  recipes.forEach((recipe) => {
    const category = getCategoryName(recipe.category);
    const carousel = document.querySelector(`.carousel-${category}`);

    const item = document.createElement("div");
    item.classList.add("item");

    const card = `
          <div class="card shadow" style="width: 18rem; height: 22rem;">
            <img src="${JSON.parse(recipe.image)[0]}" class="card-img-top" alt="bild">
            <div class="card-body">
              <h5 class="card-title">${recipe.title}</h5>
              <p class="card-text">${recipe.ingredients.substring(0, 30)}...</p>
              <a href="Gericht.html" id="${recipe.id}" class="btn btn-primary" target="_blank">Öffnen</a>
            </div>
          </div>
        `;

    item.innerHTML = card;
    carousel.insertBefore(item, carousel.firstChild);

    // Karussell neu initialisieren
    const owlCarousel = $(`.owl-carousel.carousel-${category}`);
    owlCarousel.trigger('destroy.owl.carousel');
    owlCarousel.html(owlCarousel.find('.owl-stage-outer').html()).removeClass('owl-loaded');
    owlCarousel.owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    });
  });
}

function getCategoryName(categoryId) {
  switch (categoryId) {
    case "1":
      return "Abendessen";
    case "2":
      return "Mittagessen";
    case "3":
      return "Frühstück";
    case "4":
      return "Snacks";
    case "5":
      return "Getränke";
    default:
      return "";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const carousels = document.querySelectorAll(".owl-carousel");

  carousels.forEach((carousel) => {
    carousel.addEventListener("click", (event) => {
      if (event.target.classList.contains("btn")) {
        const recipeId = event.target.id;
        localStorage.setItem("selectedRecipeId", recipeId);
      }
    });
  });

  if (window.location.pathname.endsWith("Gericht.html")) {
    displayRecipeDetails();
  }
});

function displayRecipeDetails() {
  const recipeId = localStorage.getItem("selectedRecipeId");

  if (!recipeId) {
    // Redirect to the main page if no recipe is selected
    window.location.href = "index.html";
    return;
  }

  fetch(`fetch_recipe_details.php?id=${recipeId}`)
    .then((response) => response.json())
    .then((recipe) => {
      if (recipe) {
        // Set recipe title
        const titleCol = document.querySelector("#grid1 .col:first-child");
        if (titleCol) {
          const title = titleCol.querySelector("h2");
          if (title) {
            title.innerHTML = `Titel: <br> ${recipe.title}`;
          }
        }

        // Set recipe duration
        const duration = document.getElementById("duration");
        if (duration) {
          duration.innerText = `${getDurationText(recipe.duration)} Minuten`;
        }

        // Set recipe difficulty
        const difficulty = document.getElementById("difficulty");
        if (difficulty) {
          difficulty.innerText = getDifficultyText(recipe.difficulty);
        }


        // Set recipe ingredients
        const ingredientsCol = document.querySelector("#grid1 .col:nth-child(2)");
        if (ingredientsCol) {
          const ingredients = ingredientsCol.querySelector("p");
          if (ingredients) {
            ingredients.innerHTML = recipe.ingredients;
          }
        }

        // Set recipe preparation
        const preparationCol = document.querySelector("#grid1 .col:nth-child(3)");
        if (preparationCol) {
          const preparation = preparationCol.querySelector("p");
          if (preparation) {
            preparation.innerHTML = recipe.preparation;
          }
        }

        // Set recipe images
        const images = JSON.parse(recipe.image);

        // Set carousel indicators
        const carouselIndicators = document.querySelector(".carousel-indicators");
        carouselIndicators.innerHTML = "";

        images.forEach((_, index) => {
          const indicatorButton = document.createElement("button");
          indicatorButton.type = "button";
          indicatorButton.dataset.bsTarget = "#myCarousel";
          indicatorButton.dataset.bsSlideTo = index;
          indicatorButton.setAttribute("aria-label", `Slide ${index + 1}`);

          if (index === 0) {
            indicatorButton.classList.add("active");
            indicatorButton.setAttribute("aria-current", "true");
          }

          carouselIndicators.appendChild(indicatorButton);
        });


        const carouselInner = document.querySelector(".carousel-inner");
        carouselInner.innerHTML = "";

        images.forEach((image, index) => {
          const carouselItem = document.createElement("div");
          carouselItem.classList.add("carousel-item");
          if (index === 0) {
            carouselItem.classList.add("active");
          }

          const overlayImage = document.createElement("div");
          overlayImage.classList.add("overlay-image");
          overlayImage.style.backgroundImage = `url(${image})`;

          carouselItem.appendChild(overlayImage);
          carouselInner.appendChild(carouselItem);
        });
      } else {
        // Redirect to the main page if the recipe is not found
        window.location.href = "index.html";
      }
    });
}

function getDurationText(index) {
  const durationOptions = {
    1: "< 10",
    2: "< 20",
    3: "< 30",
    4: "< 40",
    5: "< 50",
    6: "< 60",
    7: "< 90",
    8: "< 120",
  };

  return durationOptions[index] || "";
}

function getDifficultyText(index) {
  const difficultyOptions = {
    1: "Leicht",
    2: "Mittel",
    3: "Schwer",
    4: "Bruder vertrau, mach nicht",
  };

  return difficultyOptions[index] || "";
}


