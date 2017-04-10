    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <img src="https://assets.punksky.xyz/logo/logow.gif" >
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" id="Project" data-toggle="dropdown">Projects<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="/Project">

                          <li role="presentation"><a role="menuitem" tabindex="-1" href="/Projects/Kozit">Kozit</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Services">Services</a>
                    </li>
                    <li>
                        <a href="/Team">Team</a>
                    </li>
                    <li>
                        <a href="/About">About us</a>
                    </li>
                    <li>
                        <a href="/Contact">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
<?php if($auth->isLoggedIn()){ ?>
    <li><a href="/User/<?php echo $auth->getUserId();?>">Profile</a></li>
    <li><a href="/logout">Logout</a></li>
<?php }else{ ?>
  <li><a href="#" data-toggle="modal" data-target="#Register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="#" data-toggle="modal" data-target="#Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
<?php } ?>
                </ul>
            </div>
        </div>
    </nav>
