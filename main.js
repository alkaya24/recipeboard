document.addEventListener("DOMContentLoaded", function () {
    fetch("fetch_recipes.php")
      .then((response) => response.json())
      .then((recipes) => {
        const categories = {
          1: "Abendessen",
          2: "Mittagessen",
          3: "Frühstück",
          4: "Snacks",
          5: "Getränke",
        };
  
        for (const categoryId in categories) {
          const category = categories[categoryId];
          const carousel = document.querySelector(`.carousel-${category}`);
          const filteredRecipes = recipes.filter((recipe) => recipe.category === categoryId);
  
          filteredRecipes.forEach((recipe) => {
            const item = document.createElement("div");
            item.classList.add("item");
  
            const card = `
              <div class="card shadow" style="width: 18rem; height: 22rem">
                <img src="${JSON.parse(recipe.image)[0]}" class="card-img-top" alt="bild">
                <div class="card-body">
                  <h5 class="card-title">${recipe.title}</h5>
                  <p class="card-text">${recipe.ingredients.substring(0, 30)}...</p>
                  <a href="Gericht.html" class="btn btn-primary" target="_blank">Öffnen</a>
                </div>
              </div>
            `;
  
            item.innerHTML = card;
            carousel.appendChild(item);
          });

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
      }
    });
});

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

document.addEventListener('DOMContentLoaded', function() {
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
        .then((response) => response.text())
        .then((result) => {
        if (result.includes("erfolgreich")) {
            alert(result);
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
        if (result.status === "Erfolgreich angemeldet!") {
            sessionStorage.setItem('loggedIn', true);
            checkLoggedIn();
            updateLoginLogoutButtons();
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
    .then(response => response.text())
    .then(result => {
        if (result.startsWith("Erfolgreich")) {
            alert(result);
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
