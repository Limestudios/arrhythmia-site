<?php
?>
<div id="layout">

  <a href=#menu id="menuLink" class="site-nav-trigger"><span></span></a>

<div id=menu>
  <nav class="site-nav pure-menu-open">
    <small>
      <ul class=site-nav-list>
          <?php 
            $navbar = Config::getDBSettings('navbar');
            foreach ($navbar as $bar) {
              foreach ($bar as $key => $value) {
                switch ($key) {
                  case 'devide':
                      break;
                  default:
                      echo '<li class=site-nav-item><a class=nav-link href='.Config::get('site/homeurl').'/'.$value.'>'.$key.'</a>';
                      break;
                }
              }
            }
          ?>
          <?php
          $user = new User();
          if($user->isLoggedIn()) {
          ?>
          <li class=site-nav-item>
            <a class="nav-link username" href=<?php echo Config::get('site/homeurl'); ?>/profile/<?php echo escape($user->data()->username); ?>>
              <?php echo escape($user->data()->username); ?>
            </a>
          </li>
          <li class=site-nav-item><a class=nav-link href=<?php echo Config::get('site/homeurl'); ?>/account>Settings</a>
          <li class=site-nav-item><a class="nav-link sign-out" href=<?php echo Config::get('site/homeurl'); ?>/logout>Sign Out</a>
          <?php
          } else {
          ?>
          <li class=site-nav-item><a class=nav-link href=login>Sign In</a>
          <li class=site-nav-item><a class=nav-link href=register>Register</a>
          <?php    
          }
          ?>
      </ul>
    </small>
  </nav>
  <footer class=page-footer>
    <small>
      &copy;2014 Liam Craver.<br>
      All rights reserved.<br>
      <a href=http://pburtchaell.com/><span>Design by Patrick Burtchaell</span></a>
    </small>
  </footer>
</div>
  
<div class=site-logo>
  <a href=<?php echo Config::get('site/homeurl'); ?>>
    <object> 
      <svg x="0px" y="0px" width="200px" height="48.5px" viewBox="605.5 0 200 50" >
        <g transform="translate(0.000000,153.000000) scale(0.100000,-0.100000)">
          <path d="M6369.931,1376.309l-28.34-0.381v-96.562v-96.562h13.721c7.5,0,15.762,0.381,18.428,0.771l4.697,0.879v34.053v34.18h35.576
          h35.576v-34.307v-34.307h19.053h19.072v27.07v27.188l-17.793,13.594c-9.785,7.49-17.793,13.848-17.793,14.102
          c0,0.381,8.008,6.611,17.793,13.975l17.793,13.467v27.578v27.568l-18.301,14.355l-18.428,14.229l-26.426-0.254
          C6410.077,1376.689,6385.429,1376.436,6369.931,1376.309z M6450.858,1314.307v-33.662h-36.201h-36.221v33.662v33.662h36.221h36.201 V1314.307z"/>
          <path d="M6176.806,1362.842l-18.047-12.959l-0.127-82.842v-82.969h18.428h18.418v40.664v40.654h36.221h36.201v-40.654v-40.664
          h18.428h18.418v28.965c0,16.016-0.381,59.209-0.889,95.928l-0.762,66.963h-54.121l-54.131-0.127L6176.806,1362.842z
          M6267.899,1320.664v-27.324h-36.201h-36.221v27.324v27.305h36.221h36.201V1320.664z"/>
          <path d="M6524.55,1280v-95.928h18.428h18.418v34.307v34.307h36.211h36.221v-34.307v-34.307h18.418h18.418v27.197v27.188
          l-17.412,12.959c-9.648,7.236-17.91,13.467-18.418,13.848c-0.508,0.508,7.236,6.982,17.412,14.609l18.418,13.721v27.568
          l-0.117,27.451l-18.301,13.721l-18.418,13.594h-54.639h-54.639V1280z M6633.827,1313.662v-34.297h-36.221h-36.211v34.297v34.307 h36.211h36.221V1313.662z"/>
          <path d="M6707.509,1334.639v-41.299h73.057h73.057v41.299v41.289h-18.418h-18.428v-27.314v-27.324h-36.211h-36.211v27.324v27.314
          h-18.418h-18.428V1334.639z"/>
          <path d="M6917.782,1321.289l27.324-54.629v-41.289v-41.299h18.418h18.418v41.172c0,37.607,0.254,41.67,2.412,46.748
          c1.279,3.057,13.35,27.578,26.562,54.766l24.258,49.17h-17.793h-17.773l-18.545-37.48c-10.176-20.713-18.691-37.354-18.818-37.227
          c-0.254,0.254-8.125,17.021-17.646,37.227l-17.285,36.846l-18.428,0.381l-18.418,0.381L6917.782,1321.289z"/>
          <path d="M7073.427,1361.953v-13.984h27.314h27.314v-81.943v-81.953h18.428h18.418v81.953v81.943h27.324h27.314v5.469
          c0,2.92,0.381,9.15,0.879,13.975l0.771,8.516h-73.955h-73.809V1361.953z"/>
          <path d="M7256.386,1334.639v-41.299h73.057h73.057v41.299v41.289h-18.428h-18.418v-27.314v-27.324h-36.211h-36.221v27.324v27.314
          h-18.418h-18.418V1334.639z"/>
          <path d="M7439.335,1280v-95.928h18.428h18.418l0.254,54.121l0.381,54.258l17.158-32.52c9.404-17.92,17.666-32.656,18.174-32.91
          c0.625-0.264,8.887,14.482,18.418,32.52l17.393,33.037l0.4-54.248l0.254-54.258h18.418h18.418V1280v95.928h-12.578h-12.578
          l-22.988-44.727c-12.588-24.648-23.643-45.986-24.658-47.266c-1.65-2.285-3.818,1.279-25.537,44.727l-23.887,47.266h-11.943
          h-11.943V1280z"/>
          <path d="M7622.294,1361.953v-13.984h27.314h27.324l-0.254-68.223l-0.381-68.35l-26.934-0.381l-27.07-0.264v-13.33v-13.35h73.057
          h73.057v13.35v13.33h-27.314h-27.314v68.613v68.604h27.314h27.314v13.984v13.975h-73.057h-73.057V1361.953z"/>
          <path d="M7823.417,1362.207l-18.164-13.594v-82.207v-82.334h18.418h18.428v41.299v41.289h36.211h36.211v-41.289v-41.299h18.428
          h18.418V1280v95.928h-54.893l-55.01-0.127L7823.417,1362.207z M7914.521,1320.664v-27.324h-36.211h-36.211v27.324v27.305h36.211
          h36.211V1320.664z"/>
          <path d="M6707.509,1225.371v-41.299h18.428h18.418v27.324v27.314h36.211h36.211v-27.314v-27.324h18.428h18.418v41.299v41.289
          h-73.057h-73.057V1225.371z"/>
          <path d="M7256.386,1225.371v-41.299h18.418h18.418v27.324v27.314h36.221h36.211v-27.314v-27.324h18.418h18.428v41.299v41.289
          h-73.057h-73.057V1225.371z"/>
        </g>
      </svg>
    </object>
  </a>
  <script>
  var element = $('.site-logo');
  var headroom  = new Headroom(element);
  headroom.init();      
  </script>
</div>