<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
 <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>
<body>
 <div data-role="page">
 <div data-role="header">
 <h1>Add Contact</h1>
 </div>
 <div data-role="content">
 <div data-role="collapsible-set" data-inset="false">
	 <form method="post" data-ajax="false" action="<?php echo $baseUri; ?>/save">
 	 	<input name="id" type="hidden" value="<?php echo $this->data['events']['id']; ?>" />
		 <label for="date">Date</label>
		 <input name="date" id="date" data-clear-btn="true" type="date" value="<?php echo $this->data['events']['date']; ?>" />
		 <label for="place">Place</label>
		 <input name="place" id="place" data-clear-btn="true" type="text" value="<?php echo $this->data['events']['place']; ?>" />
		 <label for="title">Title</label>
		 <input name="title" id="title" data-clear-btn="true" type="text" value="<?php echo $this->data['events']['title']; ?>"/>
		 <label for="authon">Author</label>
		 <input name="author" id="author" data-clear-btn="true" type="text" value="<?php echo $this->data['events']['author']; ?>"/>
		 <label for="author">Details</label>
		 <textarea name="details" id="details" rows="10" cols="20"  > <?php echo $this->data['events']['details']; ?> </textarea>
		 <input name="submit" value="Save" type="submit" data-icon="check" data-inline="true" datamini="true"
		data-theme="a" />
		 <a href="<?php echo $baseUri; ?>/index" data-role="button" data-inline="true" data-icon="back"
		 data-mini="true" data-theme="a">Back</a>
 	</form>
 </div>
<?php echo $this->data['events']['date']; ?>
 </div>
</body>
</html>
