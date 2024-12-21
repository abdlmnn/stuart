<?php if(!isset($_SESSION['authenticated']) || isset($_SESSION['authenticated'])) : ?>
    
    <div class="categories-container">

        <?php $selectedCategory = $_GET['category'] ?? 'All' ?? 'Men Clothing' ?? 'Women Clothing' ?? 'Men Footwear' ?? 'Women Footwear' ?? 'Accessories'; ?>

        <li class="categories-choice">
            <ul>
                <a href="<?= base_url('view-landing.php') ?>" class="a-category <?= $selectedCategory === 'All' ? 'active' : '' ?>">
                    All
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Men Clothing') ?>" class="a-category <?= $selectedCategory === 'Men Clothing' ? 'active' : '' ?>"">
                    Men Clothing
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Women Clothing') ?>" class="a-category <?= $selectedCategory === 'Women Clothing' ? 'active' : '' ?>">
                    Women Clothing
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Men Footwear') ?>" class="a-category <?= $selectedCategory === 'Men Footwear' ? 'active' : '' ?>">
                    Men Shoes
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Women Footwear') ?>" class="a-category <?= $selectedCategory === 'Women Footwear' ? 'active' : '' ?>">
                    Women Shoes
                </a>
            </ul>
            <ul>
                <a href="<?= base_url('view-landing.php?category=Accessories') ?>" class="a-category <?= $selectedCategory === 'Accessories' ? 'active' : '' ?>">
                    Accessories
                </a>
            </ul>
        </li>
    </div>

<?php endif; ?>