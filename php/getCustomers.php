<?php
    require_once ('MySql_Connect.php'); // Connect to the db.

    $query = "SELECT * FROM customers";
    $result = mysqli_query ($dbcon, $query);

        // Check if any rows were returned by the query


          echo '<table align="center" cellspacing="0" cellpadding="18" id="studentTable" style="border-top-left-radius: 15px; border-top-right-radius: 15px; font-size: 13px;width:100%;">
                  <tr>
                  <td align="left">
                  <b>ID</b>
                  </td>

                  <td align="left">
                  <b>Name</b>
                  </td>

                  <td align="left">
                  <b>Email Address</b>
                  </td>

                  <td align="left">
                  <b>Phone Number</b>
                  </td>

                  <td align="left">
                  <b>Driver License No.</b>
                  </td>

                  <td align="left">
                  <b>Credit/Debit Card No.</b>
                  </td>

                  <td align="left">
                  <b>Billing Address</b>
                  </td>

                  <td align="left">
                  <b>Expiration Date</b>
                  </td>

                  <td align="left">
                  
                  </td>
                  </tr>';

          while ($row = mysqli_fetch_array($result)) {
              echo '<tr>
              <td align="left"> <b>'. $row['CustomerID'] . '</b> </td>
              <td align="left">'. $row['FirstName'] . ' '. $row['LastName'] . '</td>
              <td align="left">' . $row['EmailAddress'] . '</td>
              <td align="left">' . $row['PhoneNumber'] . '</td>
              <td align="left">' . $row['LicenseNumber'] . '</td>
              <td align="left">' . $row['CardNumber'] . '</td>
              <td align="left">' . $row['BillingAddress'] . '</td>
              <td align="left">'. $row['ExpirationDate'] . '</td>                            
              
              <td>
                <div class="dropdown">
                    <img class ="dropbtn" style="height: 20px; cursor: pointer;" src="assets\icons\More_Vertical.png" alt="My SVG File">
                    <div class="dropdown-content">
                        <img class="edit" style="height: 20px; cursor: pointer; padding-bottom:8px" src="assets\icons\edit.png" alt="Edit btn" onclick="">
                        <br>
                        <img class="view" style="height: 20px; cursor: pointer; padding-bottom:8px" src="assets\icons\view.png" alt="My SVG File" onclick="">
                        <br>
                        <img class="delete" style="height: 20px; cursor: pointer;" src="assets\icons\delete.png" alt="My SVG File" onclick="">
                    </div>
                </div>
                </td>

              </tr>';
          }
              
          echo '</table>';


    mysqli_free_result ($result); 
?>