<!-- Cover image generated title and heading -->
<section class="image">
    <h1 class="title"><?php print $data['title'] ?></h1>
    <h2 class="heading"><?php print $data['heading'] ?></h2>
</section>

<!-- All the pizza items will be generated by JS in this container -->
<section id="pizza-grid-container"></section>

<!-- Create form can be pre-rendered -->
<?php if (isset($data['forms']['create'])): ?>
    <div class="create-form-wrapper">
        <?php print $data['forms']['create']; ?>
    </div>
<?php endif; ?>

<!-- Update Modal (Popup) -->
<?php if (isset($data['forms']['update'])): ?>
    <div id="update-modal" class="modal">
        <div class="wrapper">
            <span class="close">&times;</span>
            <?php print $data['forms']['update']; ?>
        </div>
    </div>
<?php endif; ?>

<?php foreach ($data['links'] as $link): ?>
    <?php print $link; ?>
<?php endforeach; ?>

<!-- Constant map -->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2196022783755!2d25.3356966158603!3d54.72335198029061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010224!5e0!3m2!1sen!2slt!4v1608568324636!5m2!1sen!2slt"
            width="100%"
            height="300px"
            frameborder="0"
            style="border:0;"
            aria-hidden="false"
            tabindex="0"></iframe>
</section>

<!-- Constant Footer with dynamic date is generated here -->
<footer>Copyright © <?php date('Y'); ?> Aidas Baublys, all rights reserved.</footer>