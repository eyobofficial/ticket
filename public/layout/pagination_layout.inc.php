<!-- Page Pagination -->
<nav class="text-center">
	<ol class="pagination">
		<?php if($pagination->total_page() > 1): ?>
			<?php for($i = 1; $i <= $pagination->total_page(); $i++): ?>
				<li <?php if($page_number === $i){echo "class='active' ";} ?>>
					<a href="<?php echo strtolower($page_title); ?>.php?page_number=<?php echo $i; ?>"><?php echo $i; ?></a>
				</li>
			<?php endfor; ?>
		<?php endif; ?>
	</ol>
</nav>