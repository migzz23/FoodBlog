function openPopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "block";
}

function closePopup(popupId) {
    var popup = document.getElementById(popupId);
    popup.style.display = "none";
}

document.getElementById('showPopupBtn').addEventListener('click', function() {
    document.getElementById('popupForm').style.display = 'block';
});

function closePopupForm() {
    document.getElementById('popupForm').style.display = 'none';
}

function openPopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.display = 'flex';
}

function closePopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.display = 'none';
}


// popup.js

// popup.js

function showEditForm(contentId) {
  // Get the popup container using the dynamic ID
  var popup = document.getElementById('editFormPopup_' + contentId);

  // Display the popup
  popup.style.display = 'block';
}
// popup.js

function confirmEdit(contentId) {
  var editedTitle = document.getElementById('editedTitle_' + contentId).value;
  var editedDescription = document.getElementById('editedDescription_' + contentId).value;
  var editedIngredients = document.getElementById('editedIngredients_' + contentId).value;
  var editedInstructions = document.getElementById('editedInstructions_' + contentId).value;

  if (editedTitle.trim() !== "") {
    // Use SweetAlert for edit confirmation
    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to save the changes?',
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, save it!',
    }).then((result) => {
      if (result.isConfirmed) {
        // Perform the edit action here
        saveEdits(contentId, editedTitle, editedDescription, editedIngredients, editedInstructions);
      }
    });
  } else {
    alert("Please enter the edited title.");
  }
}

function saveEdits(contentId, editedTitle, editedDescription, editedIngredients, editedInstructions) {
  // Send an AJAX request to edit_recipe.php
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var response = JSON.parse(this.responseText);
      if (response.status === 'success') {
        alert(response.message);
        closePopup(contentId);
      } else {
        alert(response.message);
      }
    }
  };

  // Prepare the POST data
  var postData = new FormData();
  postData.append('recipe_id', contentId);
  postData.append('edited_title', editedTitle);
  postData.append('edited_description', editedDescription);
  postData.append('edited_ingredients', editedIngredients);
  postData.append('edited_instructions', editedInstructions);

  // Send the POST request
  xhttp.open('POST', 'update_recipe.php', true);
  xhttp.send(postData);
}


function closePopup(contentId) {
  // Close the popup using the dynamic ID
  var popup = document.getElementById('editFormPopup_' + contentId);
  popup.style.display = 'none';
}

