<?php
 session_start();
  if(!isset($_SESSION['email']))
{
   header("location:index(1).html");
 }
  ?>
  <!DOCTYPE HTML>
<html>
<head>
  <title>New Item</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
               $("#cap").hide();
            $("#state").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() != "cap") {
                    $("#cons").show();
                    $("#cap").hide();
                }else{
                    $("#cap").show();
                    $("#cons").hide();
                } 
            });
        });
    </script>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<style type="text/css">
 table {
    background-color: #00C6F0;
    color: white;
    width: 80%;
    height: 75%;
 }

 input[type=text], select,input[type=number],textarea {
    width: 80%%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 80%%;
    background-color: #00C6F0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #00bbe6;
}

</style>
 
<?php
include 'db.php';
 include 'newhead.php';
 

?>

  <div id="content">
        <!-- insert the page content here -->
        <h1>Stock</h1> 
      <form id="form2" method="post" action="additemb.php">
        <select id="state" name="state" >
            <option value="con">Consumable</option>
            <option value="cap">Capital</option>
        </select>
        <div id="cons">
         Value::<br>  
       <input type="text" name="value"><br>
       Unit::<br>  
       <input type="text" name="unit" ><br>
       Family::<br>
       <input type="text" name="family"><br>
       Number::<br>
       <input type="number" name="number" min="0" ><br> 
      Description::<br>
       <input type="text" name="desc1"><br>
       </div>

       <div id="cap">
       Name::<br>
       <input type="text" name="name"><br>
       Description::<br>
       <input type="text" name="desc2"><br>
       </div>
       <input type="submit" name="submit" value="Add">
      </form> 




              </div>
  </div>
  <!--    <div id="content_footer"></div>
    <div id="footer">
     <p><a href="index.php">Home</a> | <a href="request.php">Request</a> | <a href="stock.php">Stock</a> | <a href="return.php">Return</a>
     | <a href="due.php">Dues</a> </p>
      <p>Copyright &copy; simplestyle_blue_trees | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
 -->     
  </div>
    <script>
function selects()
{
document.getElementById("stock").className = "selected";
  }
    
 

</script>
</body>
</html>
