<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categoriesLots as $category) : ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html"><?= $category; ?></a>
            </li>
        <? endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <? foreach ($arrayDataLots as $key => $item) : ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $item["image"]; ?>" width="350" height="260" alt="<?= $item['title']; ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= $item['category'] ?></span>
                    <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $item['id']; ?>"><?= $item['title']; ?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= getPrice($item['price']) ?></span>
                        </div>
                        <div class="lot__timer timer">
                            <?= getLotLifetime(); ?>
                        </div>
                    </div>
                </div>
            </li>
        <? endforeach; ?>
    </ul>
</section>
