// Laden der Nutzerrezepte, wenn das DOM geladen ist
window.addEventListener('DOMContentLoaded', fetchUserRecipes);

// Event Listener für das Löschen eines Rezepts aus der Tabelle
$(document).on("click", ".delete-recipe", function (e) {
  e.preventDefault();
  const recipeId = $(this).closest("tr").data("recipe-id");
  deleteRecipe(recipeId);
});

// Funktion zum Abrufen der Nutzerrezepte vom Server
function fetchUserRecipes() {
  // HTTP-Anfrage an den Server
  fetch("fetch_user_recipes.php")
    .then((response) => response.json())
    .then((recipes) => {
      // Rezepte in einer Schleife durchlaufen und HTML-Tabelle erstellen
      let tableContent = "";
      recipes.forEach((recipe) => {
        const durationText = getDurationText(recipe.duration);
        const difficultyText = getDifficultyText(recipe.difficulty);
        const categoryText = getCategoryText(recipe.category);
        tableContent += `
          <tr data-recipe-id="${recipe.id}">
            <td>
              <img src="${JSON.parse(recipe.image)[0]}" alt="">
              <h2 class="user-link">${recipe.title}</h2>
            </td>
            <td class="text-center">
            ${categoryText}
            </td>
            <td class="text-center">
              <span class="label label-default">${difficultyText}</span>
            </td>
            <td>
              <p class="text-center">${durationText} Minuten</p>
            </td>
            <td style="width: 20%;" class="text-center">
              <a href="#" class="table-link delete-recipe danger">
                <span class="fa-stack">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </td>
          </tr>
        `;
      });
      $("table.user-list tbody").html(tableContent);
    });
}

// Funktion zum Löschen eines Rezepts aus der Tabelle
function deleteRecipe(recipeId) {
  // HTTP POST-Anfrage an den Server zum Löschen des Rezepts
  $.post("delete_recipe.php", { recipe_id: recipeId }, function (response) {
    alert(response);
    fetchUserRecipes();
  });
}

// Funktion zur Rückgabe des Textes für die Dauer anhand des Index
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

// Funktion zur Rückgabe des Textes für die Kategorie anhand des Index
function getCategoryText(index) {
  const categoryOptions = {
    1: "Abendessen",
    2: "Mittagessen",
    3: "Frühstück",
    4: "Snacks",
    5: "Getränke"
  };

  return categoryOptions[index] || "";
}

// Funktion zur Rückgabe des Textes für die Schwierigkeit anhand des Index
function getDifficultyText(index) {
  const difficultyOptions = {
    1: "Leicht",
    2: "Mittel",
    3: "Schwer",
    4: "Bruder vertrau, mach nicht",
  };

  return difficultyOptions[index] || "";
}