<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="font-weight-bold mb-4">Edit Note</h1>
        <form action="/notes/<?php echo $note['id']; ?>" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($note['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control" rows="5" required><?php echo htmlspecialchars($note['content']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Note</button>
        </form>
        <a href="/notes" class="btn btn-secondary mt-3">Back to All Notes</a>
    </div>
</body>
</html>
