<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation-Styles</title>
    <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" media="all" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: aqua;
        }

        main {
            min-height: 400px;
            min-width: 400px;
            background: #fff;
            padding: 40px 20px;
            border-radius: 5px;
            box-shadow: 5px 55px 50px -20px #b6b6b6; 
            width: 70%;
        }

        .unstyled {
            padding: 0;
            list-style: none;
        }

        .twitter {
            height: 46px;
            display: flex;
            align-items: center;
            border: 1px solid rgba(238,238,238 ,1);
            border-radius: 5px;
            padding: 0 10px;
            color: rgba(117,117,117 ,1);
            box-shadow: 5px 10px 20px -20px rgba(85,172,238 ,1);
        }

        .twitter li {
            cursor: pointer;
        }

        .twitter li:hover{
            color: rgba(85,172,238 ,1);
        }

        .twitter-bird {
            margin-left: auto;
            margin-right: auto;
            color: rgba(85,172,238 ,1);
            font-size: 1.3em;
        }

        .twitter li:not(:last-child):not(.twitter-bird) {
            margin-right: 10px;
        }

        .twitter li  i:not(.fa-twitter):not(.fa-search):not(.fa-user-circle) {
            margin-right: 3px;
        }

        .twitter li > button {
          font-size: 0.8em;
          border: 0;
          background: rgba(85,172,238 ,1);
          color: #fff;
          border-radius: 100px;
        }

        /* ============ Facebook Styling ============ */
        .facebook {
            display: flex;
            height: 46px;
            align-items: center;
            padding: 0 10px;
            border: 1px solid rgba(238,238,238 ,1);
            border-radius: 5px;
            background: rgba(59,89,153 ,1);
            color: #fff;
            font-size: 0.9em;
            box-shadow: 5px 10px 20px -20px rgba(59,89,153 ,1)
        }

        .facebook-brand i{
            font-size: 1.5em;
        }

        .facebook-search {
          margin-right: auto;
        }

        .facebook li:not(:last-child):not(:first-child):not(.facebook__search) {
            margin-right: 10px;
        }

        /* kanaitech */
        .d-flex {
          display: flex;
        }

        .d-flex>li:nth-child(1) {
            margin-right: auto; /*applied only to the right*/
        }   

        .d-flex>li {
            margin-right: 10px;
        }
    </style>
    <link rel="stylesheet" href="../css/nav.css">
</head>
<body>
    <main>
        <!-- Twitter -->
        <!-- add role=navigation for accessibility -->
        <ul class="unstyled twitter" role="navigation">
            <li><i class="fas fa-home"></i>Home</li>
            <li><i class="far fa-bell"></i>Notifications</li>
            <li><i class="far fa-envelope"></i>Messages</li>
            <li class="twitter-bird"><i class="fab fa-twitter"></i></li>
            <li><form action=""><input type="text" placeholder="search twitter"><i class="fa fa-search"></i></form></li>
            <li><i class="far fa-user-circle"></i></li>
            <li><button>tweet</button></li>
        </ul>

        <!-- Facebook -->
        <ul class="unstyled facebook" role="navigation">
            <li class="facebook-brand"><i class="fab fa-facebook-square"></i></li>  
            <li class="facebook-search"><form><input placeholder="search Facebook"/><i class="fa fa-search"></i></form></li>
            <li><i class="fa fa-user-circle-o"></i></li>
            <li><i class="fa fa-bell-o"></i>Notifications</li>
            <li>Home</li>
            <li><i class="fa fa-user-circle-o"></i> Ohans</li>
            <li><i class="fa fa-caret-down"></i></li> 
        </ul>

        <ul class="unstyled d-flex">
        	<li>Branding</li>
        	<li>Home</li>
        	<li>Services</li>
        	<li>About</li>
        	<li>Contact</li>
        </ul>

        <nav class="">Facebook</nav>
        <nav class="gitHub">Github</nav>
        <nav class="medium">Medium</nav>
    </main>
</body>
</html>

