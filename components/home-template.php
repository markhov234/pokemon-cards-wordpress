<?php
/*
Template Name: Unik Home
*/
get_header();
?>

<main class="page_principal">
    <section class="header_hero">
        <div class="header_hero-container">
            <div class="header_hero-intro">
            </div>
            <div class="header_hero-contact">
                <div class="header_hero-contact-info">
                    <span class="header_hero-contact-icon">
                        ICON
                    </span>
                    <p>1689 rue du Marais, suite 220, Québec,Qc,G1M0A2</p>
                </div>
                <div class="header_hero-contact-info">
                    <span class="header_hero-contact-icon">
                        ICON
                    </span>
                    <p>1(418) 261-8207</p>
                </div>
                <div class="header_hero-contact-info">
                    <span class="header_hero-contact-icon">
                        ICON
                    </span>
                    <p>Info@unikmedia.ca</p>
                </div>
            </div>
        </div>
        <section class="formulaire_principal">
            <form action="#">
                <h2>Vous avez un nouveau projet?</h2>
                
                <form action="/submit-form" method="post">
                    <!-- Input fields -->
                    <label for="name">No complet:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <!-- Input fields -->
                    <label for="name_enterprise">Nom d'entreprise</label>
                    <input type="text" id="name_enterprise" name="name_enterprise" required>

                    <!-- Input fields -->
                    <label for="telephone">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" required>

                    <!-- Submit button -->
                    <button type="submit">Submit</button>
                </form>
            </form>
        </section>
</main>

<?php
get_footer();
?>