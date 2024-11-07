<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
</head>
<body>
    <h1>All Notes</h1>
    <a href="/notes/create">Create New Note</a>
    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php elseif (isset($notes) && count($notes) > 0): ?>
        <ul>
            <?php foreach ($notes as $note): ?>
                <li>
                    <a href="/notes/<?php echo $note['id']; ?>"><?php echo htmlspecialchars($note['title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>There are currently no notes.</p>
    <?php endif; ?>
</body>
</html>
