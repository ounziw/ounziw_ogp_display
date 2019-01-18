<?php defined('C5_EXECUTE') or die('Access Denied.');
// var_dump($ogp);
// array(3) {
// ["title"]=> string(100) "セミナー「手帳を使って目標管理をするたった1つのコツ」に参加しました"
// ["description"]=> string(70) "手帳を使って自己管理。2019年の目標は超過勤務ゼロ"
// ["image"]=> string(81) "https://rescuework.nagoya/application/files/6515/4579/9109/my-consulting-2019.jpg"
// }

if ($ogp ) {
    if ($ogp['image']) {
        $tag = '<img src="' . h($ogp['image']) . '" class="col-xs-4 col-sm-3 pull-left img-responsive" />';
    } else {
        $tag = '<img src="' . $this->getBlockURL()  . '/img/noimg.jpg" class="col-xs-4 col-sm-3 pull-left img-responsive" />';
    }
    ?>
    <div class="row ogplink">
        <div class="col-xs-12 ogplinktitle">
            <p class="ogplinktitle"><a href="<?php echo h($url);?>" rel="nofollow noopener" target="_blank"><?php echo h($ogp['title']);?></a></p>
        </div>
        <a href="<?php echo h($url);?>" rel="nofollow noopener" target="_blank"><?php echo $tag; ?></a>
        <p class="ogplinkcontent"><?php echo h($ogp['description']);?></p>
    </div>
    <?php
} else {
    echo '<!-- no ogp ' . $url . ' -->';

}