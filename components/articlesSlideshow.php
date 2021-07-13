<?php


function entradasBlogCustom($atts = array())
{
  extract(shortcode_atts(array(), $atts));

  $query = array(
    'post_type' => 'post',
    // 'category_name' => 'Marketing'
  );
  $query = getPosts($query);
  $posts = $query;


  $i = 0;
  $arts = array();
  foreach ($posts->posts as $key => $value) {

    if ($i == 0) {
      $l = array();
    }

    if ($i <= 3) {

      array_push($l, $value);
    }


    if (count($l) == 4) {

      array_push($arts, $l);
      $l = array();
      $i = 0;
    } else {

      $i++;
    }


    if ($value === end($posts->posts) && count($l) > 0) {

      array_push($arts, $l);

    }

  }

?>


  <section class="container containerCustom articlesSlideshow">

    <div class="sectionParent1">


      <div id="carouselPost" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

          <?php
          foreach ($arts as $index => $item) { ?>
            <div class="carousel-item row <?php if ($index === array_key_first($arts)) echo 'active' ?> ">


              <?php
              foreach ($item as $key => $value) { ?>

                <div class="element col-md-12 col-lg-3">


                  <div class="card">

                    <a href="<?Php echo setTypeUrl() ?>/<?php echo $value->post_name ?>">


                      <div class="image">
                        <img src="<?php echo getPhoto($value->ID) ?>" alt="">
                      </div>

                      <div class="group">


                        <h2 class="primaryTitle">
                          <?php echo $value->post_title ?>
                        </h2>
                        <!--
                      <p class="primaryText whiteColor">


                        </p> -->

                      </div>

                    </a>
                  </div>

                </div>

              <?Php } ?>

            </div>
          <?php
          }
          ?>



        </div>
        <div class="controlsSlideshow">

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPost" data-bs-slide="prev">

            <i class="fa fa-chevron-left" aria-hidden="true"></i>

          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPost" data-bs-slide="next">

            <i class="fa fa-chevron-right" aria-hidden="true"></i>

          </button>

        </div>


      </div>


    </div>


  </section>

<?php




}
add_shortcode('getentradasBlogCustom', 'entradasBlogCustom');



?>