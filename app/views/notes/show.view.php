<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
</head>
<body>
    <?php if (isset($note)): ?>
        <h1><?php echo htmlspecialchars($note['title']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>
        <a href="/notes">Back to All Notes</a>
        <a href="/notes/<?php echo $note['id']; ?>/edit">Edit</a>
        <form action="/notes/<?php echo $note['id']; ?>" method="POST" style="display:inline;">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit">Delete</button>
        </form>
    <?php else: ?>
        <p>Note not found.</p>
    <?php endif; ?>
</body>
</html>
