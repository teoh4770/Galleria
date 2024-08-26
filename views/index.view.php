<?php include view("partials/head.php"); ?>

<?php include view("partials/header.php"); ?>

<main class="[ container ]">
    <ul class="[ stacked ]" role="list">
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $image): ?>
                <li class="[ stacked ] [ p-2 border-[1px] border-solid rounded border-black ]">
                    <p><strong>Name:</strong> <?= htmlspecialchars($image['name']) ?></p>
                    <p><strong>Year:</strong> <?= htmlspecialchars($image['year']) ?></p>
                    <p><strong>Description:</strong> <?= htmlspecialchars($image['description']) ?></p>
                    <div class="flex">
                        <p><a href="<?= htmlspecialchars($image['source']) ?>" class="[ max-content text-[0.75rem]/[0.938rem] text-slate-500 capitalize hover:text-black hover:underline ]" target="_blank" rel="noopener noreferrer">Source</a></p>
                        <p><a href="/image?id=<?= htmlspecialchars($image['id']) ?>" class="[ max-content text-[0.75rem]/[0.938rem] text-slate-500 capitalize hover:text-black hover:underline ]">link to page</a></p>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No images available.</li>
        <?php endif ?>
    </ul>
</main>

<?php include view("partials/foot.php"); ?>