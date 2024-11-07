<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Notes</title> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="font-weight-bold mb-4">All Notes</h1>
        <a href="/notes/create" class="btn btn-success mb-3">Create New Note</a>
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php elseif (isset($notes) && count($notes) > 0): ?>
            <ul class="list-group">
                <?php foreach ($notes as $note): ?>
                    <li class="list-group-item">
                        <a href="/notes/<?php echo $note['id']; ?>" class="font-weight-bold"><?php echo htmlspecialchars($note['title']); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="alert alert-warning mt-3">There are currently no notes.</div>
        <?php endif; ?>
    </div>
</body>
</html>
