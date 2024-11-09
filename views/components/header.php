

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse " id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/prog"><h2>Home</h2> <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="d-flex justify-content-between">
            <?php
                if(!$_SESSION){
                    echo ('
                        <a class="nav-link active text-info" href="/prog/login"><h2>Sign-in</h2></a>
                        <a class="nav-link active text-info" href="/prog/register"><h2>Sign-up</h2></a>
                        ');
                }else{
                    echo ('
                        <a type="button" class="btn btn-primary" href="/prog/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg> 
                        </a>
                        <a class="nav-link active text-info" href="/prog/profile"><h2>'. $_SESSION['user']['username'] .'</h2></a>
                        <a class="nav-link active text-info" href="logout"><h2>logout</h2></a>
                        ');
                }
            ?>
        </div>
    </div>
</nav>