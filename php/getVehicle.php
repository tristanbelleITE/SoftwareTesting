<?php
    require_once ('MySql_Connect.php'); // Connect to the db.

    $query = "SELECT LicensePlateNumber, Year, Color, Rented, Make, Model, Details FROM vehicles ORDER BY VehID ASC;";
    $result = mysqli_query ($dbcon, $query);

        // Check if any rows were returned by the query
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row in the result set and print the data in the table
            echo '<div style="display: flex; flex-direction: row; flex-wrap:wrap; max-width: 100%;">';
            while ($row = mysqli_fetch_assoc($result)) {
              //Send data to Popup function
              $make = $row['Make'];
              $model = $row['Model'];
              $year = $row['Year'];
              $color = $row['Color'];
              $plate = $row['LicensePlateNumber'];
              $rented = $row['Rented'];

                echo '<div class="card" style="height: 290px; width: 240px; margin-top: 0px; margin-bottom: 25px; cursor: pointer;" onclick="showPopup(\''.$make.'\',\''.$model.'\',\''.$year.'\',\''.$color.'\',\''.$plate.'\',\''.$rented.'\')">
                <div class="cardHeading">
                  <div class="cardtopHeading">
                    <h3 style="color: black; font-size: 20px;">'. $row['Make'] .'</h3>
                    <div class="cardtopHeading">
                      <h3 style="color: black; font-size: 20px;">250$</h3>
                      <h3 style="color: #808080; font-size: 20px;">/Day</h3>
                    </div>
                  </div>
                  <h3 style="color: black; font-size: 20px;">'. $row['Model'] .'</h3>
                  <h4 style="margin: 0; padding: 0; text-align: left; color: #808080;">Coupe</h4>
                  <h4 style="margin: 0; padding: 0; text-align: left; color: #808080;">'. $row['Year'] .'</h4>
                </div>
                <p style=" color: #808080; font-size: 16px; margin-top: 8px;">Plate #: '. $row['LicensePlateNumber'] .'</p>
                <img src="assets\carImgs\SuzukiSwift.png" alt="Shoe Product Image" style="max-width: 100%; padding-top: 10px;padding-bottom: 10px;">
                <p style="color: #808080;  font-size: 16px;">Colour: '. $row['Color'] .'</p>      
                ';
                if ($row['Rented'] ==1)
                {
                    echo'<div class="cardCondition" style="padding-top: 8px; padding-bottom: 8px; padding-left: 50px; padding-right: 50px; border-radius: 12px;">
                    <h4 style="margin: 0; padding: 0; color: black;">Rented</h4>
                    </div>';
                }
                else if ($row['Rented'] ==0)
                {
                    echo'<div class="cardCondition"  style="background-color: #FFC766; color: white; padding-top: 8px; padding-bottom: 8px; padding-left: 50px; padding-right: 50px; border-radius: 12px;">
                    <h4 style="margin: 0; padding: 0;">Available</h4>
                    </div>';
                }
                echo' 
              </div>';



            }
            echo '</div>';
            
        } else {
            // If no rows were returned by the query, print an error message
            echo "No results found.";
        }

    mysqli_free_result ($result); 
?>