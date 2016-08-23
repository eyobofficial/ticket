<div class="col-xs-12">
	<!-- Form registration error, if any -->
	<?php if(!empty($search_errors)): ?>
		<div class="errorMsg">
			
			<ul class="list-unstyled">
				<?php foreach($search_errors as $error_key => $error): ?>
					<li class="text-center"><span class="fa fa-exclamation-circle text-danger"></span> <?php echo ucfirst($error); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

</div>