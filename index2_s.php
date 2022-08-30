<?php
if(isset($_POST['plog'])){
    session_destroy();
    header("location:signin.php");
    }

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Comment System using PHP and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

  <style>
    .dnav{
background-color: #2397f6;
height: 70px;
display: flex;
    }

    .dleft{
      /*  background-color: red;*/
        width: 50%;
       float: left;
    }

    .dleft p{
        margin-top: 18px;
        font-size: 20px;
        font-weight: bolder;
        padding-left: 40px;
        color: white;
    }

    .dright{
       /* background-color: aqua;*/
        width: 50%;
        padding-right: 40px;
    }

    .dlink{
        display: flex;
        justify-content: end;
    }
    .dlink li{
        list-style-type: none;
    }
    .dlink a{
        text-decoration: none;
        padding: 10px;
        margin-top: 5px;
        font-size: 25px;
        display: inline-block;
    }
    .dlink button{
        background-color:  #2397f6;
    }
  

    .discu_style{
        font-size: 40px;
         color: white;
         font-weight: bolder;
         border: 2px solid white;
         margin-left: 20%;
         margin-right: 20%;   
         border-radius: 5px;
         padding-top: 10px;
         padding-bottom: 10px;
    }

    .pro{
        margin-top: 25px;
        color: white;
    }
  </style>

</head>


 <body style="background-color: #0873CC">


 <div class="dnav">
<div class="dleft">
    <p>
    <img src="photos/menu.png" alt="">
    CSE-326(Section-A)
    </p>
</div>
<div class="dright">
    <ul class="dlink">

        <li class="nav-item">

    <form action="" method="POST">
    <a href="index.php"><img src="photos/home.png"  class="logo" alt=""></a>
    <a href="perform_s.php"><img src="photos/arrow (2).png"  class="logo" alt=""></a>
   <button class="btn " type="submit" name="plog"><img src="photos/check-out.png" alt=""></button>
    </form>
   
   </li>

   <li class="nav-item mt-2 pro"> <p class="text-light">
   <img src="photos/user (5).png" alt="">
   <?php
   session_start(); 
        echo $_SESSION['name']  ;
       ?> 
   </p></li>
    </ul>
</div>

 </div>

  
  <h2  align="center" class="discu_style">Discussion Box</h2>
  
  <div class="container" style="background-color: #ffffff; border-radius:5px;">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="text" disabled required hidden name="comment_name" id="comment_name" class="" placeholder="" /> 
    </div>

    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="8"></textarea>
    </div>

    <div class="form-group" >
     <input type="hidden" name="comment_id" id="comment_id" value="0"  />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message" ></span>
   <br />
   <div id="display_comment"></div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
