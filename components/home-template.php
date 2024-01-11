<?php
/*
Template Name: Pokemon Home
*/
get_header();
?>

<?php $allSetsName = get_all_set_names(); ?>
<main>
    <input type="text" id="pokemonSetSearch" placeholder="Search for sets">
    <button id="trigger-ajax">
        Trigger Ajax response
    </button>
    <div id="pokemonSetDropdown" class="pokemon-dropdown"></div>
    <div class="home">
        <?php if (!empty($allSetsName)) : ?>
            <h2 class="home-title">Pokemon Card Sets</h2>
            <ul class="home-list">
                <?php foreach ($allSetsName as $setName) : ?>
                    <?php $detailPageLink = esc_url(home_url('/set-details/?id=' . $setName['id'])); // Update 'set-detail-page' to your page's slug 
                    ?>
                    <li class="home-list-item">
                        <a class="home-list-item-link" href="<?php echo $detailPageLink ?>">
                            <img class="home-list-item-image" src="<?php echo  $setName['imageUrl'] ?>">
                            <span class="home-list-item-name"><?php echo esc_html($setName['name']) ?><span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No sets found.</p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
?>