<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>
    <script>
        function redirectToUrl() {
            // Prompt the user for confirmation
            var confirmed = confirm("Are you sure you want to proceed?");

            // If the user confirms, redirect to the specified URL
            if (confirmed) {
                document.getElementById('tt').submit();
            } 
        }
    </script>
</head>
<body>

        <form action="test_data.php" method="post" id="tt">
            <input type="hidden" name="name" value="Yash Solanki">
        </form>

    <button onclick="redirectToUrl()">Go to Page 1</button>

</body>
</html>
