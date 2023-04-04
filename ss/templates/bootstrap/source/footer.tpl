		
			<hr>
			<footer class="footer">
		        <p class="pull-right"><a href="#">Back to top</a></p>
		       	<!-- <p>&copy; 2015 Shankar Bhattarai - <a href="http://github.com/shankarbhattarai/ss">Powered by Server Security v{$version}</a></p> -->
			<p>&copy; 2016 Bimal Gaire </p>		
	      	</footer>
		</div> <!-- /container -->
		
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/featherlight.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		{if isset($scripts) && is_array($scripts)}
		{foreach $scripts as $url}<script src="{$url}"></script>{/foreach}
		{/if}
	</body>
</html>
