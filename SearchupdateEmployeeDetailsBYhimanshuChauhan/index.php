<?php 
include 'header.php'; ?>
<div id="main-content">
    <h2>Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Emp Code</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
  
      if(isset($_POST['showbtn'])  &&  $_POST['sid']){
        include 'config.php';

        $stu_id = $_POST['sid'];

        $sql = "SELECT * FROM employeemaster WHERE Id = '$stu_id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
          echo 'Record not found';
         }

        if(mysqli_num_rows($result) > 0)  {
          while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">First Name</label>
            <input type="hidden" name="id"  value="<?php echo $row['Id']; ?>" />
            <input type="text" name="fname" value="<?php echo $row['FirstName']; ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly" />
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lname" value="<?php echo $row['LastName']; ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly" />
        </div>
        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="designation" value="<?php echo $row['Designation']; ?>" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"  class="alphaonly" />
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" maxlength="10" name="phone" value="<?php echo $row['Phone']; ?> " onkeypress="if (isNaN( String.fromCharCode(event.keyCode) )) return false;" />
        </div>
        <div class="form-group">
        <label>Class</label>
        <select name="status" >
         <option value='0' <?php echo ($row['Status'] ==  '0') ? ' selected="selected"' : '';?>>Active</option>
         <option value='1' <?php echo ($row['Status'] ==  '1') ? ' selected="selected"' : '';?>>Inactive</option>
        
     </select>
    
    </div>
       
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
  }
}
}

    ?>
</div>
</div>


<script type="text/javascript">
$('.alphaonly').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^a-zA-Z]/g,'') ); }
);
</script>

</body>
</html>
