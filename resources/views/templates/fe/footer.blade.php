<footer class="bg-light">
    <div class="information">
        <div class="main">
        <div class="about about-hide">
            <h2 class="brand-footer"><?= config('app.name') ?></h2>
            <p>
            <?= $setting['short_desc']; ?>
            </p>
            <div class="sosmed">
            <h3>Temukan kami di</h3>
            <?php foreach($sosmed as $s): ?>
              <a href="<?= $s->link ?>" target="_blank" title="<?= $s->name ?>">
                  <i class="fab fa-<?= $s->icon ?>"></i>
              </a>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="item item-hide">
            <h3 class="title">KATEGORI</h3>
            <?php foreach($categoriesLimit as $c): ?>
                <a href="{{ route('product_list', $c->id) }}">{{ $c->category_name }}</a>
            <?php endforeach; ?>
        </div>
        <div class="item">
            <h3 class="title">INFO <?= strtoupper(config('app.name')); ?></h3>
            <?php foreach($footerinfo as $f): ?>
              <a href="{{ url('') }}/<?= $f->slug ?>"><?= $f->title ?></a>
            <?php endforeach; ?>
        </div>
        <div class="item">
            <h3 class="title">BANTUAN</h3>
            <?php foreach($footerhelp as $f): ?>
              <a href="{{ url('') }}/<?= $f->slug ?>"><?= $f->title ?></a>
            <?php endforeach; ?>
        </div>
        <div class="item item-hide">
          <h3 class="title">PEMBAYARAN</h3>
          <?php foreach($rekening as $r): ?>
              <p class="mb-0"><?= $r->rekening ?></p>
          <?php endforeach; ?>
        </div>
        </div>
    </div>
    <div class="contact">
        <div class="main">
            <div class="item">
                <i class="fa fa-map-marker-alt"></i>
                <p><?= nl2br($setting['address']); ?></p>
            </div>
            <div class="item">
                <i class="fa fa-phone"></i>
                <p><?= config('app.whatsapp') ?></p>
            </div>
            <div class="item">
                <i class="fa fa-envelope"></i>
                <p><?= config('app.email_contact'); ?></p>
            </div>
        </div>
    </div>