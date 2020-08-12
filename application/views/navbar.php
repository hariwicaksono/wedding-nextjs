<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>

<a class="uk-navbar-item uk-logo" href="<?php echo base_url()?>"><span uk-icon="more-vertical"></span></a>

  <div class="uk-navbar-item">
      
        <form id ="form1" class="uk-search uk-search-navbar" action="<?php echo base_url('search')?>" action="POST">

              <span uk-search-icon></span>

              <input class="uk-search-input" type="search" class="form-control form-control-lg" id="keyword" name="keyword" placeholder="Scan qrcode" required autofocus>
              
              <input type="submit" hidden="true"/>

          </form>
      </div>

      <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="<?php echo base_url('login')?>">Login</a></li>
           
        </ul>

    </div>
           
</nav>