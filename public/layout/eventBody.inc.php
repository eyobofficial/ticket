<ul class="media-list">
	<!-- Get events from the database  -->				
	<?php while($current_event = $all_events->fetch_object()): ?>
	<?php $event = new Event($current_event->id); // Initiantiate an Event Object ?>
	
	<li class="media">
		<a href="event.php?id=<?php echo $event->id; ?>">
		<div class="media-left">
			<img src="images/<?php echo $event->photo; ?>" alt="<?php //echo $event->name; ?>" class="media-object img-thumbnail">
		</div><!-- .media-left -->

		<div class="media-body">
			<h3 class="media-heading"><?php echo $event->name; ?></h3>

			<div class="media-footer">
				<ul class="list-unstyled">
					<li><span>
							<span class="glyphicon glyphicon-calendar text-success"></span>
							<?php echo date("H:i M d, Y", strtotime($event->date)); ?>
						</span>
					</li>

					<li class="pull-right"><span>
						<span class="glyphicon glyphicon-map-marker text-success"></span>
						<?php echo $event->venue . ", " . $event->city; ?>
						</span> 
					</li>
				</ul>							
			</div><!-- .media-footer -->
		</div><!-- .media-body -->
		</a>
	</li><!-- .media --> 
	
	<?php endwhile; ?>
	
</ul><!-- .media-list -->
