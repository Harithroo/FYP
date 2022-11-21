<!-- (A) SEARCH FORM -->
<form method="post" action="osearch1.php">
    <h1>SEARCH FOR USERS</h1>
    <input type="text" name="search" required />
    <input type="submit" value="Search" />
</form>

<?php
// (B) PROCESS SEARCH WHEN FORM SUBMITTED
if (isset($_POST["search"])) {
    // (B1) SEARCH FOR USERS
    require "osearch2.php";

    // (B2) DISPLAY RESULTS
    
    while ($r = mysqli_fetch_assoc($results)) {
        if (count($r) > 0) {
            echo "<div>" . $r["nic"] . " - " . $r["licence number"] . " - " . $r["name"] . " - " . $r["address"] . "</div>";
        } else {
            echo "No results found";
        }
    }
}

// include("oprocess.php");
//     $SQLsearch = "SELECT * FROM `owners` WHERE `name` LIKE 'hello' OR `nic` LIKE '22'";
//     $exeSQLsearch = mysqli_query($conn, $SQLsearch) or die(mysqli_error($conn));
    
//     while ($arraysearch = mysqli_fetch_assoc($exeSQLsearch)) {
//         if (count($arraysearch) > 0) {
//             echo "<div>" . $arraysearch["nic"] . " - " . $arraysearch["licence number"] . " - " . $arraysearch["name"] . " - " . $arraysearch["address"] . "</div>";
//         } else {
//             echo "No results found";
//         }
//     }
?>
















<!-- (A) SEARCH FORM -->
<!-- <form onsubmit="return ajsearch();">
  <h1>SEARCH FOR USERS</h1>
  <input type="text" id="search" required/>
  <input type="submit" value="Search"/>
</form> -->

<!-- (B) SEARCH RESULTS -->
<!-- <div id="results"></div>
<script>
function ajsearch () {
  // (A) GET SEARCH TERM
  var data = new FormData();
  data.append("search", document.getElementById("search").value);
  data.append("ajax", 1);
 
  // (B) AJAX SEARCH REQUEST
  fetch("osearch2.php", { method:"POST", body:data })
  .then(res => res.json()).then((results) => {
    var wrapper = document.getElementById("results");
    if (results.length > 0) {
      wrapper.innerHTML = "";
      for (let res of results) {
        let line = document.createElement("div");
        line.innerHTML = `${res["name"]} - ${res["nic"]}`;
        wrapper.appendChild(line);
      }
    } else { wrapper.innerHTML = "No results found"; }
  });
  return false;
}
</script> -->