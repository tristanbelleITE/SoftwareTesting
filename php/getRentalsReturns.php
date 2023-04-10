<?php
    require_once ('MySql_Connect.php'); // Connect to the db.

    $query = "SELECT * FROM rentals";
    $result = mysqli_query ($dbcon, $query);

        // Check if any rows were returned by the query


          echo '<table align="center" cellspacing="0" cellpadding="18" id="studentTable" style="border-top-left-radius: 15px; border-top-right-radius: 15px; font-size: 13px; width:100%;">
                  <tr>
                  <td align="left">
                  <b>ID</b>
                  </td>

                  <td align="left">
                  <b>Status</b>
                  </td>

                  <td align="left">
                  <b>Condition</b>
                  </td>

                  <td align="left">
                  <b>Rented Date</b>
                  </td>

                  <td align="left">
                  <b>Return Date</b>
                  </td>

                  <td align="left">
                  <b>Vehicle</b>
                  </td>

                  <td align="left">
                  <b>Customer</b>
                  </td>

                  <td align="left">
                  <b>Amount</b>
                  </td>

                  <td align="left">
                  
                  </td>
                  </tr>';

          while ($row = mysqli_fetch_array($result)) {
            $r_ID = $row['RentalID'];

              echo '<tr>
              <td align="left"> <b>'. $row['RentalID'] . '</b> </td>
              <td align="left">'. $row['RentalRate'] . '</td>
              <td align="left">' . $row['ConditionBefore'] . '</td>
              <td align="left">' . $row['RentalDate'] . '</td>
              <td align="left">' . $row['ReturnDate'] . '</td>
              <td align="left">' . $row['VehID'] . '</td>
              <td align="left">' . $row['CustomerID'] . '</td>
              <td align="left">'. $row['AdditionalCharges'] . '</td>                            
              <td align="left">

              <div class="dropdown">
                <img class ="dropbtn" style="height: 20px; cursor: pointer;" src="assets\icons\More_Vertical.png" alt="My SVG File">
                <div class="dropdown-content">
                    <img class="edit" style="height: 20px; cursor: pointer; padding-bottom:8px" src="assets\icons\edit.png" alt="Edit btn" onclick="editRentalReturnPopup(\''.$r_ID.'\')">
                    <br>
                    <img class="view" style="height: 20px; cursor: pointer; padding-bottom:8px" src="assets\icons\view.png" alt="My SVG File" onclick="viewRentalReturnPopup(\''.$r_ID.'\')">
                    <br>
                    <img class="delete" style="height: 20px; cursor: pointer;" src="assets\icons\delete.png" alt="My SVG File" onclick="showRentalReturnPopup()">
                </div>
               </div>


              </td>
              </tr>';
          }
              
          echo '</table>';


    mysqli_free_result ($result); 
?>