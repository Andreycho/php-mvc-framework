<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Note</title>
</head>
<body>
    <h1>Create a New Note</h1>
    <form action="/notes" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" id="content" required></textarea><br><br>

        <button type="submit">Create Note</button>
    </form>
    <a href="/notes">Back to All Notes</a>
</body>
</html>
