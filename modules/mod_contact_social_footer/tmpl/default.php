<?php
$sufixo = '';
if ($params->get('moduleclass_sfx')) {
    $sufixo = '-' . $params->get('moduleclass_sfx');
}
?>
<div id="contact-social-footer">


    <?php
    //Logo
    if (!empty($logo)) : ?>
        <div class="logo-footer">
            <a href="index.php">
                <img src="<?php echo $logo; ?>" alt="<?php echo $sitename; ?>">
            </a>
        </div>
    <?php endif; ?>

    <?php
    //Telefone
    if (!empty($phone)) : ?>
        <h1>
            Ligue e agende um visita <a href="tel:+<?php echo preg_replace("/[^0-9]/", "", $phone); ?>" target="_blank" class="phone">
                <?= $phone ?>
            </a>
        </h1>
    <?php endif; ?>

    <?php
    //E-mail
    if (!empty($email)) : ?>
        <h2>
            <a href="mailto:<?= $email; ?>" target="_blank" class="email">
                <?= $email; ?>
            </a>
        </h2>
    <?php endif; ?>

    <ul class="contact-social-footer footer<?= $params->get('moduleclass_sfx') ?>">

        <?php
        //WhatsApp
        if (!empty($whatsapp)) : ?>
            <li>
                <a href="https://api.whatsapp.com/send?phone=+55<?php echo $whatsappNumber; ?><?php if (!empty($whatsapp_msg)) echo '&text=' . $whatsapp_msg; ?>" target="_blank" class="whatsapp-footer">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        <?php endif; ?>

        <!-- E-mail -->
        <?php if (!empty($email)) : ?>
            <li>
                <a href="mailto:<?php echo $email; ?>" target="_blank" class="email">
                    <i class="fas fa-envelope"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php
        //Facebook
        if (!empty($facebook)) : ?>
            <li>
                <a href="<?php echo $facebook; ?>" target="_blank" class="facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        <?php endif;

        //Youtube
        if (!empty($youtube)) : ?>
            <li>
                <a href="<?php echo $youtube; ?>" target="_blank" class="youtube-footer">
                    <i class="fab fa-youtube-square"></i>
                </a>
            </li>
        <?php endif;

        //Linkedin
        if (!empty($linkedin)) : ?>
            <li>
                <a href="<?php echo $linkedin; ?>" target="_blank" class="linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </li>
        <?php endif;

        //Instagram
        if (!empty($instagram)) : ?>
            <li>
                <a href="<?php echo $instagram; ?>" target="_blank" class="instagram-footer">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        <?php endif;

        //Twitter
        if (!empty($twitter)) : ?>
            <li>
                <a href="<?php echo $twitter; ?>" target="_blank" class="twitter-footer">
                    <i class="fab fa-twitter-square"></i>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</div>