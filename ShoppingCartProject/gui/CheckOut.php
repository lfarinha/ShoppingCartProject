<?php include '..\controller\CheckOutController.php';
        if (isset($_GET['qtty']) and isset($_GET['addtoshoppingcart']) 
              
            ) {
                $qtty = $_GET['qtty'];
                $itemName = $_GET['addtoshoppingcart'];
               
        }else {
                $qtty = null;
                $itemName = null;   
               
        }
        
    //blank values for error message 
    $fnameErr = $lnameErr = $AddressLine1Err = $AddressLine2Err = $CityErr = "";
    $StateErr = $ZipErr = $PhoneErr = $emailErr = "";
    $CCNumErr = $CSCErr = $EdateErr = "" ;
    
    //filling in default values 
    $fname = empty($_POST['$fname']) ? 'Robert' : $_POST['$fname'];         
    $lname = empty($_POST['$lname']) ? 'Krall' : $_POST['$lname'];
    $AddressLine1 = empty($_POST['$AddressLine1']) ? '30 East 7th Street' : $_POST['$AddressLine1'];
    $AddressLine2 = empty($_POST['$AddressLine2']) ? 'Unit 1600' : $_POST['$AddressLine1'];
    $City = empty($_POST['$City']) ? 'St. Paul' : $_POST['$City'];
    $State = empty($_POST['$State']) ? 'MN' : $_POST['$State'];
    $Zip = empty($_POST['$Zip']) ? '55101' : $_POST['$Zip'];
    $Phone = empty($_POST['$Phone']) ? '6121234567' : $_POST['$Phone'];
    $email = empty($_POST['$email']) ? 'Robert.Krall@ust.com' : $_POST['$email'];
    $CCNum = empty($_POST['$CCNum']) ? '123455667' : $_POST['$CCNum'];
    $CSC = empty($_POST['$CSC']) ? '765' : $_POST['$CSC'];
    $Edate = empty($_POST['$Edate']) ? '04/26/2018' : $_POST['$Edate'];
    
    
    
    
    ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <title>Check-Out</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="header">
            <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section"> 
            
            <?php $lookUpItem = new CheckOutController();?> 
            
            <form method="get" action="receipt.php">
            <table>
                <td>
                    <fieldset>
                        <legend>Price </legend>
                        <input type="text" name="price" value="<?php echo $lookUpItem->GetTotalFromCartHandler();?>">
                    </fieldset>
                    <fieldset>
                        <legend>Personal information:</legend>
                        <!--first name-->
                        First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
                        <span class="error">* <?php echo $fnameErr;?></span>
                        <br/>
                        <!--Last Name-->
                        Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
                        <span class="error">* <?php echo $lnameErr;?></span>
                        <br/>
                        <!--phone-->
                        Phone Number: <input type="text" name="Phone" value="<?php echo $Phone;?>">
                        <span class="error">* <?php echo $PhoneErr;?></span>
                        <br/>
                        <!--Email-->
                        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailErr;?></span>
                    </fieldset>
                    <fieldset>
                        <legend>Address Information</legend>
                        <!--Address Line 1-->
                        Address Line 1: <input type="text" name="AddressLine1" value="<?php echo $AddressLine1;?>">
                        <span class="error">* <?php echo $AddressLine1Err;?></span>
                        <br/>
                        <!--Address Line 2-->
                        Address Line 2: <input type="text" name="AddressLine2" value="<?php echo $AddressLine2;?>">
                        <span class="error">* <?php echo $AddressLine2Err;?></span>
                        <br/>
                        <!--city-->
                        City: <input type="text" name="City" value="<?php echo $City;?>">
                        <span class="error">* <?php echo $CityErr;?></span>
                        <br/>
                        <!--State-->
                        State: <input type="text" name="State" value="<?php echo $State;?>">
                        <span class="error">* <?php echo $StateErr;?></span>
                        <br/>
                        <!--Zip-->
                        Zip: <input type="number" name="Zip" value="<?php echo $Zip;?>">
                        <span class="error">* <?php echo $ZipErr;?></span>
                    </fieldset>    
                   <fieldset>
                        <legend>Payment Information</legend>
                        CC Number
                        Credit Card Number: <input type="number" name="CCNum" value="<?php echo $CCNum;?>">
                        <span class="error">* <?php echo $CCNumErr;?></span>
                        <br/>
                        CSC Number: <input type="number" name="CSC" value="<?php echo $CSC;?>">
                        <span class="error">* <?php echo $CSCErr;?></span>
                        <br/>
                        Expiration Date
                        Expiration Date: <input type="date" name="Edate" value="<?php echo $Edate;?>">
                        <span class="error">* <?php echo $EdateErr;?></span>
                    </fieldset>
                    
            
            
            
            
            
            </td>
            
            </table>
             <button type="submit" name="receipt">Receipt</button>
            
        </form>
            
        </div>

            
        
        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </body>
</html>