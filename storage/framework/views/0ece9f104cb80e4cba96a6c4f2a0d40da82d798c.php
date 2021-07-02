<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman Numerals Conversion</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 theme-bg border-bottom shadow-md">
        <a class="navbar-brand brand-light my-0 mr-md-auto" href="#">
       Assessment - Roman Numerals
        </a>

       <!-- <a href="add-employee.php" class="nav-link active text-light">Add Conversion</a>
        <a href="employee-details.php" class="nav-link text-light">Roman Numerals Details</a>
        <button  class="nav-link active ">Add Conversion</button>
        <button  class="nav-link">Roman Numerals Details</button>-->
      </div>

      <div class="container h-100">
        <div class="row align-items-center h-100" >
            
            
          <div class="col-8 mx-auto">

                <div class="shadow-lg bg-white mt-4">
                    <div class="col text-center p-3">
                    Roman Numerals Conversion
                    </div>
                    <form id="romanForm">
                    <!--<div class="form-group mx-4 mt-4">
                            <input type="hidden" id="roman_conversion_id" name="roman_conversion_id" class="form-control" placeholder="roman_conversion_id">
                        </div>-->
                        <div class="form-group mx-4 mt-4">
                            <input type="text" id="integer_value" name="integer_value" required class="form-control integer_value" placeholder="Integer">
                        </div>
                        <!--<div class="form-group mx-4 mt-4">
                            <label for="employeedoj">Creation Date</label>
                            <input type="date" name="date" id="employeedoj"  class="form-control" placeholder="Date of Joining">
                        </div>-->
                        
                        <button id="submit" class="btn btn-success btn login-btn btn-block my-4">Submit</button>
                    </form>
                </div>
                
          </div>
        </div>
          
      </div>

      <div class="container h-100 ">
        <div class="row align-items-center h-100" >
          <div class="col-12 mx-auto ">
                <div class="shadow-lg bg-white mt-4 ">
                <table class="table">
                    <thead>
                        <tr>
                       
                        <th scope="col">ID</th>
                        <th scope="col">Integer Value</th>
                        <th scope="col">Roman Letter</th>
                        <th scope="col">Created Date</th>
                        
                        </tr>
                    </thead>
                    <tbody> 
	<?php foreach ($romandata as $key => $value): ?>
<tr>
     <td><?php echo $key+1; ?></td>
     <td><?php echo e($value->integer_value); ?></td>
	 <td><?php echo e($value->roman_letter); ?></td>
   <td><?php echo e($value->created_at); ?></td>
	
	 </tr>
	<?php endforeach; ?>

</tbody>
                    </table>
                </div>
                
          </div>
        </div>
          
      </div>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

        /*Numeric Validation*/
        $(document).on('keypress', '.integer_value', function(ev){
          var regex = new RegExp("^[0-9.]+$");
              var str = String.fromCharCode(!ev.charCode ? ev.which : ev.charCode);
              if (regex.test(str)) {
                return true;
              }
              ev.preventDefault();
              return false;
        });
        /*End*/

        $('#romanForm').on('submit',function(e){
        e.preventDefault();
    
        let roman_conversion_id = $('#roman_conversion_id').val();
        let integer_value = $('#integer_value').val();

        $.ajax({
          url: "/roman",
          type:"POST",
          data:{
            "_token": "<?php echo e(csrf_token()); ?>",
            roman_conversion_id:roman_conversion_id,
            integer_value:integer_value,
          
          },
          success:function(response){
            alert(JSON.stringify(response));
            window.location.reload();
          },
         });
    });
});
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Roman\resources\views/roman/form.blade.php ENDPATH**/ ?>