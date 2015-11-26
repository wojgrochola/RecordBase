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
	 <h1>Contacts</h1>
	 <?php 
	 if (isset($_SESSION['uid'])) echo '<a href="' . $baseUri . '/logout"> Logout </a>' ;
	 else echo "NIe zalagowoany";
	 ?>

	 

 </div>
 <div data-role="content">
<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Search
 contacts...">
 <?php foreach ($this->data['events'] as $c): ?>
 <li>
 	<h3><?php echo $c['title']; ?></h3>
 	<div data-type="horizontal">
              <a data-inline="true" data-ajax="false" data-role="button" data-icon="mail" data-theme="b" data-mini="true" href="mailto:<?php echo $c['title']; ?>"><?php echo $c['title']; ?></a>
              <a data-inline="true" data-ajax="false" data-role="button" data-icon="phone" data-theme="b" data-mini="true" href="tel:<?php echo $c['title']; ?>"><?php echo $c['title']; ?></a>
    </div>
    <div data-type="horizontal">
              <a href="<?php echo $baseUri; ?>/save/<?php echo $c['id']; ?>" data-ajax="false" data-inline="true" data-role="button" data-icon="edit" data-mini="true" data-theme="a">Update</a>
              <a href="<?php echo $baseUri; ?>/delete/<?php echo $c['id']; ?>" data-ajax="false" data-inline="true" data-role="button" data-icon="delete" data-mini="true" data-theme="a">Remove</a>
    </div>
 
 </li>
 <?php endforeach; ?>
 </ul>


 <a href="<?php echo $baseUri; ?>/save" data-ajax="false" data-inline="true" data-role="button" dataicon="plus"
data-mini="true"data-theme="a">Add</a>
 </div>

 </div>


</body>
</html>
