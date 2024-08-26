<?php include view("partials/head.php"); ?>

<?php include view("partials/header.php"); ?>

<main class="[ container ] [ min-h-full ]">
    <ul id="cards" class="[ masonry ] [ hidden ]" role="list">
        <?php foreach ($images as $image): ?>
            <li>
                <a href="/image?id=<?= $image["id"] ?>" aria-label="View image <?= htmlspecialchars($image['name']) ?>">
                    <figure class="[ pile ] [ relative ] [ card ]">
                        <img
                                class="[ w-full ]"
                                src="<?= htmlspecialchars($image["images"]["gallery"]["src"]) ?>"
                                alt="<?= htmlspecialchars($image["name"]) ?> by <?= htmlspecialchars($image["artist"]["name"]) ?>"
                        >
                        <figcaption class="[ card__content ]">
                            <h2 class="[ text-[1.5rem]/[1.75rem] z-10 ]"><?= htmlspecialchars($image["name"]) ?></h2>
                            <p class="[ text-[0.813rem]/[1.063rem] opacity-75 z-10 ]"><?= htmlspecialchars($image["artist"]["name"]) ?></p>
                        </figcaption>
                    </figure>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<script>
    window.addEventListener("load", () => {
        const $gallery = document.getElementById("cards");
        $gallery?.classList.remove("hidden");
    })
</script>

<?php include view("partials/foot.php"); ?>