	function includeHTML() {
	  var z, i, elmnt, file, xhttp;
	  /* Loop through a collection of all HTML elements: */
	  z = document.getElementsByTagName("*");
	  for (i = 0; i < z.length; i++) {
		elmnt = z[i];
		/*search for elements with a certain atrribute:*/
		file = elmnt.getAttribute("w3-include-html");
		if (file) {
		  /* Make an HTTP request using the attribute value as the file name: */
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4) {
			  if (this.status == 200) {elmnt.innerHTML = this.responseText;}
			  if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
			  /* Remove the attribute, and call this function once more: */
			  elmnt.removeAttribute("w3-include-html");
			  includeHTML();
			}
		  }
		  xhttp.open("GET", file, true);
		  xhttp.send();
		  /* Exit the function: */
		  return;
		}
	  }
	}

	includeHTML();

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Vehicles Popup //
	function showPopup(make, model, year, color, plate, rented) {
		  // Show the popup by setting the "right" CSS property of the ".popup" element to 0
		  document.querySelector('#overlay').style.right = '0px'; 
		  document.querySelector('#myPopup').style.right = '0px';
		  
		// Set the text of the "myVariableValue" element
		var myVariableValue = document.getElementById("myVariableValue");
		myVariableValue.textContent = make;

		var carmodel = document.getElementById("carmodel");
		carmodel.textContent = model;
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Rentals And Returns Popup //
	function addRentalReturnPopup() {
		// Show the popup by setting the "right" CSS property of the ".popup" element to 0
		document.querySelector('#overlay').style.right = '0px'; 
		document.querySelector('#myPopup').style.right = '0px';
 	 }

	  // Rentals And Returns Popup //
	function editRentalReturnPopup(r_ID) {
		// Show the popup by setting the "right" CSS property of the ".popup" element to 0
		document.querySelector('#viewOverlay').style.right = '0px'; 
		document.querySelector('#ViewRentalPopup').style.right = '0px';
		document.querySelector('#viewRentalFirstName').value = r_ID;

		var rentalID = document.getElementById("rentalID");
		rentalID.textContent = r_ID;
  	}

	 // Rentals And Returns Popup //
	function viewRentalReturnPopup(r_ID) {
			// Show the popup by setting the "right" CSS property of the ".popup" element to 0
			document.querySelector('#viewOverlay').style.right = '0px'; 
			document.querySelector('#ViewRentalPopup').style.right = '0px';
			document.querySelector('#viewRentalFirstName').value = r_ID;
			document.querySelector('#viewRentalFirstName').readOnly = true;

			var rentalID = document.getElementById("rentalID");
			rentalID.textContent = r_ID;
 	 }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  

	// Hide Popup //
	  function hidePopup() {
		document.querySelector('#overlay').style.right = '-9000px';
		document.querySelector('#myPopup').style.right = '-560px';
		//document.getElementById("myPopup").style.display = "none";
	  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  
	//Allows closing of popup by pressing esc key
	  document.addEventListener("keydown", function(event) {
		if (event.key === "Escape") {
			hidePopup();
		}
		});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Function used to generate SQL data
	 function loadTable() {
		var tableDiv = document.getElementById("tableDiv");
		tableDiv.innerHTML = "hello!";
		fetch('php/getVehicle.php')
			.then(response => response.text())
			.then(data => {
				document.getElementById("tableDiv").innerHTML = data;
			})
			.catch(error => console.error(error));
			return;
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Assigns Styling depending on which report page we're on
	function asgnClr()
	{
		// Check if we're on Vehicle Rental History Page
		if (window.location.href.includes('vehicleRentalHistory.html')) {
			document.getElementById('VRH').style.color = 'black';
			document.getElementById('VRH').style.textDecoration = 'underline';
			document.getElementById('VRH').style.textDecorationColor = '#FFC766';
			document.getElementById('VRH').style.textDecorationThickness = '2px';
			document.getElementById('VRH').style.textUnderlineOffset = '3px';
		}

		// Check if we're on Customer Rental History Page
		if (window.location.href.includes('customerRentalHistory.html')) {
			document.getElementById('CRH').style.color = 'black';
			document.getElementById('CRH').style.textDecoration = 'underline';
			document.getElementById('CRH').style.textDecorationColor = '#FFC766';
			document.getElementById('CRH').style.textDecorationThickness = '2px';
			document.getElementById('CRH').style.textUnderlineOffset = '3px';
		}
		
	}

	///////////////////////////////////////////////////////////////////////////////////////////////

	$(document).ready(function() {
		// Handle click events on edit, view, and delete links
		$('.edit').click(function() {
			console.log('Edit button clicked!');
			showRentalReturnPopup();
		});
		
		$('.view').click(function() {
		  // Perform view action on row
		});
		
		$('.delete').click(function() {
		  // Perform delete action on row
		});
	  });
	  

  
