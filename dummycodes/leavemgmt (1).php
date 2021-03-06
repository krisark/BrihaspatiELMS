<?php
include('session.php');
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LeaveApplication</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>


</head>
<body onload="fetchleavetype()">
<div class="container">
<h1> LeaveManagementSystem<small color='#111'>byBrihaspati@IITK</small></h1>
<div class="topnav" id="myTopnav">
  <a href="#" >Available Leave</a>
  <a href="#">Pending Leave Status</a>
  <a href="#" class="active">Apply Leave</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!--<div style="padding-left:16px">

</div>-->

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<div class="jumbotron">
  <h3>ApplyLeave</h3>
  <form id="leaveinputform">
    <div class = "form-group">
      <label for = "leavetypeInput">Leave type</label>
      <select name="la_type" style="width:100%;" id="mySelect">
          <option value=" ">---------Select Leave Type---------</option>



      </select>
    </div>


    <div class = "form-group">
      <label for = "leaveremainInput">Leave Reamining</label>
      <input type = " " class="form-control" id="leaveremainInput">
      </div>



           <div class = "form-group">
      <label for = "leaveDescInput">Purpose of Leave:<font color='Red'> *</font> </label>

      <input type = "text" class="form-control" id=leaveDescInput" placeholder = "add leave purpose....">


    </div>
<div>
<form action="http://172.26.82.38/~deepika/brihCI/sisindex.php/leavemgmt/leaveapply" method="POST" class="form-inline">
<table>
    <tr>
			<td><label for="lt_remarks" class="control-label"> From Date: <font color='Red'> *</font> </label></td>
         <td><input type="text" name="applied_la_from_date" id="StartDate" class="form-control" value=""  style="width:100%" /></td>
		 	 	<script src="http://172.26.82.38/~deepika/brihCI/assets/js/jquery.datetimepicker.full.js"></script>

          <script>


               $.datetimepicker.setLocale('en');
               $('#StartDate').datetimepicker({
               dayOfWeekStart : 1,
               lang:'en',
               formatTime:'H:i',
               formatDate:'Y-m-d',
					minDate:0,
               });
               //step 5 for give minute duration
               $('#StartDate').datetimepicker();
             </script>
		</tr>
		      <tr>
			            <td><label for="lt_remarks" class="control-label">To Date: <font color='Red'> *</font> </label></td>
         <td><input type="text" name="applied_la_to_date" id="LastDate" class="form-control" style="width:100%" /></td>
		   	 <script>
					$.datetimepicker.setLocale('en');
					$('#LastDate').datetimepicker({
					dayOfWeekStart : 1,
					lang:'en',
					formatTime:'H:i',
					formatDate:'Y-m-d',
					minDate:0,
					});
					//step 5 for give minute duration
					$('#LastDate').datetimepicker();
				 </script>
		     </tr>
  </table>

<div>
  <br/>
  <br/>
  <br/>
<button type="submit" class="btn btn-primary">Apply Leave</button>
   <button name="reset" class="btn btn-primary" >Clear</button>
</form>
</div>
<div class="col-lg-12">
  <div id ="leavelist">
  </div>
</div>
<br/>
<br/>
<br/>
<div class="footer">
  <p>&copy Brihaspati@IITK</p>
</div>
</div>
<script src="https://chancejs.com/chance.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

0
<script src="C:\Users\gaurav\Desktop\folder\code.js">
</script>
</body>
</html>
000
