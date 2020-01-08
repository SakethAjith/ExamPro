<?php
session_start();

$db = mysqli_connect("localhost","root","password","quizdbase1"); //keep your db name
   	// if($con){
   	// 	echo"connection";
   	// }
   	// mysqli_select_db($con,'quizdb');
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style type="text/css">
	.animateuse{
			animation: leelaanimate 0.5s infinite;
		}

@keyframes leelaanimate{
			0% { color: red },
			10% { color: yellow },
			20%{ color: blue }
			40% {color: green },
			50% { color: pink }
			60% { color: orange },
			80% {  color: black },
			100% {  color: brown }
		}
</style>

   </head>
   <body>
     <div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-success text-uppercase animateuse" > IELTS MOCK TEST RESULTS</h1>
    	<br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

	         <?php
         $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
            if(!empty($_POST['quizcheck'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['quizcheck']);
            // print_r($_POST);
            ?>

        	<td>
            <?php
            echo "Out of 66, You have attempt ".$checked_count." option."; ?>
            </td>
        
          	
            <?php
            // Loop to store and display values of individual checked checkbox.
            try{
            $selected = $_POST['quizcheck'];
            
            $q1= " select ans_id from questions1 ";
            $ansresults =$db->query($q1);
            $i = 1;
            while($rows = mysqli_fetch_array($ansresults)) {
              // print_r($rows);
              if($i==66) break;
              error_reporting(0);
              $flag = $rows['ans_id'] == $selected[$i];
              error_reporting(0);
            	
            			if($flag){
            				// echo "correct ans is ".$rows['ans']."<br>";				
            				$counter++;
            				$Resultans++;
            				// echo "Well Done! your ". $counter ." answer is correct <br><br>";
            			}else{
            				$counter++;
            				// echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
            			}					
            		$i++;		
              }
            }
            catch(Exception $e){

            }
            	?>
            	
    		
    		<tr>
    			<td>
    				Your Total score
    			</td>
    			<td colspan="2">
          <?php 
          
        
               try{
                echo " Your score is ". $Resultans.".";
              }
          
            catch(Exception $e){

            }
          }
	            // else{
	            // echo "<b>Please Select Atleast One Option.</b>";
	            // }
	            } 
	          ?>
	          </td>
            </tr>

            <?php 

            // $name = $_SESSION['username'];
            // $finalresult = " insert into usersession(name,u_q_id, u_a_id) values ('$name','5','$Resultans') ";
            // $queryresult= mysqli_query($con,$finalresult); 
            // if($queryresult){
            // 	echo "successssss";
            // }
            ?>


      </table>

      	<!-- <a  class="btn btn-success"> LOGOUT </a> -->
      </div>
   </body>
</html>











