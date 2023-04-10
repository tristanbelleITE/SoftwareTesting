<?php
    require_once ('MySql_Connect.php'); // Connect to the db.

    $query = "SELECT rentals.*, customers.firstname, customers.lastname, customers.licensenumber, customers.phonenumber,
                vehicles.make, vehicles.model, vehicles.year, vehicles.color, vehicles.licenseplatenumber, vehicles.details
                FROM rentals
                JOIN customers ON rentals.CustomerID = customers.CustomerID
                JOIN vehicles ON rentals.VehID = vehicles.VehID;";

    $result = mysqli_query ($dbcon, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $r_ID = $row['RentalID'];
        //Send data to Popup function
       /* $make = $row['Make'];
        $model = $row['Model'];
        $year = $row['Year'];
        $color = $row['Color'];
        $plate = $row['LicensePlateNumber'];
        $rented = $row['Rented']; */
        // Check if any rows were returned by the query
        //<form style="font-size: 14px; display: flex; flex-direction: column; align-items: center;">
         /* echo '<div class="Rentalf" style="margin: 0 auto; max-height: 100%;">
				<h4 style="color: black; font-size: 17px;">Rentals And Returns</h4>
				
					<h4 style="color: #f7a745; font-size: 17px;">Customer</h4>
					<div style="display: flex; width: 100%; justify-content: space-between;">
                    <label>Name</label>
                     <input type="text" placeholder="First Name" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;" value="'.$row['firstname'].'" readonly>
						<input type="text" placeholder="Last Name" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="Drivers License" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Phone Number" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>

					<br>
					  <h4 style="color: #f7a745; font-size: 17px;">Vehicle</h4>
					  <div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="Vehicle Make" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Vehicle Model" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="Vehicle Year" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Vehicle Color" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="License Plate Number" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Condition" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<input type="text" placeholder="New Damages" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					

					<br>
					<h4 style="color: #f7a745; font-size: 17px;">Rental Agreement</h4>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="RentedOut Date" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Return DueDate" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="Rental Rate" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Additional Fees" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					
					<br>
					<h4 style="color: #f7a745; font-size: 17px;">Payment Information</h4>
					<div style="display: flex; width: 100%; justify-content: space-between;">
						<input type="text" placeholder="Amount Charged" style="flex: 1; margin-right: 10px; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 	
						<input type="text" placeholder="Payment Method" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					</div>
					<input type="text" placeholder="Balance" style="flex: 1; background-image: url("../assets/icons/Search_Magnifying_Glass.png"); background-repeat: no-repeat; background-size: 20px 20px; background-position: 10px center; padding-left: 40px;"> 
					
					
					<div style="display: flex; width: 60%; justify-content: space-between; padding-top: 20px; padding-left: 20%;">
						<button class="AddBtn" style="width: 45%;" onclick="showRentalReturnPopup()">Save</button>
						<button class="AddBtn" style="width: 45%;" onclick="hidePopup()">Cancel</button>
					</div>
		
	            </div>
              ';*/
        }

    mysqli_free_result ($result); 
?>