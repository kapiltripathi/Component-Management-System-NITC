<head>
  <title>Staff Menu</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body onload="javascript:selects()">
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.php">Staff Menu</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li id="index"><a href="index.php">Home</a></li>
          <li id="requests"><a href="request.php">Requests</a></li>
          <li id="stock"><a href="stock.php">Stock</a></li>
          <li id="return"><a href="return.php">Return</a></li>
           <li id="due"><a href="due.php">Dues</a></li>
          
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>Login Details</h3>
            <button>Log Out</button>
          </div>
          <div class="sidebar_base"></div>
        </div>
       </div>