<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
</head>
<body>
    <h1>Edit Note</h1>
    <form action="/notes/<?php echo $note['id']; ?>" method="POST">
        <input type="hidden" name="_method" value="PUT">

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($note['title']); ?>" required><br><br>

        <label for="content">Content:</label><br>
        <textarea name="content" id="content" required><?php echo htmlspecialchars($note['content']); ?></textarea><br><br>

        <button type="submit">Update Note</button>
    </form>
    <a href="/notes">Back to All Notes</a>
</body>
</html>
