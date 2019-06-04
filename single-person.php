<?php get_header(); the_post(); ?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container my-5">
		<h1>Profile </h1>
		<div class="row">
			<div class="col-md-4 mb-5">

				<aside class="person-contact-container">

					<div class="mb-4">
						<div class="media-background-container person-photo mx-auto">
							<?php the_post_thumbnail( 'medium' , ['class' => 'media-background object-fit-cover', 'data-object-fit' =>'cover' ] ); ?>

						</div>


					</div>

					<h1 class="h5 person-title text-center mb-2">
						<?php the_title(); ?>
					</h1>

					<?php if ( $job_title = get_field( 'person_jobtitle' ) ): ?>
					<div class="person-job-title text-center mb-4">
              <?php echo $job_title; ?>
          </div>
					<?php endif; ?>

          <div class="row mt-3 mb-5">
            <?php if(get_field( 'person_email' )): ?>
        				<div class="col-md offset-md-0 col-8 offset-2 my-1">
        			       <a href="mailto:<? the_field('person_email'); ?>" class="btn btn-primary btn-block">Email</a>
        		  </div>
            <?php endif; ?>
        	<?php if(get_field( 'person_phone' )): ?>
        			<div class="col-md offset-md-0 col-8 offset-2 my-1">
        			<a href="tel:<? the_field('person_phone'); ?>" class="btn btn-primary btn-block">Phone</a>
        		</div>
			<?php endif; ?>
			</div>

					<?php //echo get_person_contact_btns_markup( $post ); ?>


					<?php if(get_field( 'person_location' )): ?>
						<div class="row">
							<div class="col-xl-4 col-md-12 col-sm-4 person-label"> Location </div>
							<div class="col-xl-8 col-md-12 col-sm-8 person-attr text-md-right">
								<span>	<? the_field('person_location'); ?>	</span>
							</div>
						</div>
					<hr class="my-2">
					<?php endif; ?>


					<?php if(get_field( 'person_email' )): ?>
						<div class="row">
							<div class="col-xl-4 col-md-12 col-sm-4 person-label"> E-mail </div>
							<div class="col-xl-8 col-md-12 col-sm-8 person-attr text-md-right">
								<span><a href="mailto:<? the_field('person_email'); ?>" class="person-email"><? the_field('person_email'); ?></a></span>
							</div>
						</div>
					<hr class="my-2">
					<?php endif; ?>

					<?php if(get_field( 'person_phone' )): ?>
						<div class="row">
							<div class="col-xl-4 col-md-12 col-sm-4 person-label"> Phone Number </div>
							<div class="col-xl-8 col-md-12 col-sm-8 person-attr text-md-right">
								<span><a href="Phone:<? the_field('person_phone'); ?>" class="person-email"><? the_field('person_phone'); ?></a></span>
							</div>
						</div>
					<hr class="my-2">
					<?php endif; ?>

					<?php //echo get_person_dept_markup( $post ); ?>
					<?php //echo get_person_office_markup( $post ); ?>
					<?php //echo get_person_email_markup( $post ); ?>
					<?php //echo //get_person_phones_markup( $post ); ?>

				</aside>

			</div>

			<div class="col-md-8 col-lg-7 pl-md-5">

				<section class="person-content">
					<?php //echo get_person_desc_heading( $post ); ?>

					<?php
					if ( $post->post_content ) {
						the_content();
					}
					else {
						echo '<p>No description available.</p>';
					}
					?>

					<?php if ( $cv_url = get_field( 'person_cv' ) ): ?>
					<p>
						<a class="btn btn-primary mt-3" href="<?php echo $cv_url; ?>">Download CV</a>
					</p>
					<?php endif; ?>
				</section>

        <?php if( have_rows('person_tabbed_content') ):


            	$count = 0;

                echo '<section class="person-additional mt-5">';
                $tabs = '<div id="accordion">';


            while( have_rows('person_tabbed_content') ): the_row();
				   // vars
            		$title = get_sub_field('person_tab_title');
            		$content = get_sub_field('person_tab_content');

					$status = ($count < 0 ) ? 'true' : 'false';
				 	$active = ($count < 0 ) ? 'active' : null;
					$show = ($count < 0 ) ? 'show' : null;

                $tabs .= '<div class="card">';
				$tabs .= '<div class="card-header p-0 cursor-pointer" id="heading'. $count .'">';
					$tabs .= '<div class="mb-0">';
							$tabs .= '<a class="d-block w-100 py-2 px-4" data-toggle="collapse" data-target="#collapse'. $count .'" aria-expanded="'. $status .'" aria-controls="collapse'. $count .'">';
								$tabs .= $title;
							$tabs .= '</a>';
						$tabs .= '</div>';
					$tabs .=  '</div>';

				$tabs .= '<div id="collapse'. $count .'" class="collapse '. $show .'" aria-labelledby="heading'. $count .'" data-parent="#accordion">';

				$tabs .= '<div class="card-block ">'. $content .'</div>';
				$tabs .= '</div>';
				$tabs .= '</div>';

                $count++;

       endwhile;


				echo $tabs;
				echo '</section>';
         endif; ?>



			</div>
		</div>

	</div>
</article>

<?php get_footer(); ?>
