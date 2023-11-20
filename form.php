<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance Register Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/loader.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script src="javascript/signature.js"></script>

</head>
<body>
<div id="loader-container">
        <div class="loader"></div>
    </div>

    <div class="date-time">
        <p id="date-time"></p>
    </div>

<div class="form-container">
    <div class="center-content">
        <img src="images/fpt_logo.jpg" alt="Logo" class="logo">
        <h2 class="form-title">Attendance Register</h2>
    </div>

    <form action="php/submit.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"placeholder="Enter your name" required><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your surname" required><br>

        <label for="idNumber">ID Number:</label>
        <input type="text" id="id_number" name="id_number" maxlength="13" title="Please enter a 13-digit ID number" placeholder="Enter your ID number" required><br>
        
        <label for="group">Group Name:</label>
        <select id="group" name="group">
            <script>
                for (let letter = 'A'; letter <= 'Z'; letter = String.fromCharCode(letter.charCodeAt(0) + 1)) {
                    document.write(`<option value="Group ${letter}">Group ${letter}</option>`);
                }
            </script>
            
            <script>
                for (let tens = 'A'; tens <= 'A'; tens = String.fromCharCode(tens.charCodeAt(0) + 1)) {
                    for (let ones = 'A'; ones <= 'K'; ones = String.fromCharCode(ones.charCodeAt(0) + 1)) {
                        document.write(`<option value="Group ${tens}${ones}">Group ${tens}${ones}</option>`);
                    }
                }
            </script>
        </select>

        <div class="signature-container">
            <label for="signature">Signature:</label>
            <canvas id="signature-pad" name="signature-pad" placeholder="Sign Here" width="300" height="130" style="border: 1px solid #ccc;"></canvas><br><br>
        </div>

        <input type="button" id="clearButton" value="Clear Signature" onclick="clearSignature()">
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    function updateDateTime() {
        var dateTimeElement = document.getElementById("date-time");
        var currentDateTime = new Date();
        dateTimeElement.textContent = currentDateTime.toLocaleString();
    }

    updateDateTime(); // Update immediately
    // Update the date and time every second
    setInterval(updateDateTime, 1000);
</script>

<script src="javascript/loader.js"></script>

</body>
</html>