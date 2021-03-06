<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!doctype html>
<html lang="en" id="mainBody">
<head>
  <!-- Meta Properties -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta name="description" content="OreigBR is a boss rush-style spinoff of diep.io! Work together with your team to kill all of the bosses!">
  <meta name="robots" content="index, follow">
  <meta property="og:image" content="/favicons/favicon-96x96.png">
  <meta property="og:image:width" content="52">
  <meta property="og:image:height" content="52">
  <title>arras.io</title>
  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
  <link rel="stylesheet" href="/css/main.css?1546657515938">
  <script async defer src="https://www.googletagmanager.com/gtag/js?id=UA-120544149-1"></script>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8291836377048341",
    enable_page_level_ads: true
  });
  </script>
  <!-- Version Control -
  <script>
    var VERSION = localStorage.getItem('versionHash');
    (function versionControl() {
      let request = new XMLHttpRequest();
      let url = window.location.href + "/api/vhash";
      console.log("Checking version...");
      return new Promise((resolve, reject) => {
        request.open('GET', url);
        request.onload = () => { resolve(request.response); console.log('Version check successful.'); };
        request.onerror = () => { reject(request.statusText); console.log('Version check failed.'); console.log(request.statusText); };
        request.send();
      });
    })().then(function resolveVersion(data) {
      localStorage.setItem('versionHash', data);
      if (VERSION !== data) {
        console.log("Updating!");
        localStorage.setItem('updated', 'datgudshit');
        location.reload(true);
      }
    });
  </script>
  -->
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#8abc3f">
  <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
  <meta name="theme-color" content="#8abc3f">
</head>
<!-- https://discordapp.com/oauth2/authorize?client_id=427927499071160320&redirect_uri=http%3A%2F%2Farras.io%2Fcallback&response_type=code&scope=identify%20email -->
<body oncontextmenu="return false;" id="mainBody">
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
  <div id="gameAreaWrapper">
    <canvas id="gameCanvas" tabindex="1" id="cvs" tabindex="1"></canvas>
  </div>
  <div id="mainWrapper">
    <div id="startMenuWrapper">
      <div id="startMenu">
        <div id="twitterHolder" class="startMenuHolder" style="height:100%">
          <!--<div class="twitterTimeline"><a class="twitter-timeline" data-width="350" data-height="300" data-theme="light" data-link-color="#8ABC3F" href="https://twitter.com/arras_dev?ref_src=twsrc%5Etfw">Tweets by arras_dev</a></div>-->
          <a class="referral" target="_blank" href="https://www.linode.com/?r=d9a53915e5fb2655082c2b3c11164c6e12acc718"><img width="350" height="300" src="/img/linode.png"></a>
          <div id="bottomHolder">
            <a style="background:#7289DA" href="http://discord.gg/J5h8Hfe">Discord</a>
            <!--<a style="background:#E0D571" href="https://discord.gg/k8ZFMUz">Dev Discord</a>-->
            <a style="background:#F74501" href="https://www.reddit.com/r/Diep2io/">Reddit</a>
            <a style="background:#CEB58F" href="https://arrasrecords.weebly.com/">W. Records</a>
            <a style="background:#FA7664" href="https://www.patreon.com/arras">Patreon</a>
            <!--
              <a style="background:#9974E8;float:right" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=YJ42X4KU6ETPA">Paypal</a>
              <a style="background:#E27061;float:right" href="https://www.patreon.com/diep2dev">Patreon</a>
            -->
          </div>
        </div>
        <div class="startMenuHolder">
          <div class="sliderHolder">
            <div class="slider" id="startMenuSlidingContent">
              <center><a href="http://oreigbr.tk"><img src="/favicons/favicon-96x96.png"></a></center>
              <h1>arras.io</h1>
              <div class="serverSelector shadowScroll"><table><tbody id="serverSelector"></tbody></table></div>
              <input type="text" autofocus tabindex="1" spellcheck="false" placeholder="This is the tale of" id="playerNameInput" maxlength="24">
            </div>
            <div class="slider" id="startMenuSlidingTrigger">
              <h3 class="nopadding">
                <span id="viewOptionText">view options</span>&nbsp;&nbsp;<i class="arrow" id="optionArrow" style="transform:rotate(-45deg);-webkit-transform:rotate(-45deg)"></i>
              </h3>
            </div>
            <div class="slider" id="startMenuSlidingContent">
              <div class="optionsHeader">Advanced Controls</div>
              <table>
                <tr>
                  <td><b>E</b>: auto-fire</td>
                  <td><b>C</b>: auto-spin</td>
                  <td><b>R</b>: disable AI</td>
                </tr>
                <tr>
                  <td><b>N</b>: level up</td>
                  <td><b>B</b>: reverse mouse</td>
                  <td><b>V</b>: reverse tank</td>
                </tr>
                <tr>
                  <td><b>Z</b>: record video</td>
                  <td><b>M</b>: maximize stat</td>
                  <td><b>L</b>: stats for nerds</td>
                </tr>
              </table>
              <div class="optionsHeader">Options</div>
              <select id="optColors" tabindex="-1" onchange="document.getElementById('optCustom').style.display = this.value === 'custom' ? 'block' : 'none'" onfocus="document.getElementById('optCustom').style.display = this.value === 'custom' ? 'block' : 'none'">
                <option value="normal">Light Colors</option>
                <option value="dark">Dark Colors</option>
                <option value="natural">Natural</option>
                <option value="classic">Classic</option>
                <option value="pumpkin">Pumpkin Skeleton (Fan-made)</option>
                <option value="forest">Forest (Fan-made)</option>
                <option value="midnight">Midnight (Fan-made)</option>
                <option value="pastel">Snow (Fan-made)</option>
                <option value="ocean">Coral Reef (Fan-made)</option>
                <option value="badlands">Badlands (Fan-made)</option>
                <option value="bleach">Bleach (Fan-made)</option>
                <option value="custom">Custom</option>
              </select>
              <select id="optBorders" tabindex="-1">
                <option value="normal">Soft Borders</option>
                <option value="dark">Dark Borders</option>
                <option value="neon">Neon Mode</option>
                <option value="glass">Glass Mode</option>
              </select>
              <input id="optCustom" style="display:none" placeholder="Enter your theme's JSON here"></input>
              <table>
                <tr>
                  <td><div>
                    <label class="container"><input id="optScreenshotMode" tabindex="-1" class="checkbox" type="checkbox"><span class="checkmark"></span>Screenshot Mode</label>
                  </div></td>
                  <td><div>
                    <label class="container"><input id="optNoPointy" tabindex="-1" class="checkbox" type="checkbox"><span class="checkmark"></span>Classic Traps</label>
                  </div></td>
                </tr><tr>
                  <td><div>
                    <label class="container"><input id="optFancy" tabindex="-1" class="checkbox" type="checkbox"><span class="checkmark"></span>Low Graphics</label>
                  </div></td>
                  <td><div>
                    <label class="container"><input id="optShield" tabindex="-1" class="checkbox" type="checkbox"><span class="checkmark"></span>Separate Shield Bar</label>
                  </div></td>
                </tr><tr>
                </tr>
              </table>
              <div class="optionsHeader">More Links</div>
              <center>
<?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
		      <!--
                <a href="https://glitch.com/edit/#!/arras-template?path=README.md">Private Server Template</a>
                <br>
                <a href="https://arras-lb.glitch.me/donate">One-time Donation</a>
                <br>
                <a href="https://codepen.io/road-to-100k/full/MPyOeQ/">Road's Custom Theme Maker</a>
                <br>
                <a href="http://arras-proxy.surge.sh/">Proxy Server</a>
              --></center>
            </div>
          </div>
          <div style="position: relative; bottom: -10px;">
            <button id="startButton" tabindex="2">Play</button>
          </div>
        </div>
        <div class="startMenuHolder">
          <div id="patchNotes"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- JS -->
  <script>
  (function() {
    var clicked = 0
    var trigger = document.getElementById('startMenuSlidingTrigger')
    var optionArrow = document.getElementById('optionArrow')
    var viewOptionText = document.getElementById('viewOptionText')
    var sliders = document.getElementsByClassName('slider')
    trigger.onclick = function() {
      clicked = 1 - clicked
      optionArrow.style.transform = optionArrow.style.webkitTransform = clicked ? 'rotate(45deg)' : 'rotate(-45deg)'
      viewOptionText.innerText = clicked ? 'close options' : 'view options'
      for (var i = 0; i < sliders.length; i++)
        sliders[i].style.top = clicked ? '-275px' : '0'
      sliders[0].style.opacity = 1 - clicked
      sliders[2].style.opacity = clicked
    }
    var hostnames = ['oreigbr.tk','unpatriotic-spars.000webhost.com','oreigdor.github.io','localhost', 'arras.io', 'beta.arras.io', 'arras-proxy.surge.sh', 'gsngzxa6st.surge.sh']
    if (window !== window.top || hostnames.indexOf(window.location.hostname) === -1) {
      window.addEventListener('load', function() {
        document.write('<h1>You are on a framed version of OreigBR, the original game is at <a href="http://oreigbr.tk/">http://arras.io/</a></h1>')
      })
      document.body.addEventListener('click', function() {
        window.top.location = 'http://oreigbr.tk/'
      })
      window.top.location = 'http://oreigbr.tk/'
    } else {
      var gameScript = document.createElement('script')
      gameScript.src ='/bundle.js?1546657515938'
      document.body.appendChild(gameScript)
    }
    window.onerror = function(message, source, lineno, colno, error) {
      window.onerror = null
      if (error) error = error.toString()
      console.warn('The game crashed, refreshing page to recover from error')
      if (error == null && lineno == 0 && colno == 0) return
      var e = JSON.stringify({
        message: message,
        source: source,
        lineno: lineno,
        colno: colno,
        error: error
      })
      prompt('The game may have crashed, refreshing page to recover from error. Error information: ', e)
    }
  })()
  </script>
</body>
</html>
