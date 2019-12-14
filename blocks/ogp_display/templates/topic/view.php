<?php defined('C5_EXECUTE') or die('Access Denied.');


if ($ogp) {
    if ($ogp['image'] && substr($ogp['image'],0,8) == 'https://') {
        $tag = '<img src="' . h($ogp['image']) . '" class="col-xs-4 col-sm-3 pull-left img-responsive" />';
    } else {
        $tag = '<img src="' . $this->getBlockURL()  . '/img/noimg.jpg" class="col-xs-4 col-sm-3 pull-left img-responsive" />';
    }
    ?>
    <div class="row ogplink">
        <div class="col-xs-12 ogplinktitle">
            <p class="ogplinktitle"><a href="<?php echo h($url);?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo h($ogp['title']);?></a></p>
        </div>
        <a href="<?php echo h($url);?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo $tag; ?></a>
        <p class="ogplinkcontent"><?php echo h($ogp['description']);?></p>
    </div>
    <?php
} else {
    echo '<!-- no ogp ' . $url . ' -->';
}
?>
<script>
    var url = location.pathname;
    if ( url.indexOf('/135/') == -1) {
        $('div.ogplink').hide();
    }
</script>
