<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <?php include 'views/components/recommend1.php'; ?>
            </div>
            <div class="carousel-item">
                <?php include 'views/components/recommend2.php'; ?>
            </div><!-- /carousel-item1 -->
            <div class="carousel-item">
                <?php include 'views/components/recommend3.php'; ?>
            </div><!-- /carousel-item2 -->
        </div>
        <a class="carousel-control-prev" href="#recommended-item-carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recommended-item-carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div>