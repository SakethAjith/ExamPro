<!DOCTYPE HTML>
<?php $corect=0?>
<?php 
$corect=0;
if( isset($_GET['submit']) )
{
    for($k=1;$k<66;$k++){
       if($_GET['$k']==$correct[$k]) $corect++;
    }
    $result=$corect;
    if( isset($result) ) echo $result;
}
?>
<html>
<head>
<head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
</head>
<body>
<?php
session_start();

$db = mysqli_connect("localhost","root","password","quizdbase1"); //keep your db name
?>
<div class="container">
<h1></h1>
<h1 class="text-center" > GRE mock test</h1>
<h1></h1>
<form action="GRE_RES.php" method="post">
<?php
for($i=1;$i<52;$i++){
$sql = "SELECT * FROM questions2 ORDER BY RAND() LIMIT 1";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['question'] ).'"/>';
?>
<?php
$temp=0*($i-1)+1;
?>
<div>
<input type="radio" name="quizcheck[<?php echo $i; ?>]"  value=1 ><?php $sql1="SELECT * FROM answers2 WHERE aid=$temp"; $db1=$db->query($sql1); $row1=mysqli_fetch_array($db1); echo $row1['answer'];?><br>
<input type="radio" name="quizcheck[<?php echo $i; ?>]" value=2><?php $sql2="SELECT * FROM answers2 WHERE aid=$temp+1"; $db2=$db->query($sql2); $row2=mysqli_fetch_array($db2); echo $row2['answer'];?><br>
<input type="radio" name="quizcheck[<?php echo $i; ?>]" value=3><?php $sql3="SELECT * FROM answers2 WHERE aid=$temp+2"; $db3=$db->query($sql3); $row3=mysqli_fetch_array($db3); echo $row3['answer'];?><br>
<input type="radio" name="quizcheck[<?php echo $i; ?>]" value=4><?php $sql4="SELECT * FROM answers2 WHERE aid=$temp+3"; $db4=$db->query($sql4); $row4=mysqli_fetch_array($db4); echo $row4['answer'];?><br>
<input type="radio" name="quizcheck[<?php echo $i; ?>]" value=5><?php $sql5="SELECT * FROM answers2 WHERE aid=$temp+4"; $db5=$db->query($sql5); $row5=mysqli_fetch_array($db5); echo $row5['answer'];?><br>
<?php
$temp=$temp+1;
?>
</div>
<?php
}

?>
<br>
<input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
</form>
</div>
</body>
</html>
