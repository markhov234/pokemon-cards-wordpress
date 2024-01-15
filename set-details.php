<?php
/*
Template Name: set-details.php
*/

get_header();

function displaySetInfo($setInfoData)
{
    echo '<div class="set-details">';
    echo '<h1>' . $setInfoData['name'] . '</h1>';
    echo '<h2>' . $setInfoData['series'] . '</h2>';
    echo '<div class="set-details-info-container">';
    echo '<p>' . $setInfoData['printedTotal'] . '</p>';
    echo '<p>' . $setInfoData['total'] . '</p>';
    echo '<p>' . $setInfoData['releaseDate'] . '</p>';
    echo '<p>' . $setInfoData['updatedAt'] . '</p>';
    echo '</div>';
    echo '<div class="set-details-image-container">';
    echo '<img  src="' . $setInfoData['images']['logo'] . '" ></img>';
    echo '<img  src="' . $setInfoData['images']['symbol'] . '" ></img>';
    echo '</div>';
    echo '</div>';
}

function displayCardInfo($card)
{
    echo '<div class="pokemon-card">';
    echo '<h2>' . esc_html($card['name']) . '</h2>';
    echo '<img src="' . esc_url($card['images']['large']) . '" alt="' . esc_attr($card['name']) . '">';

    // Display prices
    echo '<div>';
    echo '<h3>Prices</h3>';
    echo '<ul>';
    echo '<li> <a target="_blank" href="' . esc_html($card['tcgplayer']['url']) . '"> Voir les le prix des cartes sur TCgPLAYER </a></li>';
    foreach ($card['tcgplayer']['prices'] as $priceCategory => $priceList) {
        echo '<li>' . esc_html($priceCategory) . ':';
        echo '<ul>';
        foreach ($priceList as $cardPrice) {
            echo '<li class="pokemon-type">' . esc_html($cardPrice) . '</li>';
        }
        echo '</ul>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}

$setId = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : '';

if (!empty($setId)) {
    // Vient fetch les infos concernant le set :id
    $setSetsInfo = make_pokemon_api_request('sets/' . $setId);
    // Vient fetch les infos concernant les cartes du set -> :id


    // vérifie si la variable est vide, par la suite affiche les infos du set avec la fonction displaySetInfo
    if (!empty($setSetsInfo) && !empty($setSetsInfo['data'])) {
        $setSetsInfoData = $setSetsInfo['data'];
        displaySetInfo($setSetsInfoData);
    }
} else {
    echo '<p>No Set ID provided.</p>';
}
?>

<div class="cards-container"></div>
<button id="load-more-cards">Load More Cards</button>
<!-- // Ajouté une section boutique dans le bas de la page ou en tant qu'aside recommendant des items de woo commerce
// Ajouté une fonction qui fait un zoom sur la carte selectionnée : hover / click / active -->
<?php
get_footer();
?>