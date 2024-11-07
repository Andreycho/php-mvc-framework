<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($note)): ?>
            <h1 class="font-weight-bold"><?php echo htmlspecialchars($note['title']); ?></h1>
            <p class="lead"><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>
            <a href="/notes" class="btn btn-primary mr-2">Back to All Notes</a>
            <a href="/notes/<?php echo $note['id']; ?>/edit" class="btn btn-warning mr-2">Edit</a>
            <form action="/notes/<?php echo $note['id']; ?>" method="POST" style="display:inline;">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        <?php else: ?>
            <div class="alert alert-danger mt-3">Note not found.</div>
        <?php endif; ?>
    </div>
</body>
</html>
