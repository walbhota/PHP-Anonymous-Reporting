<!-- process.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $issue = $_POST["issue"];

    // Save the report to the reports.txt file
    $report = $category . "|" . $issue . PHP_EOL;
    file_put_contents("reports.txt", $report, FILE_APPEND);

    // Display success message or redirect to a thank you page
    $success = "Report submitted successfully!";
}
?>

<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Anonymous Reporting</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Anonymous Reporting</h1>

        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="category">Select Category:</label>
            <select id="category" name="category" required>
                <option value="Safety">Safety</option>
                <option value="Environment">Environment</option>
                <option value="Misconduct">Misconduct</option>
            </select>

            <label for="issue">Describe the Issue:</label>
            <textarea id="issue" name="issue" rows="5" required></textarea>

            <button type="submit">Submit Report</button>
        </form>
    </div>
</body>
</html>