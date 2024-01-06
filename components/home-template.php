<?php
/*
Template Name: Pokemon Home
*/
get_header();
?>

<?php $allSetsName = get_all_set_names() ?>
<main>
    <h1>Allo les amis</h1>

    <?php if (!empty($allSetsName)) : ?>
        <h2>Pokemon Card Sets</h2>
        <ul>
            <?php foreach ($allSetsName as $setName) : ?>
                <?php $detailPageLink = esc_url(home_url('/set-details/?id=' . $setName['id'])); // Update 'set-detail-page' to your page's slug 
                ?>
                <li><a href="<?php echo $detailPageLink ?>"> <?php echo esc_html($setName['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No sets found.</p>
    <?php endif; ?>
</main>

<?php
get_footer();
?>