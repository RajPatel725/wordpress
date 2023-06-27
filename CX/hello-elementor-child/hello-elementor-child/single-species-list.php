<?php 
get_header();
global $post;
?>

<div class="sponge-main">
	<div class="container">

		<div class="breadcum">
			<p>
				<a href="#"><?php 
					$terms = get_the_terms( $post->ID, 'classes' ); 
				    foreach($terms as $term) {
				    	echo $term->name;
				    }
		    	?></a>
		    	<span>></span>
				<a href="#"><?php 
					$terms = get_the_terms( $post->ID, 'orders' ); 
				    foreach($terms as $term) {
				      echo $term->name;
				    }
		    	?></a>
		    	<span>></span>
				<a href="#"><?php 
					$terms = get_the_terms( $post->ID, 'families' ); 
				    foreach($terms as $term) {
				      echo $term->name;
				    }
		    	?></a>
		    	<span>></span>
				<a href="#"><em><?php 
					echo get_the_title();
		    	?></em></a>
		    </p>
		</div>

		<div class="observed-characteristics">
			<h3>Observed Characteristics:</h3>
			<div class="observed-row row">
				<?php if( have_rows('sponge_color') ): ?>  
						<div class="col-4">
							<p><b>Color:</b></p>
							<ul>
								<?php while( have_rows('sponge_color') ): the_row(); ?>
									<li>
										<?php the_sub_field('color'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
				<?php endif; ?>
				<?php if( have_rows('sponge_morphology') ): ?>  
						<div class="col-4">
							<p><b>Morphology:</b></p>
							<ul>
								<?php while( have_rows('sponge_morphology') ): the_row(); ?>
									<li>
										<?php the_sub_field('morphology'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
				<?php endif; ?>
				<?php if( have_rows('sponge_consistency') ): ?>  
						<div class="col-4">
							<p><b>Consistency:</b></p>
							<ul>
								<?php while( have_rows('sponge_consistency') ): the_row(); ?>
									<li>
										<?php the_sub_field('consistency'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
				<?php endif; ?>
				<?php if( have_rows('sample_locations') ): ?>  
						<div class="col-4">
							<p><b>Locations:</b></p>
							<ul>
								<?php while( have_rows('sample_locations') ): the_row(); ?>
									<li>
										<?php the_sub_field('sample_locations'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="printable_view">
			<a href="<?php echo get_site_url(); ?>/print-species-info/?post_id=<?php echo $post->ID; ?>">Printable View</a>
		</div>

		<div class="speice-lists-main">
					
			<div class="tab">
				<button class="tablinks" onclick="openCity(event, 'Images')" id="defaultOpen">Images</button>
				<button class="tablinks" onclick="openCity(event, 'Species Description')">Species Description</button>
				<button class="tablinks" onclick="openCity(event, 'Tissue and Spicules')">Tissue and Spicules</button>
			</div>

			<div id="Images" class="tabcontent">
				<div class="sponge_images_div">
					<p><?php the_title(); ?></p>
					<div class="sponge_images_gallery">
						<?php if( have_rows('sponge_images') ): ?>  
							<?php $count = 1; $modalCounter = 1;  while( have_rows('sponge_images') ): the_row(); ?>

								<img src="<?php the_sub_field('images'); ?>"  onclick="onClick(this, 'image-<?php echo $count; ?>')" class="modal-hover-opacity modal_img cursor-zoom-in" />
							
							<div id="image-<?php echo $modalCounter; ?>" class="modal" onclick="this.style.display='none'">
								<span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<div class="modal-content">
									<img id="modal-image-<?php echo $modalCounter; ?>" style="max-width:100%">
									<table class="modal-details">
										<tbody>
											<tr> 
												<td>Species:
													<a href="speciesinfo.php?species=180">
														<i><i>Clathrina </i> <?php the_title(); ?></i>
													</a>
												</td>
												<td>
													<a href="<?php echo get_permalink(); ?>?img=<?php the_sub_field('image', 'id'); ?>">View Image Details</a>
												</td>
											</tr>
											<tr>
												<td>Location: <?php the_sub_field('location'); ?></td>
												<td>Photographer: <?php the_sub_field('photographer'); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<?php $count++; $modalCounter++; endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div id="Species Description" class="tabcontent">
				<div class="species_description">
					<?php the_content(); ?> 
				</div>
			</div>

			<div id="Tissue and Spicules" class="tabcontent">
				<div class="tissue_spicules">
					<?php if( have_rows('sponge_tissue_and_spicules') ): ?>  
						<?php $countTissue = 1; $spiculesCounter = 1;  while( have_rows('sponge_tissue_and_spicules') ): the_row(); ?>

							<img src="<?php the_sub_field('tissue_and_spicules'); ?>"  onclick="TissueAndSpicules(this, 'spicules_image-<?php echo $countTissue; ?>')" class="modal-hover-opacity modal_img cursor-zoom-in" />

						<div id="spicules_image-<?php echo $spiculesCounter; ?>" class="modal" onclick="this.style.display='none'">
							<span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<div class="modal-content">
								
								<img id="spicules-spicules_image-<?php echo $spiculesCounter; ?>" style="max-width:100%">
								
								<div class="spicules_description">Spicule Images: <?php the_sub_field('tissue_images_description'); ?></div>
							</div>
						</div>
						<?php $countTissue++; $spiculesCounter++; endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End image tab section -->

	</div>
</div>

<?php 
get_footer();
?>