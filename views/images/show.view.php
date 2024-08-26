<?php include view("partials/head.php"); ?>

<?php include view("partials/header.php"); ?>

<main class="[ container ] [ min-h-full faded ] [ gallery ]">
    <section class="[ relative max-w-[50rem] ]">
        <article class="[ pile ] [ relative ]">
            <picture>
                <source srcset="<?= htmlspecialchars($image["images"]["hero"]["large"]) ?>" media="(min-width: 48rem)" />
                <img class="[ md:max-w-[30rem] md:max-h-[35rem] ]" src="<?= htmlspecialchars($image["images"]["hero"]["small"]) ?>" alt="Image of <?= htmlspecialchars($image["name"]) ?>" />
            </picture>
            <button
                    type="button"
                    id="show-button"
                    class="[ flex self-start items-center | p-4 m-4 | bg-black/75 text-[--white] | uppercase | hover:bg-black/85 hover:text-[--white] | xl:self-end ] [ button ]"
                    tabindex="1"
            >
                <img src="./assets/shared/icon-view-image.svg" alt="View icon">
                <span>view image</span>
            </button>
        </article>

        <div class="[ grid gap-2 | relative top-[-3.25rem] | w-[86%] | md:absolute md:top-[-1px] md:right-0 md:max-w-[27.8rem] md:w-full ]">
            <div class="[ grid gap-y-2 | p-7 | bg-white | md:gap-y-7 md:p-0 md:pl-16 md:pb-16  ]">
                <h2 class="[ text-[1.5rem]/[1.75rem] | md:text-[3.5rem]/[4rem] ]"><?= htmlspecialchars($image["name"]) ?></h2>
                <p class="[ text-[0.938rem]/[1.188rem] | text-slate-500 ]"><?= htmlspecialchars($image["artist"]["name"]) ?></p>
            </div>
            <img
                src="<?= htmlspecialchars($image["artist"]["image"]) ?>"
                class="[ w-16 h-16 aspect-square | ml-4 | md:ml-auto md:w-32 md:h-32 | xl:ml-[40%] xl:mt-[10%] ]"
                alt="Portrait of <?= htmlspecialchars($image["artist"]["name"]) ?>"
            >
        </div>
    </section>

    <!-- Details   -->
    <!--
        /*padding-inline: 7.2rem;*/
        /* half of the text size + distance between year and image */
        /* 100px + 64px = 164px */
        /*margin-block-start: 164px;*/

    -->
    <div class="[ grid gap-16 relative | isolate | md:px-[7.2rem] md:mt-[164px] | xl:p-0 xl:m-0 xl:pt-[7.2rem] ]">
        <span class="[ year-quote ]">
            <?= $image["year"]?>
        </span>
        <p class="[ text-slate-500 | xl:w-3/4 ]"><?= htmlspecialchars($image["description"]) ?></p>
        <a href="<?= htmlspecialchars($image["source"]) ?>" class="[ w-max h-max | text-[0.563rem]/[0.688rem] tracking-wide | text-slate-500 | uppercase underline | hover:text-black]" target="_blank" rel="noopener noreferrer">Go To Source</a>
    </div>
</main>

<!-- Modal dialog for viewing the image -->
<dialog class="[ p-[unset] | bg-transparent | border-transparent | backdrop:bg-black/85 ]" aria-label="Image Viewer">
    <div class="[ grid gap-10 ]">
        <button
            class="[
                ml-auto |
                text-[0.875rem]/[1.75rem] tracking-wide |
                bg-transparent text-white/80 |
                uppercase |
                hover:text-white
            ]"
            autofocus
            aria-label="Close Image Viewer"
        >
            Close
        </button>
        <img src="<?= htmlspecialchars($image["images"]["gallery"]["src"]) ?>" alt="<?= htmlspecialchars($image['name']) ?> by <?= htmlspecialchars($image['artist']['name']) ?>">
    </div>
</dialog>

<!-- Footer with image navigation controls -->
<footer class="[ container | relative | py-4 ]">
    <article class="[ flex justify-between items-center ]">
        <div class="[ absolute top-0 left-0 | w-full h-[1px] | bg-black/15 ]">
            <div
                id="progress-indicator-bar"
                class="[ h-[1px] | bg-black | z-10 ]"
                aria-valuemin="0"
                aria-valuemax="<?= count($images) - 1 ?>"
                aria-valuenow="<?= $image['id'] ?>"
                role="progressbar"
            >
            </div>
        </div>

        <div class="infos">
            <p class="[ capitalize ]"><?= htmlspecialchars($image['name']) ?></p>
            <p class="[ text-[0.625rem] capitalize | text-black/75 ]"><?= htmlspecialchars($image['artist']['name']) ?></p>
        </div>

        <article aria-label="Slides navigation">
            <div class="[ flex gap-6 | md:gap-10 ]">
                <a id="prev" href="/image?id=<?= previous_step($id, count($images)) ?>" aria-label="Previous Image">
                    <img src="./assets/shared/icon-back-button.svg" alt="Back">
                </a>
                <a id="next" href="/image?id=<?= next_step($id, count($images)) ?>" aria-label="Next Image">
                    <img src="./assets/shared/icon-next-button.svg" alt="Next">
                </a>
            </div>
        </article>
    </article>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Elements
        const $previousButton = document.getElementById('prev');
        const $nextButton = document.getElementById('next');
        const $dialog = document.querySelector('dialog');
        const $showButton = document.querySelector('#show-button');
        const $closeButton = document.querySelector('dialog button');
        const $progressIndicator = document.getElementById('progress-indicator-bar');

        // Keyboard navigation for slides
        const keyActions = {
            'ArrowLeft': () => $previousButton?.click(),
            'ArrowRight': () => $nextButton?.click(),
        }

        document.addEventListener('keyup', (event) => {
            const action = keyActions[event.key];

            if (action) {
                action();
            }
        })

        // Dialog controls
        $showButton?.addEventListener('click', () => $dialog.showModal());
        $closeButton?.addEventListener('click', () => $dialog.close());

        // Update progress bar width
        const min = parseInt($progressIndicator.getAttribute('aria-valuemin'));
        const max = parseInt($progressIndicator.getAttribute('aria-valuemax'));
        const currentVal = parseInt($progressIndicator.getAttribute('aria-valuenow'));

        updateProgressBar($progressIndicator, currentVal, min, max);

        function updateProgressBar(element, current, min, max) {
            const percentage = ((current - min) / (max-min)) * 100;
            element.style.width = `${percentage}%`;
        }
    })

    window.addEventListener("load", () => {
        const $main = document.querySelector('main');
        $main.classList.toggle('faded');
    })
</script>


<?php include view("partials/foot.php"); ?>
