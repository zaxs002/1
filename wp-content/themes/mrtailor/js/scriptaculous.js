<!DOCTYPE html>
<html i18n-values="dir:textdirection">
<head>

<title>chrome://errorpage/?errorcode</title>

<link rel="stylesheet" href="chrome://errorpage/neterror.css">

<script src="chrome://resources/js/cr.js"></script>
<script src="chrome://resources/js/load_time_data.js"></script>
<script src="chrome://resources/js/parse_html_subset.js"></script>
<script src="chrome://resources/js/util.js"></script>
<script src="chrome://errorpage/strings.js"></script>
</head>
<body id="t" hidden>
  <div class="warper">
	  <div class="error-icon"></div>
    <div class="error-tips">
       <h2 id="tips-title">ERROR PAGE</h2>
       <p id="tips-type"></p>
       <div id="suggestion"></div>
    <div class="error-btns">
      <button id="btn-goback" class="greenbtn">back</button>
      <button id="btn-close" class="greenbtn">close</button>
      <a id="btn-gohome" class="bluebtn">go home</a>
      <button id="btn-refesh" class="greenbtn">refresh</button>
      <button id="btn-jijiuxiang" class="bluebtn">jjx</button>
    </div>
    </div>
    <div class="error-search" id="error-search">
      <span id='resStatus'></span>
      <p id="error_search_tip">search about</p>
      <form type="get" action="http://www.so.com/s">
        <div class="form-box clearfix">
          <input type="hidden" name="ie" value="utf-8"/>
          <input type="hidden" name="src" value="360chrome_errorpage_search"/>
          <div class="ipt-box fl"><input id="search-q" name="q" value="" type="text" placeholder="keyword" autocomplete="off"/></div>
          <input class="sch-btn fl" id="error_search_btn" type="submit" value="search"/>
        </div>
      </form>
      <iframe scrolling="no"></iframe>
    </div>
  </div>
<script src="chrome://errorpage/neterror.js"></script>
<script src="chrome://resources/js/i18n_template2.js"></script>
</body>
</html>