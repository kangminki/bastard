<html>
    <head>
		<link rel="stylesheet" href="public/css/bootstrap.css">
		<link rel="stylesheet" href="public/css/layout.css">
        
        <script src="public/js/jquery-2.1.1.min.js"></script>
		<script src="public/js/bootstrap.js"></script>
		<script src="public/js/app.js"></script>
        <title>Add Client</title>
	</head>
    
<body><p/>
<?php
    if (empty($_POST["client_id"]))
    {
?>
      <form id="add-client" method="post" action="add-client.php">
          <div class="form-group">
            <label>Client ID</label><input type="text" class="form-control" placeholder="Enter client ID" name="client_id">
          </div>
          <div class="form-group">
            <label>Family Name</label><input type="text" class="form-control" placeholder="Enter your family name" name="client_familyname">
          </div>
          <div class="form-group">
            <label>Given Name</label><input type="text" class="form-control" placeholder="Enter your given name" name="client_givenname">
          </div>
          <div class="form-group">
            <label>Street</label><input type="text" class="form-control" placeholder="Enter your street number and name" name="client_street">
          </div>
          <div class="form-group">
            <label>Suburb</label><input type="text" class="form-control" placeholder="Enter your suburb" name="client_suburb">
          </div>
          <label>State</label>
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                Select State&nbsp;&nbsp;<span class="caret"></span>
            </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ACT</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">NSW</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">NT</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">SA</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">TAS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">VIC</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">WA</a></li>
                </ul><p/>
        </div>
          <div class="form-group">
            <label>Postcode</label><input type="text" class="form-control" placeholder="Enter your postcode" name="client_pc">
          </div>
          <div class="form-group">
            <label>E-mail</label><input type="text" class="form-control" placeholder="Enter your e-mail address" name="client_email">
          </div>
          <div class="form-group">
            <label>Phone</label><input type="text" class="form-control" placeholder="Enter your phone number" name="client_phone">
          </div>
          <div class="form-group">
            <label>Mobile</label><input type="text" class="form-control" placeholder="Enter your mobile number" name="client_mobile">
          </div>
          <div class="form-group">
            <label>Mailing List</label><input type="text" class="form-control" placeholder="Bullet option here" name="client_mailinglist">
          </div>
        <center><input type="submit" value="Add Details" />
        <input type="reset" value="Reset Form" /></center>
      </form>
<?php
    }
    else
    {
      include("connection.php");
      $conn = oci_connect($UName,$PWord,$DB) or die("Couldn't logon.");
      $query = "INSERT INTO client (client_id, client_surname, client_givenname, client_street, client_suburb, client_state, client_pc, client_email, client_phone, client_mobile, client_mailinglist) VALUES
        (cust_no_seq.nextval,'".$_POST["client_id"]."','".$_POST["client_surname"]."','".$_POST["client_givenname"]."','".$_POST["client_street"]."','".$_POST["client_suburb"]."','".$_POST["client_state"]."','".$_POST["client_pc"]."','".$_POST["client_email"]."','".$_POST["client_phone"]."','".$_POST["client_mobile"]."','".$_POST["client_mailinglist"]."')";
        
      $stmt = oci_parse($conn,$query);
      oci_execute($stmt);
      $query = "SELECT * FROM client";
      $stmt = oci_parse($conn,$query);
      oci_execute($stmt);
?>
<?php
      while ($row = oci_fetch_array ($stmt))
      {
?>
        <?php echo $row["client_id"];           ?>
        <?php echo $row["client_surname"];      ?>
        <?php echo $row["client_givenname"];    ?>
        <?php echo $row["client_street"];       ?>
        <?php echo $row["client_suburb"];       ?>
        <?php echo $row["client_state"];        ?>
        <?php echo $row["client_pc"];           ?>
        <?php echo $row["client_email"];        ?>
        <?php echo $row["client_phone"];        ?>
        <?php echo $row["client_mobile"];       ?>
        <?php echo $row["client_mailinglist"];  ?>
<?php
      }
?>
      
<?php
      oci_free_statement($stmt);
      oci_close($conn);
    }
?>
  </body>
</html>