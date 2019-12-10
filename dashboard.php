<?php
session_start();
$host = "localhost";
$username = "root"; //for testing purpose
$password = ""; //for testing purpose
$database = "bugme";
$message = "";
try{
	$connect = new PDO("mysql:host=$host;dbname=$database", $username , $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $connect->query("SELECT * FROM issues");
	$issues = $statement->fetchAll(PDO::FETCH_ASSOC);

	$stmt2 = $connect->query("SELECT * FROM issues WHERE status='Open'");
	$open = $statement->fetchAll(PDO::FETCH_ASSOC);

}
catch(PDOException $error){
	$error->getMessage();
}
?>
<script>
	document.addEventListener('DOMContentLoaded', function(){
	    document.getElementById("openbtn").addEventListener("click", function(){
	        let table, tr, td, i;
	        table = document.getElementByTagName("table");
	        tr = table.getElementByTagName("tr");

	        for (i = 0; i < tr.length; i++){
	            td = tr[i].getElementByTagName("td")[0];
	            if (td){
	                if (td[2] == 'Open'){
	                    tr[i].style.display = "";
	                }else{
	                    tr[i].style.display = "none";
	                }
	            }
	        }
	    });

	    document.getElementById("ticketsbtn").addEventListener("click", function(){
	        let table, tr, td, i;
	        table = document.getElementByTagName("table");
	        tr = table.getElementByTagName("tr");

	        for (i = 0; i < tr.length; i++){
	            td = tr[i].getElementByTagName("td")[0];
	            if (td){
	                if (<?php echo '$issue["email"] == $_SESSION["email"]';?>){
	                    tr[i].style.display = "";
	                }else{
	                    tr[i].style.display = "none";
	                }
	            }
	        }
	    })

	    var btnContainer = document.getElementById("myBtnContainer");
	    var btns = btnContainer.getElementsByClassName("btn");
	    for (var i = 0; i < btns.length; i++) {
	      btns[i].addEventListener("click", function() {
	        var current = document.getElementsByClassName("active");
	        current[0].className = current[0].className.replace("active", "");
	        this.className += " active";
	      });
	    }
	}
</script>

