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
					</header>

					<form action="#" name="edit_event" id="editEvent" method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend class="h4">Event Detail</legend>

							<div class="row">

								<div class="col-sm-8" id="eventSummary">
									<!-- Title -->
									<div class="form-group">
										<label for="title" class="sr-only">Title:</label>
										<input type="text" name="title" id="title" placeholder="Event Title" class="form-control" value="<?php echo ucwords($event->name); ?>">
									</div><!-- .form-group -->

									<!-- Venue -->
									<div class="form-group">
										<label for="venue" class="sr-only">Venue: </label>
										<input type="text" name="venue" id="venue" class="form-control" placeholder="venue" value="<?php echo ucwords($event->venue); ?>">
									</div><!-- .form-group -->

									<!-- City -->
									<div class="form-group">
										<label for="city" class="sr-only">City: </label>
										<input type="text" name="city" id="city" class="form-control" placeholder="City" value="<?php echo ucwords($event->city); ?>">
									</div><!-- .form-group -->
									
									<!-- Country -->
									<div class="form-group">
										<label for="country" class="sr-only">Country: </label>
										<input type="text" name="country" id="country" class="form-control" placeholder="Country" value="<?php echo ucwords($event->country); ?>">
									</div><!-- .form-group -->
									

									<!-- <div class="form-inline">
										<div class="date form-group">
											<label for="year" class="sr-only">Year</label>
											<input type="text" id="year" name="year" class="form-control shortInputs" placeholder="YYYY"> / 
									
											<label for="month" class="sr-only">month</label>
											<input type="text" id="month" name="month" class="form-control shortInputs" placeholder="MM"> /
									
											<label for="date" class="sr-only">date</label>
											<input type="text" id="date" name="date" class="form-control shortInputs" placeholder="DD"> 
									
										</div>.date
									
									
										<div class="time form-group">
											<label for="hour" class="sr-only">hour</label>
											<input type="text" id="hour" name="hour" class="form-control shortInputs" placeholder="HH"> :
									
											<label for="minute" class="sr-only">Minutes</label>
											<input type="text" id="minute" name="minute" class="form-control shortInputs" placeholder="MM"> 
										</div>
													
									</div>.form-inline
									 -->

									<div class="form-inline">
										<div class="date form-group">
											<label for="year" class="sr-only">Year</label>
											<select name="year" id="year" class="form-control">
												<option><span class="shade"><i>YYY</i></span></option>
												<?php for($year = 2016; $year <= 2025; $year++): ?>
													<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
												<?php endfor; ?>
											</select> /

											<label for="month" class="sr-only">month</label>
											<select name="month" id="month" class="form-control">
												<option><span class="shade"><i>MM</i></span></option>
												<?php for($month = 01; $month <= 12; $month++): ?>
													<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
												<?php endfor; ?>
											</select> /

											<label for="date" class="sr-only">date</label>
											<select name="date" id="date" class="form-control">
												<option><span class="shade"><i>DD</i></span></option>
												<?php for($date = 1; $date <= 31; $date++): ?>
													<option value="<?php echo $date; ?>"><?php echo $date; ?></option>
												<?php endfor; ?>
											</select> 

										</div><!-- .date -->


										<div class="time form-group">
											<label for="hour" class="sr-only">hour</label>
											<select name="hour" id="hour" class="form-control">
												<option><span class="shade"><i>HH</i></span></option>
												<?php for($hour = 00; $hour <= 23; $hour++): ?>
													<option value="<?php echo $hour; ?>"><?php echo $hour; ?></option>
												<?php endfor; ?>
											</select> :

											<label for="minute" class="sr-only">Minutes</label>
											<select name="minute" id="minute" class="form-control">
												<option><span class="shade"><i>MM</i></span></option>
												<?php for($minute = 00; $minute <= 59; $minute++): ?>
													<option value="<?php echo $minute; ?>"><?php echo $minute; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									
									</div><!-- .form-inline -->



									
									<!-- Event Catagory -->
									<div class="form-group">
										<label for="Category" class="sr-only">Category:</label>
										<select name="event_type" id="eventType" class="form-control">
											<option selected="selected">-- Choose Catagory --</option>
											<option value="1">Concert</option>
											<option value="2">Sport</option>
											<option value="3">Festival</option>
										</select>
									</div><!-- .form-group -->

								</div><!-- .col-sm-8 -->
								
								<!-- Photo -->
								<div class="col-sm-4">
									<img alt="" class="img-thumbnail" src="../images/default-placeholder.png">
									<div class="form-group">
										<label for="photo" class="sr-only">Photo: </label>
										<input type="file" name="photo" id="photo">
									</div>
								</div><!-- .col-sm-4 -->
								
								<div class="col-sm-12">
									<div class="form-group">
										<label for="overview">Overview</label>
										<textarea name="overview" id="overview" cols="30" rows="10" placeholder="Short descripition about the event." class="form-control"></textarea>
									</div>
								</div>

							</div><!-- .row -->
						</fieldset>

						<fieldset>
							<legend class="h4">Ticket Packages</legend>

							<div class="row">
								<div class="col-sm-12" id="ticketSummary">
									<div class="table-responsive">
										<table class="table table-bordered table-condensed table-hover">
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
												<tr>
													<td>
														<input type="text" name="package_title" id="packageTitle" placeholder="Ticket Package" class="form-control">
													</td>

													<td>
														<select name="currency" id="currency" class="form-control">
															<option value="sek">SEK</option>
															<option value="usd">USD</option>
															<option value="euro">Euro</option>
														</select>
													</td>

													<td>
														<input type="text" name="price" id="price" placeholder="Price" class="form-control text-right">
													</td>

													<td>
														<input type="text" name="available" id="available" placeholder="Available" class="form-control text-right">
													</td>

													<td>
														<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus-sign"></span></button>
														<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus-sign"></span></button>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" name="package_title" id="packageTitle" placeholder="Ticket Package" class="form-control">
													</td>

													<td>
														<select name="currency" id="currency" class="form-control">
															<option value="sek">SEK</option>
															<option value="usd">USD</option>
															<option value="euro">Euro</option>
														</select>
													</td>

													<td>
														<input type="text" name="price" id="price" placeholder="Price" class="form-control text-right">
													</td>

													<td>
														<input type="text" name="available" id="available" placeholder="Available" class="form-control text-right">
													</td>

													<td>
														<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus-sign"></span></button>
														<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus-sign"></span></button>
													</td>
												</tr>

												<tr>
													<td>
														<input type="text" name="package_title" id="packageTitle" placeholder="Ticket Package" class="form-control">
													</td>

													<td>
														<select name="currency" id="currency" class="form-control">
															<option value="sek">SEK</option>
															<option value="usd">USD</option>
															<option value="euro">Euro</option>
														</select>
													</td>

													<td>
														<input type="text" name="price" id="price" placeholder="Price" class="form-control text-right">
													</td>

													<td>
														<input type="text" name="available" id="available" placeholder="Available" class="form-control text-right">
													</td>

													<td>
														<button class="btn btn-danger btn-xs addTicketBtn"><span class="glyphicon glyphicon-minus-sign"></span></button>
														<button class="btn btn-success btn-xs removeTicketBtn"><span class="glyphicon glyphicon-plus-sign"></span></button>
													</td>
												</tr>
											</tbody>
										</table>
									</div><!-- .table-responsive -->
									
									<div class="form-group">
										<input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
									</div><!-- .form-group -->
								</div><!-- #ticketSummary -->



							</div><!-- .row -->
						</fieldset>
					</form>
				</section><!-- .col-sm-8 -->


				<div class="col-sm-4">
					<div class="sideActions form-group-container">
						<h2 class="h5">Publish</h2>

						<ul class="list-unstyled">
							
						</ul>
					</div>
				</div>
				
			</div><!-- .row -->
			

			
		</section><!-- .col-sm-10 -->
	</div><!-- .row -->
</main>


<?php include_once(SITE_ROOT . DS . 'public/layout/footer.admin.php'); ?>