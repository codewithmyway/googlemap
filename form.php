<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>page refresh</title>
    <script type="text/javascript">
        // Detect when the tab gains focus
//     window.addEventListener("focus", function() {
//   // Refresh the page
 
//     window.location.reload();
// });
// Set the minimum time (in milliseconds) between reloads
const minimumReloadInterval = 30000; // 30 seconds

let lastReloadTime = 0;

// Function to reload the page if the minimum interval has passed
function reloadIfIntervalPassed() {
  const currentTime = Date.now();
  if (currentTime - lastReloadTime >= minimumReloadInterval) {
    lastReloadTime = currentTime;
    window.location.reload();
  }
}

// Detect when the tab gains focus
window.addEventListener("focus", function() {
  reloadIfIntervalPassed();
});

// You can also add an additional timer to refresh the page periodically
setInterval(reloadIfIntervalPassed, minimumReloadInterval);

    </script>
</head>
<body>
<h2>HTML Forms</h2>

<form action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" placeholder="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" placeholder="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>   
</body>
</html>