    <div class="categories-container">

    <?php $selectedCategory = $_GET['category'] ?? 'All' ?? 'Men' ?? 'Women' ?? 'Accessories'; ?>

        <li class="categories-choice">
            <ul>
                <a href="<?= base_url('view-landing.php') ?>" class="a-category <?= $selectedCategory === 'All' ? 'active' : '' ?>">
                    All
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Men') ?>" class="a-category <?= $selectedCategory === 'Men' ? 'active' : '' ?>"">
                    Men's Clothing
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Women') ?>" class="a-category <?= $selectedCategory === 'Women' ? 'active' : '' ?>">
                    Women's Clothing
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Accessories') ?>" class="a-category <?= $selectedCategory === 'Accessories' ? 'active' : '' ?>">
                    Accessories
                </a>
            </ul>
        </li>
    </div>