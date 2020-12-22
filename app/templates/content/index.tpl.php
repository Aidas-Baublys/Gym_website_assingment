<!-- Cover image with generated title and heading -->
<section class="image">
    <h1 class="title"><?php print $data['title']; ?></h1>
</section>


<!-- Constant Services -->
<section id="services-container">
    <?php foreach ($data['services'] ?? [] as $service_id => $service): ?>
        <div class="services-item">
            <img src="<?php print $service['image']; ?>" alt="service image">
            <h3><?php print $service['title']; ?></h3>
            <p><?php print $service['description']; ?></p>
        </div>
    <?php endforeach; ?>
</section>


<!-- Constant map -->
<section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2196022783755!2d25.3356966158603!3d54.72335198029061!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010224!5e0!3m2!1sen!2slt!4v1608568324636!5m2!1sen!2slt"></iframe>
</section>

