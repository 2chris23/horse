

<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<?php $style= isset($style)?$style:null ?>
<?php if ($style != null)
    echo '<'.'?'.'xml-stylesheet href="'.$style.'" type="text/xsl"?>'."\n";
?>
<sitemapindex
    <?php echo '
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd
    http://www.w3.org/1999/xhtml http://www.w3.org/2002/08/xhtml/xhtml1-strict.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"
        
        '; ?>
>
<?php foreach($sitemaps as $sitemap) : ?>
	<sitemap>
		<loc><?= $sitemap['loc'] ?></loc>
	<?php if($sitemap['lastmod'] !== null) : ?>
		<lastmod><?= date('Y-m-d\TH:i:sP', strtotime($sitemap['lastmod'])) ?></lastmod>
	<?php endif; ?>
	</sitemap>
<?php endforeach; ?>
</sitemapindex>