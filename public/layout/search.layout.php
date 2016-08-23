	<!-- Get events from the database  -->				
	<?php while($current_event = $event_results->fetch_object()): ?>
	<?php $event = new Event($current_event->id); // Initiantiate an Event Object ?>
	
	<section class="recent col-xs-12 col-md-4 col-sm-6 col-sm-offset-0 col-md-offset-0">	
		<div class="eventContainer">
			<a href="event.php?id=<?php echo $event->id; ?>">
			<img src="pictures/event_photos/<?php echo $event->photo; ?>" alt="<?php echo $event->name; ?>" class="img-responsive eventPrev thumbnail">

			<div class="eventMeta">
				<h2 class="h4"> <?php echo ucwords($event->name); ?></h2>

				<div class="eventMetaBody">
					<a class="eventDate push-left">
						<span class="glyphicon glyphicon-calendar"></span> <?php echo date("M d", $event->date); ?>
					</a>
				
					<a class="pull-right text-success">
						<span class="glyphicon glyphicon-map-marker"></span> <?php echo ucwords($event->city); ?>
					</a>
				</div><!-- .eventMetaBody -->

			</div><!-- .eventMeta -->
			</a>
		</div><!-- .eventContainer -->
	</section><!-- .recent -->

	<?php endwhile; ?>
