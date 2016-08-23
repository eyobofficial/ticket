<?php $page_context = "admin"; ?>
<?php $page_title = "edit event"; ?>
<?php $page_section = "manage events"; ?>
<?php require_once('../../includes/intialize.inc.php'); ?>
<?php include_once(SITE_ROOT . DS . 'public/layout/head.admin.php'); ?>

<main class="container-fluid">
	<div class="row">
		<section class="col-sm-2" id="adminNav">
			
			<!-- Include page navigation -->
			<?php include_once('layout/nav.admin.php'); ?>

		</section><!-- .col-sm-2 -->


		<section class="col-sm-10" id="adminMain">
			<div class="row">
				<section class="col-sm-8">

					<header>
						<h2 class="h4 text-left actionTitle">Edit Event</h1>

						<!-- ERROR NOTIFICATION -->
						<?php if(!empty($errors)): ?>
						<div class="errorMsg">
							<p><span class="glyphicon glyphicon-warning-sign text-danger"></span>  Please fill the following required fields: </p>
							<ul>
								<?php foreach($errors as $key => $value): ?>
									<li><?php echo ucfirst($key); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
					</header>

					<form action="edit_event.php?event_id=<?php echo $event->id; ?>" name="add_event" id="addEvent" method="POST" enctype="multipart/form-data">
						<!-- Hidden Input value to restrict file upload size -->
						<input type="hidden" name="MAX_FILE_SIZE" value="5000000">

						<fieldset>
							<legend class="h4">Event Detail</legend>

							<div class="row">

								<div class="col-sm-10" id="eventSummary">
									<!-- Name -->
									<div class="form-group">
										<label for="name" class="sr-only">Name:</label>
										<input type="text" name="name" id="name" value="<?php echo $event->name; ?>" placeholder="Event Name" class="form-control">
									</div><!-- .form-group -->

									<!-- Venue -->
									<div class="form-group">
										<label for="venue" class="sr-only">Venue: </label>
										<input type="text" name="venue" id="venue" class="form-control" placeholder="venue" value="<?php echo htmlentities($event->venue); ?>">
									</div><!-- .form-group -->

									<!-- City -->
									<div class="form-group">
										<label for="city" class="sr-only">City: </label>
										<input type="text" name="city" id="city" class="form-control" placeholder="City" value="<?php echo htmlentities($event->city); ?>">
									</div><!-- .form-group -->
									
									<!-- Country -->
									<div class="form-group">
										<label for="country" class="sr-only">Country: </label>
										<select name="country" id="country" class="form-control">
											<option> --Choose Country--</option>
											<?php while($current_country = $all_countries->fetch_object()): ?>
											<?php $country = new Country($current_country->id); ?>
												<option value="<?php echo $country->country_id; ?>" <?php echo $country->country_id == $event->country_id ? "selected='selected'" : ""; ?>>
													<?php echo $country->country_name; ?>
												</option>
											<?php endwhile; ?>
										</select>
									</div><!-- .form-group -->
									
									<!-- Date and Time -->
									<div class="form-inline">
										

										<!-- DATE(YYYY/MM/DD) -->
										<div class="date form-group">
											<label for="year" class="sr-only">Year</label>
											<select name="year" id="year" class="form-control">
												<option><span class="shade"><i>YYY</i></span></option>
												<?php for($year = (int)date("Y"); $year <= 2025; $year++): ?>
													<option value="<?php echo $year; ?>" <?php echo $year == (int)date("Y", $event->date) ? "selected='selected'" : ""; ?>>
														<?php echo $year; ?>
													</option>
												<?php endfor; ?>
											</select> /

											<label for="month" class="sr-only">month</label>
											<select name="month" id="month" class="form-control">
												<option><span class="shade"><i>MM</i></span></option>
												<?php for($month = 1; $month <= 12; $month++): ?>
													<option value="<?php echo $month; ?>" <?php echo $month == (int)date("m", $event->date) ? "selected='selected'" : ""; ?>>
														<?php echo sprintf("%02d", $month); ?>
													</option>
												<?php endfor; ?>
											</select> /

											<label for="date" class="sr-only">date</label>
											<select name="date" id="date" class="form-control">
												<option><span class="shade"><i>DD</i></span></option>
												<?php for($date = 1; $date <= 31; $date++): ?>
													<option value="<?php echo $date; ?>" <?php echo $date == (int)date("d", $event->date) ? "selected='selected'" : ""; ?>>
														<?php echo sprintf("%02d", $date); ?>
													</option>
												<?php endfor; ?>
											</select> 

										</div><!-- .date -->

										
										<!-- TIME (HH:MM) -->
										<div class="time form-group">
											<label for="hour" class="sr-only">hour</label>
											<select name="hour" id="hour" class="form-control">
												<option><span class="shade"><i>HH</i></span></option>
												<?php for($hour = 00; $hour <= 23; $hour++): ?>
													<option value="<?php echo $hour; ?>" <?php echo $hour == (int)date("H", $event->date) ? "selected='selected'" : ""; ?>>
														<?php echo sprintf("%02d", $hour); ?>
													</option>
												<?php endfor; ?>
											</select> :

											<label for="minute" class="sr-only">Minutes</label>
											<select name="minute" id="minute" class="form-control">
												<option><span class="shade"><i>MM</i></span></option>
												<?php for($minute = 00; $minute <= 59; $minute++): ?>
													<option value="<?php echo $minute; ?>" <?php echo $minute == (int)date("i", $event->date) ? "selected='selected'" : ""; ?>>
														<?php echo sprintf("%02d", $minute); ?>
													</option>
												<?php endfor; ?>
											</select>
										</div>
									
									</div><!-- .form-inline -->
									
									<!-- Event Catagory -->
									<div class="form-group">
										<label for="Category" class="sr-only">Category:</label>
										<select name="event_type_id" id="eventType" class="form-control">
											<option value="1" <?php echo (int)$event->type_id === 1 ? "selected='selected'" : ""; ?>>
												Concert
											</option>


											<option value="2" <?php echo (int)$event->type_id === 2 ? "selected='selected'" : ""; ?>>
												Sport
											</option>


											<option value="3" <?php echo (int)$event->type_id === 3 ? "selected='selected'" : ""; ?>>
												Festival
											</option>

										</select>
									</div><!-- .form-group -->

								</div><!-- .col-sm-8 -->
								
								<!-- Photo
								<div class="col-sm-4">
									<img alt="" class="img-thumbnail uploadedPic" src="../images/default-placeholder.png">
									<div class="form-group">
										<label for="photo" class="sr-only">Photo: </label>
										<input type="file" name="photo" id="photo">
									</div>
								</div>.col-sm-4
								 -->
								<!-- Overview -->
								<div class="col-sm-12">
									<div class="form-group">
										<label for="overview">Overview</label>
										<textarea name="overview" id="overview" cols="30" rows="10" placeholder="Short descripition about the event." class="form-control"> <?php echo $event->overview; ?></textarea>
									</div>
								</div>

							</div><!-- .row -->
						</fieldset>

						<fieldset>
							<legend class="h4">Ticket Packages</legend>

							<div class="row">
								<div class="col-sm-12" id="ticketSummary">
									<div class="table-responsive">
										<table class="table table-bordered table-condensed table-hover" id="addTicketTable">
											<thead>
												<tr>
													<th>Package Title</th>
													<th class="text-center">Currency</th>
													<th class="text-right">Price</th>
													<th class="text-right">Available</th>
													<th></th>
												</tr>
											</thead>

											<tbody>
												<?php while($current_ticket = $all_tickets->fetch_object()): ?>
												<?php $ticket = new Ticket($current_ticket->id); ?>
												
												<!-- HIDDEN FIELD FOR THE TICKET ID -->
												<input type="hidden" name="package_id[]" value="<?php echo $ticket->id; ?>">

												<tr>
													<td>
														<input type="text" name="package_title[]" id="packageTitle1" placeholder="Ticket Package" class="form-control" value="<?php echo htmlentities($ticket->package); ?>">
													</td>

													<td>
														<select name="package_currency[]" id="packageCurrency1" class="form-control">
															
															<option value="1" selected="selected">SEK</option>
															
														</select>
													</td>

													<td>
														<input type="text" name="package_price[]" placeholder="Price" class="form-control text-right" value="<?php echo htmlentities($ticket->price); ?>">
													</td>

													<td>
														<input type="text" name="package_available[]" placeholder="Available" class="form-control text-right" value="<?php echo htmlentities($ticket->available); ?>">
													</td>

													<td>
														<a href="process_delete_ticket.php?ticket_id=<?php echo htmlentities($ticket->id); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus-sign"></span></a>
														<button type="button" class="btn btn-success btn-xs addRow"><span class="glyphicon glyphicon-plus-sign"></span></button>
													</td>
												</tr>
												<?php endwhile; ?>


												<tr>
													<td>
														<input type="text" name="package_title[]" placeholder="Ticket Package" class="form-control">
													</td>

													<td>
														<select name="package_currency[]" class="form-control">
															<option value="1" selected="selected">SEK</option>
														</select>
													</td>

													<td>
														<input type="text" name="package_price[]" placeholder="Price" class="form-control text-right">
													</td>

													<td>
														<input type="text" name="package_available[]"  placeholder="Available" class="form-control text-right">
													</td>

													<td>
														<button type="button" class="btn btn-danger btn-xs removeRow"><span class="glyphicon glyphicon-minus-sign"></span></button>
														<button type="button" class="btn btn-success btn-xs addRow"><span class="glyphicon glyphicon-plus-sign"></span></button>
													</td>
												</tr>

											</tbody>

										</table>
									</div><!-- .table-responsive -->
									
								</div><!-- #ticketSummary -->



							</div><!-- .row -->
						</fieldset>

						<div class="form-group">
							<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
						</div><!-- .form-group -->
					
				</section><!-- .col-sm-8 -->


				<section class="col-sm-4" id="sideActions">

					<!-- EVENT PHOTO UPLOADER -->
					<div class="event-photo-container">
						<h4><span class="fa fa-upload"></span> Change Event Photo</h4>

						<div>
							<label for="photo" class="sr-only">Event Photo</label>
							<input type="file" name="photo" class="form-control">
						</div>
					</div><!-- .event-photo-container -->
					
					<!-- TICKET SITTING PHOTO UPLOADER -->
					<div class="event-photo-container">
						<h4><span class="fa fa-upload"></span> Change Ticket Sitting Photo</h4>

						<div>
							<label for="ticket_photo" class="sr-only">Ticket Sitting Photo</label>
							<input type="file" name="ticket_photo" class="form-control">
						</div>
					</div><!-- .tickt-sitting-photo-container -->


					<div class="side-action-container">
						<h4>Publish</h4>

						<div class="actionSection visibleSection">
							<p><span class="fa fa-eye"></span> Visible: </p>
							<div class="radio">
								<label>
									<input type="radio" name="visible" value=1   <?php echo $event->visible == 1 ? "checked='checked'" : ""; ?>> <span>Show</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="radio" name="visible" value=0  <?php echo $event->visible == 0 ? "checked='checked'" : ""; ?>> <span>Hide</span>
								</label>
							</div>
						</div><!-- .actionSection -->
						
						
						<div class="actionSection featuredSection">
							<p>Make Featured: </p>
							<div class="radio">
								<label>
									<input type="radio" name="featured" value=1 <?php echo $event->featured == 1 ? "checked='checked'" : ""; ?> > <span>Yes</span>
								</label>
							</div>

							<div class="radio">
								<label>
									<input type="radio" name="featured" value=0 <?php echo $event->featured == 0 ? "checked='checked'" : ""; ?> > <span>No</span>
								</label>
							</div>
						</div><!-- .actionSection -->
						
						<div class="actionSectionFooter">
							<a href="../event.php?id=<?php echo $event->id; ?>" title="preview" class="btn btn-default" target="_blank">
								Preview&nbsp;
							</a>

							<a onclick="return confirm('Are you sure you want to delete this event?');" href="remove.php?event_id=<?php echo $event->id; ?>" class="btn btn-danger pull-right" onclick="confirm(Are you sure you want to delete this event?);">
								<span class="glyphicon glyphicon-trash"></span> Delete
							</a>
						</div>
						
					</div><!-- .side-action-container -->
					
				</section>
				
				</form>
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>
<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>