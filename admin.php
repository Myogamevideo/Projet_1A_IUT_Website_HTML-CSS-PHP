<?php include("head.php"); ?>
<?php include("header.php"); ?>

<body>
	<div class="body">
		<h1>Bienvenue, <?php echo $_SESSION['username'];?></h1>
    	 <ul class="menu">
			<li><a href="adminaccount.php">Gérer les comptes</a></li>
		</ul>
	</div>
</body>

<?php include("footer.php"); ?>
</html>