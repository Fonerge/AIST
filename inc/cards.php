<?php if (!empty($posts)){ foreach ($posts as $post) { ?>
<div class="col-md-6 col-lg-4 mb-3">
	<div class="card">
  		<a href="http://aist.site/post/<?php echo $post->id; ?>/" class="span-img">
		    <?php $photos = R::findAll('images', 'post_id = ?', [$post->id]); ?>
		    <?php if (!empty($photos)): ?>
		        <?php foreach (array_slice($photos, 0, 2) as $photo): ?>
		            <?php if (!empty($photo['name'])): ?>
		                <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/<?php echo $photo['name']; ?>">
		            <?php else: ?>
		                <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/default.jpg">
		            <?php endif; ?>
		        <?php endforeach; ?>
		    <?php else: ?>
		        <img class="bd-placeholder-img card-img-top" src="http://aist.site/images/post_images/default.jpg">
		    <?php endif; ?>
		</a>

  		<div class="card-body" style="padding-top: 0;">
  			<p class="card-title mt-2"><a href="http://aist.site/post/<?php echo $post->id; ?>/" class="text-success"><?= $post['post_name']; ?></a></p>
    		<li class="span-text"><?= $post['post_category']; ?></li>
    		<li class="span-text ml-auto"><?= $post['post_date_time']; ?></li>
    		<a href="#" style="font-size: 15px; color: #28A750;"><?= $post['post_rajon']; ?></a>
    		<p class="card-text">
    		 	<a class="span-price text-primary"><?= $post['post_price']; ?> ₺</a>
    		</p>
  		</div>
	</div>
</div>
<?php }} else {echo '<article class="ml-3" style="font-weight: 600;">Нет размещённых объявлений...</article>';} ?>