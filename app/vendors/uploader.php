
    

  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <title>vendors/uploader.php at master from webtechnick's CakePHP-FileUpload-Plugin - GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />

    <link href="https://assets2.github.com/stylesheets/bundle_common.css?47cb04938970e27960b000394e25d106da82d0b6" media="screen" rel="stylesheet" type="text/css" />
<link href="https://assets1.github.com/stylesheets/bundle_github.css?47cb04938970e27960b000394e25d106da82d0b6" media="screen" rel="stylesheet" type="text/css" />

    <script type="text/javascript" charset="utf-8">
      var GitHub = {}
      var github_user = null
      
    </script>
    <script src="https://assets0.github.com/javascripts/jquery/jquery-1.4.2.min.js?47cb04938970e27960b000394e25d106da82d0b6" type="text/javascript"></script>
    <script src="https://assets0.github.com/javascripts/bundle_common.js?47cb04938970e27960b000394e25d106da82d0b6" type="text/javascript"></script>
<script src="https://assets1.github.com/javascripts/bundle_github.js?47cb04938970e27960b000394e25d106da82d0b6" type="text/javascript"></script>


        <script type="text/javascript" charset="utf-8">
      GitHub.spy({
        repo: "webtechnick/CakePHP-FileUpload-Plugin"
      })
    </script>

    
  
    
  

  <link href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin/commits/master.atom" rel="alternate" title="Recent Commits to CakePHP-FileUpload-Plugin:master" type="application/atom+xml" />

        <meta name="description" content="CakePHP File Upload Handling Plugin" />
    <script type="text/javascript">
      GitHub.nameWithOwner = GitHub.nameWithOwner || "webtechnick/CakePHP-FileUpload-Plugin";
      GitHub.currentRef = 'master';
      GitHub.commitSHA = "1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3";
      GitHub.currentPath = "vendors/uploader.php";
      GitHub.masterBranch = "master";

      
    </script>
  

            <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-3769691-2']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        ga.setAttribute('async', 'true');
        document.documentElement.firstChild.appendChild(ga);
      })();
    </script>

  </head>

  

  <body class="logged_out ">
    

    
      <script type="text/javascript">
        var _kmq = _kmq || [];
        function _kms(u){
          var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
          s.src = u; f.parentNode.insertBefore(s, f);
        }
        _kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/406e8bf3a2b8846ead55afb3cfaf6664523e3a54.1.js');
      </script>
    

    

    

    

    

    <div class="subnavd" id="main">
      <div id="header" class="true">
        
          <a class="logo boring" href="https://github.com">
            <img src="/images/modules/header/logov3.png?changed" class="default" alt="github" />
            <![if !IE]>
            <img src="/images/modules/header/logov3-hover.png" class="hover" alt="github" />
            <![endif]>
          </a>
        
        
        <div class="topsearch">
  
    <ul class="nav logged_out">
      <li class="pricing"><a href="/plans">Pricing and Signup</a></li>
      <li><a href="/explore">Explore GitHub</a></li>
      <li><a href="/features">Features</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="https://github.com/login">Login</a></li>
    </ul>
  
</div>

      </div>

      
      
        
    <div class="site">
      <div class="pagehead repohead vis-public   ">

      

      <div class="title-actions-bar">
        <h1>
          <a href="/webtechnick">webtechnick</a> / <strong><a href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin">CakePHP-FileUpload-Plugin</a></strong>
          
          
        </h1>

        
    <ul class="actions">
      

      
        <li class="for-owner" style="display:none"><a href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin/admin" class="minibutton btn-admin "><span><span class="icon"></span>Admin</span></a></li>
        <li>
          <a href="/webtechnick/CakePHP-FileUpload-Plugin/toggle_watch" class="minibutton btn-watch " id="watch_button" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'authenticity_token'); s.setAttribute('value', 'c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc'); f.appendChild(s);f.submit();return false;" style="display:none"><span><span class="icon"></span>Watch</span></a>
          <a href="/webtechnick/CakePHP-FileUpload-Plugin/toggle_watch" class="minibutton btn-watch " id="unwatch_button" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'authenticity_token'); s.setAttribute('value', 'c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc'); f.appendChild(s);f.submit();return false;" style="display:none"><span><span class="icon"></span>Unwatch</span></a>
        </li>
        
          
            <li class="for-notforked" style="display:none"><a href="/webtechnick/CakePHP-FileUpload-Plugin/fork" class="minibutton btn-fork " id="fork_button" onclick="var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'POST'; f.action = this.href;var s = document.createElement('input'); s.setAttribute('type', 'hidden'); s.setAttribute('name', 'authenticity_token'); s.setAttribute('value', 'c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc'); f.appendChild(s);f.submit();return false;"><span><span class="icon"></span>Fork</span></a></li>
            <li class="for-hasfork" style="display:none"><a href="#" class="minibutton btn-fork " id="your_fork_button"><span><span class="icon"></span>Your Fork</span></a></li>
          

          
        
      
      
      <li class="repostats">
        <ul class="repo-stats">
          <li class="watchers"><a href="/webtechnick/CakePHP-FileUpload-Plugin/watchers" title="Watchers" class="tooltipped downwards">46</a></li>
          <li class="forks"><a href="/webtechnick/CakePHP-FileUpload-Plugin/network" title="Forks" class="tooltipped downwards">7</a></li>
        </ul>
      </li>
    </ul>

      </div>

        
  <ul class="tabs">
    <li><a href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin" class="selected" highlight="repo_source">Source</a></li>
    <li><a href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin/commits/master" highlight="repo_commits">Commits</a></li>
    <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/network" highlight="repo_network">Network</a></li>
    <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/pulls" highlight="repo_pulls">Pull Requests (0)</a></li>

    

    
      
      <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/issues" highlight="issues">Issues (3)</a></li>
    

                <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/wiki" highlight="repo_wiki">Wiki (3)</a></li>
        
    <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/graphs" highlight="repo_graphs">Graphs</a></li>

    <li class="contextswitch nochoices">
      <span class="toggle leftwards" >
        <em>Branch:</em>
        <code>master</code>
      </span>
    </li>
  </ul>

  <div style="display:none" id="pl-description"><p><em class="placeholder">click here to add a description</em></p></div>
  <div style="display:none" id="pl-homepage"><p><em class="placeholder">click here to add a homepage</em></p></div>

  <div class="subnav-bar">
  
  <ul>
    <li>
      <a href="#" class="dropdown">Switch Branches (1)</a>
      <ul>
        
          
            <li><strong>master &#x2713;</strong></li>
            
      </ul>
    </li>
    <li>
      <a href="#" class="dropdown defunct">Switch Tags (0)</a>
      
    </li>
    <li>
    
    <a href="/webtechnick/CakePHP-FileUpload-Plugin/branches" class="manage">Branch List</a>
    
    </li>
  </ul>
</div>

  
  
  
  
  
  



        
    <div id="repo_details" class="metabox clearfix">
      <div id="repo_details_loader" class="metabox-loader" style="display:none">Sending Request&hellip;</div>

        <a href="/webtechnick/CakePHP-FileUpload-Plugin/downloads" class="download-source" id="download_button" title="Download source, tagged packages and binaries."><span class="icon"></span>Downloads</a>

      <div id="repository_desc_wrapper">
      <div id="repository_description" rel="repository_description_edit">
        
          <p>CakePHP File Upload Handling Plugin
            <span id="read_more" style="display:none">&mdash; <a href="#readme">Read more</a></span>
          </p>
        
      </div>

      <div id="repository_description_edit" style="display:none;" class="inline-edit">
        <form action="/webtechnick/CakePHP-FileUpload-Plugin/admin/update" method="post"><div style="margin:0;padding:0"><input name="authenticity_token" type="hidden" value="c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc" /></div>
          <input type="hidden" name="field" value="repository_description">
          <input type="text" class="textfield" name="value" value="CakePHP File Upload Handling Plugin">
          <div class="form-actions">
            <button class="minibutton"><span>Save</span></button> &nbsp; <a href="#" class="cancel">Cancel</a>
          </div>
        </form>
      </div>

      
      <div class="repository-homepage" id="repository_homepage" rel="repository_homepage_edit">
        <p><a href="http://www.webtechnick.com" rel="nofollow">http://www.webtechnick.com</a></p>
      </div>

      <div id="repository_homepage_edit" style="display:none;" class="inline-edit">
        <form action="/webtechnick/CakePHP-FileUpload-Plugin/admin/update" method="post"><div style="margin:0;padding:0"><input name="authenticity_token" type="hidden" value="c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc" /></div>
          <input type="hidden" name="field" value="repository_homepage">
          <input type="text" class="textfield" name="value" value="http://www.webtechnick.com">
          <div class="form-actions">
            <button class="minibutton"><span>Save</span></button> &nbsp; <a href="#" class="cancel">Cancel</a>
          </div>
        </form>
      </div>
      </div>
      <div class="rule "></div>
            <div id="url_box" class="url-box">
        <ul class="clone-urls">
          
            
            <li id="http_clone_url"><a href="https://github.com/webtechnick/CakePHP-FileUpload-Plugin.git" data-permissions="Read-Only">HTTP</a></li>
            <li id="public_clone_url"><a href="git://github.com/webtechnick/CakePHP-FileUpload-Plugin.git" data-permissions="Read-Only">Git Read-Only</a></li>
          
          
        </ul>
        <input type="text" spellcheck="false" id="url_field" class="url-field" />
              <span style="display:none" id="url_box_clippy"></span>
      <span id="clippy_tooltip_url_box_clippy" class="clippy-tooltip tooltipped" title="copy to clipboard">
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
              width="14"
              height="14"
              class="clippy"
              id="clippy" >
      <param name="movie" value="https://assets3.github.com/flash/clippy.swf?v5"/>
      <param name="allowScriptAccess" value="always" />
      <param name="quality" value="high" />
      <param name="scale" value="noscale" />
      <param NAME="FlashVars" value="id=url_box_clippy&amp;copied=&amp;copyto=">
      <param name="bgcolor" value="#FFFFFF">
      <param name="wmode" value="opaque">
      <embed src="https://assets3.github.com/flash/clippy.swf?v5"
             width="14"
             height="14"
             name="clippy"
             quality="high"
             allowScriptAccess="always"
             type="application/x-shockwave-flash"
             pluginspage="http://www.macromedia.com/go/getflashplayer"
             FlashVars="id=url_box_clippy&amp;copied=&amp;copyto="
             bgcolor="#FFFFFF"
             wmode="opaque"
      />
      </object>
      </span>

        <p id="url_description">This URL has <strong>Read+Write</strong> access</p>
      </div>
    </div>


        

      </div><!-- /.pagehead -->

      









<script type="text/javascript">
  GitHub.downloadRepo = '/webtechnick/CakePHP-FileUpload-Plugin/archives/master'
  GitHub.revType = "master"

  GitHub.controllerName = "blob"
  GitHub.actionName     = "show"
  GitHub.currentAction  = "blob#show"

  

  
</script>








  <div id="commit">
    <div class="group">
        
  <div class="envelope commit">
    <div class="human">
      
        <div class="message"><pre><a href="/webtechnick/CakePHP-FileUpload-Plugin/commit/1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3">Honor the required setting even when file field is submitted empty.</a> </pre></div>
      

      <div class="actor">
        <div class="gravatar">
          
          <img src="https://secure.gravatar.com/avatar/b3a08d3a210ee2fba18fbb62891edec5?s=140&d=https%3A%2F%2Fgithub.com%2Fimages%2Fgravatars%2Fgravatar-140.png" alt="" width="30" height="30"  />
        </div>
        <div class="name"><a href="/nnc">nnc</a> <span>(author)</span></div>
        <div class="date">
          <abbr class="relatize" title="2010-09-22 08:57:26">Wed Sep 22 08:57:26 -0700 2010</abbr>
        </div>
      </div>

      
        <div class="actor">
          <div class="gravatar">
            <img src="https://secure.gravatar.com/avatar/108dc0e4a4973926f890206ee5bb46db?s=140&d=https%3A%2F%2Fgithub.com%2Fimages%2Fgravatars%2Fgravatar-140.png" alt="" width="30" height="30"  />
          </div>
          <div class="name"><a href="/webtechnick">webtechnick</a> <span>(committer)</span></div>
          <div class="date"><abbr class="relatize" title="2010-09-25 13:27:44">Sat Sep 25 13:27:44 -0700 2010</abbr></div>
        </div>
      

    </div>
    <div class="machine">
      <span>c</span>ommit&nbsp;&nbsp;<a href="/webtechnick/CakePHP-FileUpload-Plugin/commit/1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3" hotkey="c">1c0d7c59079838c7ae9c</a><br />
      <span>t</span>ree&nbsp;&nbsp;&nbsp;&nbsp;<a href="/webtechnick/CakePHP-FileUpload-Plugin/tree/1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3" hotkey="t">0108573cc2d22a94ce4c</a><br />
      
        <span>p</span>arent&nbsp;
        
        <a href="/webtechnick/CakePHP-FileUpload-Plugin/tree/b0d3999c8e120ad97fedbe1c4288a227083ad065" hotkey="p">b0d3999c8e120ad97fed</a>
      

    </div>
  </div>

    </div>
  </div>



  <div id="slider">

  
    <div class="breadcrumb" data-path="vendors/uploader.php/">
      <b><a href="/webtechnick/CakePHP-FileUpload-Plugin/tree/1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3">CakePHP-FileUpload-Plugin</a></b> / <a href="/webtechnick/CakePHP-FileUpload-Plugin/tree/1c0d7c59079838c7ae9c8f2a6d7a76847ad834b3/vendors">vendors</a> / uploader.php       <span style="display:none" id="clippy_3449">vendors/uploader.php</span>
      
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
              width="110"
              height="14"
              class="clippy"
              id="clippy" >
      <param name="movie" value="https://assets3.github.com/flash/clippy.swf?v5"/>
      <param name="allowScriptAccess" value="always" />
      <param name="quality" value="high" />
      <param name="scale" value="noscale" />
      <param NAME="FlashVars" value="id=clippy_3449&amp;copied=copied!&amp;copyto=copy to clipboard">
      <param name="bgcolor" value="#FFFFFF">
      <param name="wmode" value="opaque">
      <embed src="https://assets3.github.com/flash/clippy.swf?v5"
             width="110"
             height="14"
             name="clippy"
             quality="high"
             allowScriptAccess="always"
             type="application/x-shockwave-flash"
             pluginspage="http://www.macromedia.com/go/getflashplayer"
             FlashVars="id=clippy_3449&amp;copied=copied!&amp;copyto=copy to clipboard"
             bgcolor="#FFFFFF"
             wmode="opaque"
      />
      </object>
      

    </div>

    <div class="frames">
      <div class="frame frame-center" data-path="vendors/uploader.php/">
        <div id="files">
          <div class="file">
            <div class="meta">
              <div class="info">
                <span class="icon"><img alt="Txt" height="16" src="https://assets1.github.com/images/icons/txt.png?47cb04938970e27960b000394e25d106da82d0b6" width="16" /></span>
                <span class="mode" title="File Mode">100644</span>
                
                  <span>347 lines (317 sloc)</span>
                
                <span>9.775 kb</span>
              </div>
              <ul class="actions">
                
                  <li><a class="file-edit-link" href="#" rel="/webtechnick/CakePHP-FileUpload-Plugin/file-edit/__ref__/vendors/uploader.php">edit</a></li>
                
                <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/raw/master/vendors/uploader.php" id="raw-url">raw</a></li>
                
                  <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/blame/master/vendors/uploader.php">blame</a></li>
                
                <li><a href="/webtechnick/CakePHP-FileUpload-Plugin/commits/master/vendors/uploader.php">history</a></li>
              </ul>
            </div>
            
  <div class="data type-php">
    
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <pre class="line_numbers"><span id="LID1" rel="#L1">1</span>
<span id="LID2" rel="#L2">2</span>
<span id="LID3" rel="#L3">3</span>
<span id="LID4" rel="#L4">4</span>
<span id="LID5" rel="#L5">5</span>
<span id="LID6" rel="#L6">6</span>
<span id="LID7" rel="#L7">7</span>
<span id="LID8" rel="#L8">8</span>
<span id="LID9" rel="#L9">9</span>
<span id="LID10" rel="#L10">10</span>
<span id="LID11" rel="#L11">11</span>
<span id="LID12" rel="#L12">12</span>
<span id="LID13" rel="#L13">13</span>
<span id="LID14" rel="#L14">14</span>
<span id="LID15" rel="#L15">15</span>
<span id="LID16" rel="#L16">16</span>
<span id="LID17" rel="#L17">17</span>
<span id="LID18" rel="#L18">18</span>
<span id="LID19" rel="#L19">19</span>
<span id="LID20" rel="#L20">20</span>
<span id="LID21" rel="#L21">21</span>
<span id="LID22" rel="#L22">22</span>
<span id="LID23" rel="#L23">23</span>
<span id="LID24" rel="#L24">24</span>
<span id="LID25" rel="#L25">25</span>
<span id="LID26" rel="#L26">26</span>
<span id="LID27" rel="#L27">27</span>
<span id="LID28" rel="#L28">28</span>
<span id="LID29" rel="#L29">29</span>
<span id="LID30" rel="#L30">30</span>
<span id="LID31" rel="#L31">31</span>
<span id="LID32" rel="#L32">32</span>
<span id="LID33" rel="#L33">33</span>
<span id="LID34" rel="#L34">34</span>
<span id="LID35" rel="#L35">35</span>
<span id="LID36" rel="#L36">36</span>
<span id="LID37" rel="#L37">37</span>
<span id="LID38" rel="#L38">38</span>
<span id="LID39" rel="#L39">39</span>
<span id="LID40" rel="#L40">40</span>
<span id="LID41" rel="#L41">41</span>
<span id="LID42" rel="#L42">42</span>
<span id="LID43" rel="#L43">43</span>
<span id="LID44" rel="#L44">44</span>
<span id="LID45" rel="#L45">45</span>
<span id="LID46" rel="#L46">46</span>
<span id="LID47" rel="#L47">47</span>
<span id="LID48" rel="#L48">48</span>
<span id="LID49" rel="#L49">49</span>
<span id="LID50" rel="#L50">50</span>
<span id="LID51" rel="#L51">51</span>
<span id="LID52" rel="#L52">52</span>
<span id="LID53" rel="#L53">53</span>
<span id="LID54" rel="#L54">54</span>
<span id="LID55" rel="#L55">55</span>
<span id="LID56" rel="#L56">56</span>
<span id="LID57" rel="#L57">57</span>
<span id="LID58" rel="#L58">58</span>
<span id="LID59" rel="#L59">59</span>
<span id="LID60" rel="#L60">60</span>
<span id="LID61" rel="#L61">61</span>
<span id="LID62" rel="#L62">62</span>
<span id="LID63" rel="#L63">63</span>
<span id="LID64" rel="#L64">64</span>
<span id="LID65" rel="#L65">65</span>
<span id="LID66" rel="#L66">66</span>
<span id="LID67" rel="#L67">67</span>
<span id="LID68" rel="#L68">68</span>
<span id="LID69" rel="#L69">69</span>
<span id="LID70" rel="#L70">70</span>
<span id="LID71" rel="#L71">71</span>
<span id="LID72" rel="#L72">72</span>
<span id="LID73" rel="#L73">73</span>
<span id="LID74" rel="#L74">74</span>
<span id="LID75" rel="#L75">75</span>
<span id="LID76" rel="#L76">76</span>
<span id="LID77" rel="#L77">77</span>
<span id="LID78" rel="#L78">78</span>
<span id="LID79" rel="#L79">79</span>
<span id="LID80" rel="#L80">80</span>
<span id="LID81" rel="#L81">81</span>
<span id="LID82" rel="#L82">82</span>
<span id="LID83" rel="#L83">83</span>
<span id="LID84" rel="#L84">84</span>
<span id="LID85" rel="#L85">85</span>
<span id="LID86" rel="#L86">86</span>
<span id="LID87" rel="#L87">87</span>
<span id="LID88" rel="#L88">88</span>
<span id="LID89" rel="#L89">89</span>
<span id="LID90" rel="#L90">90</span>
<span id="LID91" rel="#L91">91</span>
<span id="LID92" rel="#L92">92</span>
<span id="LID93" rel="#L93">93</span>
<span id="LID94" rel="#L94">94</span>
<span id="LID95" rel="#L95">95</span>
<span id="LID96" rel="#L96">96</span>
<span id="LID97" rel="#L97">97</span>
<span id="LID98" rel="#L98">98</span>
<span id="LID99" rel="#L99">99</span>
<span id="LID100" rel="#L100">100</span>
<span id="LID101" rel="#L101">101</span>
<span id="LID102" rel="#L102">102</span>
<span id="LID103" rel="#L103">103</span>
<span id="LID104" rel="#L104">104</span>
<span id="LID105" rel="#L105">105</span>
<span id="LID106" rel="#L106">106</span>
<span id="LID107" rel="#L107">107</span>
<span id="LID108" rel="#L108">108</span>
<span id="LID109" rel="#L109">109</span>
<span id="LID110" rel="#L110">110</span>
<span id="LID111" rel="#L111">111</span>
<span id="LID112" rel="#L112">112</span>
<span id="LID113" rel="#L113">113</span>
<span id="LID114" rel="#L114">114</span>
<span id="LID115" rel="#L115">115</span>
<span id="LID116" rel="#L116">116</span>
<span id="LID117" rel="#L117">117</span>
<span id="LID118" rel="#L118">118</span>
<span id="LID119" rel="#L119">119</span>
<span id="LID120" rel="#L120">120</span>
<span id="LID121" rel="#L121">121</span>
<span id="LID122" rel="#L122">122</span>
<span id="LID123" rel="#L123">123</span>
<span id="LID124" rel="#L124">124</span>
<span id="LID125" rel="#L125">125</span>
<span id="LID126" rel="#L126">126</span>
<span id="LID127" rel="#L127">127</span>
<span id="LID128" rel="#L128">128</span>
<span id="LID129" rel="#L129">129</span>
<span id="LID130" rel="#L130">130</span>
<span id="LID131" rel="#L131">131</span>
<span id="LID132" rel="#L132">132</span>
<span id="LID133" rel="#L133">133</span>
<span id="LID134" rel="#L134">134</span>
<span id="LID135" rel="#L135">135</span>
<span id="LID136" rel="#L136">136</span>
<span id="LID137" rel="#L137">137</span>
<span id="LID138" rel="#L138">138</span>
<span id="LID139" rel="#L139">139</span>
<span id="LID140" rel="#L140">140</span>
<span id="LID141" rel="#L141">141</span>
<span id="LID142" rel="#L142">142</span>
<span id="LID143" rel="#L143">143</span>
<span id="LID144" rel="#L144">144</span>
<span id="LID145" rel="#L145">145</span>
<span id="LID146" rel="#L146">146</span>
<span id="LID147" rel="#L147">147</span>
<span id="LID148" rel="#L148">148</span>
<span id="LID149" rel="#L149">149</span>
<span id="LID150" rel="#L150">150</span>
<span id="LID151" rel="#L151">151</span>
<span id="LID152" rel="#L152">152</span>
<span id="LID153" rel="#L153">153</span>
<span id="LID154" rel="#L154">154</span>
<span id="LID155" rel="#L155">155</span>
<span id="LID156" rel="#L156">156</span>
<span id="LID157" rel="#L157">157</span>
<span id="LID158" rel="#L158">158</span>
<span id="LID159" rel="#L159">159</span>
<span id="LID160" rel="#L160">160</span>
<span id="LID161" rel="#L161">161</span>
<span id="LID162" rel="#L162">162</span>
<span id="LID163" rel="#L163">163</span>
<span id="LID164" rel="#L164">164</span>
<span id="LID165" rel="#L165">165</span>
<span id="LID166" rel="#L166">166</span>
<span id="LID167" rel="#L167">167</span>
<span id="LID168" rel="#L168">168</span>
<span id="LID169" rel="#L169">169</span>
<span id="LID170" rel="#L170">170</span>
<span id="LID171" rel="#L171">171</span>
<span id="LID172" rel="#L172">172</span>
<span id="LID173" rel="#L173">173</span>
<span id="LID174" rel="#L174">174</span>
<span id="LID175" rel="#L175">175</span>
<span id="LID176" rel="#L176">176</span>
<span id="LID177" rel="#L177">177</span>
<span id="LID178" rel="#L178">178</span>
<span id="LID179" rel="#L179">179</span>
<span id="LID180" rel="#L180">180</span>
<span id="LID181" rel="#L181">181</span>
<span id="LID182" rel="#L182">182</span>
<span id="LID183" rel="#L183">183</span>
<span id="LID184" rel="#L184">184</span>
<span id="LID185" rel="#L185">185</span>
<span id="LID186" rel="#L186">186</span>
<span id="LID187" rel="#L187">187</span>
<span id="LID188" rel="#L188">188</span>
<span id="LID189" rel="#L189">189</span>
<span id="LID190" rel="#L190">190</span>
<span id="LID191" rel="#L191">191</span>
<span id="LID192" rel="#L192">192</span>
<span id="LID193" rel="#L193">193</span>
<span id="LID194" rel="#L194">194</span>
<span id="LID195" rel="#L195">195</span>
<span id="LID196" rel="#L196">196</span>
<span id="LID197" rel="#L197">197</span>
<span id="LID198" rel="#L198">198</span>
<span id="LID199" rel="#L199">199</span>
<span id="LID200" rel="#L200">200</span>
<span id="LID201" rel="#L201">201</span>
<span id="LID202" rel="#L202">202</span>
<span id="LID203" rel="#L203">203</span>
<span id="LID204" rel="#L204">204</span>
<span id="LID205" rel="#L205">205</span>
<span id="LID206" rel="#L206">206</span>
<span id="LID207" rel="#L207">207</span>
<span id="LID208" rel="#L208">208</span>
<span id="LID209" rel="#L209">209</span>
<span id="LID210" rel="#L210">210</span>
<span id="LID211" rel="#L211">211</span>
<span id="LID212" rel="#L212">212</span>
<span id="LID213" rel="#L213">213</span>
<span id="LID214" rel="#L214">214</span>
<span id="LID215" rel="#L215">215</span>
<span id="LID216" rel="#L216">216</span>
<span id="LID217" rel="#L217">217</span>
<span id="LID218" rel="#L218">218</span>
<span id="LID219" rel="#L219">219</span>
<span id="LID220" rel="#L220">220</span>
<span id="LID221" rel="#L221">221</span>
<span id="LID222" rel="#L222">222</span>
<span id="LID223" rel="#L223">223</span>
<span id="LID224" rel="#L224">224</span>
<span id="LID225" rel="#L225">225</span>
<span id="LID226" rel="#L226">226</span>
<span id="LID227" rel="#L227">227</span>
<span id="LID228" rel="#L228">228</span>
<span id="LID229" rel="#L229">229</span>
<span id="LID230" rel="#L230">230</span>
<span id="LID231" rel="#L231">231</span>
<span id="LID232" rel="#L232">232</span>
<span id="LID233" rel="#L233">233</span>
<span id="LID234" rel="#L234">234</span>
<span id="LID235" rel="#L235">235</span>
<span id="LID236" rel="#L236">236</span>
<span id="LID237" rel="#L237">237</span>
<span id="LID238" rel="#L238">238</span>
<span id="LID239" rel="#L239">239</span>
<span id="LID240" rel="#L240">240</span>
<span id="LID241" rel="#L241">241</span>
<span id="LID242" rel="#L242">242</span>
<span id="LID243" rel="#L243">243</span>
<span id="LID244" rel="#L244">244</span>
<span id="LID245" rel="#L245">245</span>
<span id="LID246" rel="#L246">246</span>
<span id="LID247" rel="#L247">247</span>
<span id="LID248" rel="#L248">248</span>
<span id="LID249" rel="#L249">249</span>
<span id="LID250" rel="#L250">250</span>
<span id="LID251" rel="#L251">251</span>
<span id="LID252" rel="#L252">252</span>
<span id="LID253" rel="#L253">253</span>
<span id="LID254" rel="#L254">254</span>
<span id="LID255" rel="#L255">255</span>
<span id="LID256" rel="#L256">256</span>
<span id="LID257" rel="#L257">257</span>
<span id="LID258" rel="#L258">258</span>
<span id="LID259" rel="#L259">259</span>
<span id="LID260" rel="#L260">260</span>
<span id="LID261" rel="#L261">261</span>
<span id="LID262" rel="#L262">262</span>
<span id="LID263" rel="#L263">263</span>
<span id="LID264" rel="#L264">264</span>
<span id="LID265" rel="#L265">265</span>
<span id="LID266" rel="#L266">266</span>
<span id="LID267" rel="#L267">267</span>
<span id="LID268" rel="#L268">268</span>
<span id="LID269" rel="#L269">269</span>
<span id="LID270" rel="#L270">270</span>
<span id="LID271" rel="#L271">271</span>
<span id="LID272" rel="#L272">272</span>
<span id="LID273" rel="#L273">273</span>
<span id="LID274" rel="#L274">274</span>
<span id="LID275" rel="#L275">275</span>
<span id="LID276" rel="#L276">276</span>
<span id="LID277" rel="#L277">277</span>
<span id="LID278" rel="#L278">278</span>
<span id="LID279" rel="#L279">279</span>
<span id="LID280" rel="#L280">280</span>
<span id="LID281" rel="#L281">281</span>
<span id="LID282" rel="#L282">282</span>
<span id="LID283" rel="#L283">283</span>
<span id="LID284" rel="#L284">284</span>
<span id="LID285" rel="#L285">285</span>
<span id="LID286" rel="#L286">286</span>
<span id="LID287" rel="#L287">287</span>
<span id="LID288" rel="#L288">288</span>
<span id="LID289" rel="#L289">289</span>
<span id="LID290" rel="#L290">290</span>
<span id="LID291" rel="#L291">291</span>
<span id="LID292" rel="#L292">292</span>
<span id="LID293" rel="#L293">293</span>
<span id="LID294" rel="#L294">294</span>
<span id="LID295" rel="#L295">295</span>
<span id="LID296" rel="#L296">296</span>
<span id="LID297" rel="#L297">297</span>
<span id="LID298" rel="#L298">298</span>
<span id="LID299" rel="#L299">299</span>
<span id="LID300" rel="#L300">300</span>
<span id="LID301" rel="#L301">301</span>
<span id="LID302" rel="#L302">302</span>
<span id="LID303" rel="#L303">303</span>
<span id="LID304" rel="#L304">304</span>
<span id="LID305" rel="#L305">305</span>
<span id="LID306" rel="#L306">306</span>
<span id="LID307" rel="#L307">307</span>
<span id="LID308" rel="#L308">308</span>
<span id="LID309" rel="#L309">309</span>
<span id="LID310" rel="#L310">310</span>
<span id="LID311" rel="#L311">311</span>
<span id="LID312" rel="#L312">312</span>
<span id="LID313" rel="#L313">313</span>
<span id="LID314" rel="#L314">314</span>
<span id="LID315" rel="#L315">315</span>
<span id="LID316" rel="#L316">316</span>
<span id="LID317" rel="#L317">317</span>
<span id="LID318" rel="#L318">318</span>
<span id="LID319" rel="#L319">319</span>
<span id="LID320" rel="#L320">320</span>
<span id="LID321" rel="#L321">321</span>
<span id="LID322" rel="#L322">322</span>
<span id="LID323" rel="#L323">323</span>
<span id="LID324" rel="#L324">324</span>
<span id="LID325" rel="#L325">325</span>
<span id="LID326" rel="#L326">326</span>
<span id="LID327" rel="#L327">327</span>
<span id="LID328" rel="#L328">328</span>
<span id="LID329" rel="#L329">329</span>
<span id="LID330" rel="#L330">330</span>
<span id="LID331" rel="#L331">331</span>
<span id="LID332" rel="#L332">332</span>
<span id="LID333" rel="#L333">333</span>
<span id="LID334" rel="#L334">334</span>
<span id="LID335" rel="#L335">335</span>
<span id="LID336" rel="#L336">336</span>
<span id="LID337" rel="#L337">337</span>
<span id="LID338" rel="#L338">338</span>
<span id="LID339" rel="#L339">339</span>
<span id="LID340" rel="#L340">340</span>
<span id="LID341" rel="#L341">341</span>
<span id="LID342" rel="#L342">342</span>
<span id="LID343" rel="#L343">343</span>
<span id="LID344" rel="#L344">344</span>
<span id="LID345" rel="#L345">345</span>
<span id="LID346" rel="#L346">346</span>
<span id="LID347" rel="#L347">347</span>
</pre>
          </td>
          <td width="100%">
            
              
                <div class="highlight"><pre><div class='line' id='LC1'><span class="cp">&lt;?php</span></div><div class='line' id='LC2'><span class="sd">/**</span></div><div class='line' id='LC3'><span class="sd">  * Uploader class handles a single file to be uploaded to the file system</span></div><div class='line' id='LC4'><span class="sd">  * </span></div><div class='line' id='LC5'><span class="sd">  * @author: Nick Baker</span></div><div class='line' id='LC6'><span class="sd">  * @version: since 6.0.0</span></div><div class='line' id='LC7'><span class="sd">  * @link: http://www.webtechnick.com </span></div><div class='line' id='LC8'><span class="sd">  */</span></div><div class='line' id='LC9'><span class="k">class</span> <span class="nc">Uploader</span> <span class="p">{</span></div><div class='line' id='LC10'>&nbsp;&nbsp;</div><div class='line' id='LC11'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC12'><span class="sd">    * File to upload.</span></div><div class='line' id='LC13'><span class="sd">    */</span></div><div class='line' id='LC14'>&nbsp;&nbsp;<span class="k">var</span> <span class="nv">$file</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC15'>&nbsp;&nbsp;</div><div class='line' id='LC16'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC17'><span class="sd">    * Global options</span></div><div class='line' id='LC18'><span class="sd">    * fileTypes to allow to upload</span></div><div class='line' id='LC19'><span class="sd">    */</span></div><div class='line' id='LC20'>&nbsp;&nbsp;<span class="k">var</span> <span class="nv">$options</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC21'>&nbsp;&nbsp;</div><div class='line' id='LC22'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC23'><span class="sd">    * errors holds any errors that occur as string values.</span></div><div class='line' id='LC24'><span class="sd">    * this can be access to debug the FileUploadComponent</span></div><div class='line' id='LC25'><span class="sd">    *</span></div><div class='line' id='LC26'><span class="sd">    * @var array</span></div><div class='line' id='LC27'><span class="sd">    * @access public</span></div><div class='line' id='LC28'><span class="sd">    */</span></div><div class='line' id='LC29'>&nbsp;&nbsp;<span class="k">var</span> <span class="nv">$errors</span> <span class="o">=</span> <span class="k">array</span><span class="p">();</span></div><div class='line' id='LC30'>&nbsp;&nbsp;</div><div class='line' id='LC31'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC32'><span class="sd">    * Definitions of errors that could occur during upload</span></div><div class='line' id='LC33'><span class="sd">    * </span></div><div class='line' id='LC34'><span class="sd">    * @author Jon Langevin</span></div><div class='line' id='LC35'><span class="sd">    * @var array</span></div><div class='line' id='LC36'><span class="sd">    */</span></div><div class='line' id='LC37'>&nbsp;&nbsp;<span class="k">var</span> <span class="nv">$uploadErrors</span> <span class="o">=</span> <span class="k">array</span><span class="p">(</span></div><div class='line' id='LC38'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_OK</span> <span class="o">=&gt;</span> <span class="s1">&#39;There is no error, the file uploaded with success.&#39;</span><span class="p">,</span></div><div class='line' id='LC39'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_INI_SIZE</span> <span class="o">=&gt;</span> <span class="s1">&#39;The uploaded file exceeds the upload_max_filesize directive in php.ini.&#39;</span><span class="p">,</span></div><div class='line' id='LC40'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_FORM_SIZE</span> <span class="o">=&gt;</span> <span class="s1">&#39;The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.&#39;</span><span class="p">,</span></div><div class='line' id='LC41'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_PARTIAL</span> <span class="o">=&gt;</span> <span class="s1">&#39;The uploaded file was only partially uploaded.&#39;</span><span class="p">,</span></div><div class='line' id='LC42'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_NO_FILE</span> <span class="o">=&gt;</span> <span class="s1">&#39;No file was uploaded.&#39;</span><span class="p">,</span></div><div class='line' id='LC43'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_NO_TMP_DIR</span> <span class="o">=&gt;</span> <span class="s1">&#39;Missing a temporary folder.&#39;</span><span class="p">,</span> <span class="c1">//Introduced in PHP 4.3.10 and PHP 5.0.3.</span></div><div class='line' id='LC44'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_CANT_WRITE</span> <span class="o">=&gt;</span> <span class="s1">&#39;Failed to write file to disk.&#39;</span><span class="p">,</span> <span class="c1">//Introduced in PHP 5.1.0.</span></div><div class='line' id='LC45'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">UPLOAD_ERR_EXTENSION</span> <span class="o">=&gt;</span> <span class="s1">&#39;File upload stopped by extension.&#39;</span> <span class="c1">//Introduced in PHP 5.2.0.</span></div><div class='line' id='LC46'>&nbsp;&nbsp;<span class="p">);</span></div><div class='line' id='LC47'>&nbsp;&nbsp;</div><div class='line' id='LC48'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC49'><span class="sd">    * Final file is set on move_uploaded_file success.</span></div><div class='line' id='LC50'><span class="sd">    * This is the file name of the final file that was uploaded</span></div><div class='line' id='LC51'><span class="sd">    * to the uploadDir directory</span></div><div class='line' id='LC52'><span class="sd">    *</span></div><div class='line' id='LC53'><span class="sd">    * @var string of final file name uploaded</span></div><div class='line' id='LC54'><span class="sd">    * @access public</span></div><div class='line' id='LC55'><span class="sd">    */</span></div><div class='line' id='LC56'>&nbsp;&nbsp;<span class="k">var</span> <span class="nv">$finalFile</span> <span class="o">=</span> <span class="k">null</span><span class="p">;</span></div><div class='line' id='LC57'><br/></div><div class='line' id='LC58'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">__construct</span><span class="p">(</span><span class="nv">$options</span> <span class="o">=</span> <span class="k">array</span><span class="p">()){</span></div><div class='line' id='LC59'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span> <span class="o">=</span> <span class="nb">array_merge</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">,</span> <span class="nv">$options</span><span class="p">);</span></div><div class='line' id='LC60'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC61'>&nbsp;&nbsp;</div><div class='line' id='LC62'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">setOption</span><span class="p">(</span><span class="nv">$key</span><span class="p">,</span> <span class="nv">$value</span><span class="p">){</span></div><div class='line' id='LC63'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="nv">$key</span><span class="p">]</span> <span class="o">=</span> <span class="nv">$value</span><span class="p">;</span></div><div class='line' id='LC64'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC65'>&nbsp;&nbsp;</div><div class='line' id='LC66'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC67'><span class="sd">    * Preform requested callbacks on the filename.</span></div><div class='line' id='LC68'><span class="sd">    *</span></div><div class='line' id='LC69'><span class="sd">    * @var string chosen filename</span></div><div class='line' id='LC70'><span class="sd">    * @return string of resulting filename</span></div><div class='line' id='LC71'><span class="sd">    * @access private</span></div><div class='line' id='LC72'><span class="sd">    */</span></div><div class='line' id='LC73'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">__handleFileNameCallback</span><span class="p">(</span><span class="nv">$fileName</span><span class="p">){</span>  </div><div class='line' id='LC74'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">]){</span></div><div class='line' id='LC75'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileModel&#39;</span><span class="p">]){</span></div><div class='line' id='LC76'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$Model</span> <span class="o">=</span> <span class="nx">ClassRegistry</span><span class="o">::</span><span class="na">init</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileModel&#39;</span><span class="p">]);</span></div><div class='line' id='LC77'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">method_exists</span><span class="p">(</span><span class="nv">$Model</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">])){</span></div><div class='line' id='LC78'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$fileName</span> <span class="o">=</span> <span class="nv">$Model</span><span class="o">-&gt;</span><span class="p">{</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">]}(</span><span class="nv">$fileName</span><span class="p">);</span></div><div class='line' id='LC79'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC80'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">elseif</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">])){</span></div><div class='line' id='LC81'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$fileName</span> <span class="o">=</span> <span class="nb">call_user_func</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">],</span> <span class="nv">$fileName</span><span class="p">);</span></div><div class='line' id='LC82'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC83'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC84'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC85'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">function_exists</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">])){</span></div><div class='line' id='LC86'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$fileName</span> <span class="o">=</span> <span class="nb">call_user_func</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">],</span> <span class="nv">$fileName</span><span class="p">);</span></div><div class='line' id='LC87'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC88'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC89'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC90'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$fileName</span><span class="p">){</span></div><div class='line' id='LC91'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="s1">&#39;No filename resulting after parsing. Function: &#39;</span> <span class="o">.</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;fileNameFunction&#39;</span><span class="p">]);</span></div><div class='line' id='LC92'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC93'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC94'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$fileName</span><span class="p">;</span></div><div class='line' id='LC95'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC96'>&nbsp;&nbsp;</div><div class='line' id='LC97'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC98'><span class="sd">    * Preform requested target patch checks depending on the unique setting</span></div><div class='line' id='LC99'><span class="sd">    * </span></div><div class='line' id='LC100'><span class="sd">    * @var string chosen filename target_path</span></div><div class='line' id='LC101'><span class="sd">    * @return string of resulting target_path</span></div><div class='line' id='LC102'><span class="sd">    * @access private</span></div><div class='line' id='LC103'><span class="sd">    */</span></div><div class='line' id='LC104'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">__handleUnique</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">){</span></div><div class='line' id='LC105'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;unique&#39;</span><span class="p">]){</span></div><div class='line' id='LC106'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$temp_path</span> <span class="o">=</span> <span class="nb">substr</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">,</span> <span class="m">0</span><span class="p">,</span> <span class="nb">strlen</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">)</span> <span class="o">-</span> <span class="nb">strlen</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_ext</span><span class="p">()));</span> <span class="c1">//temp path without the ext</span></div><div class='line' id='LC107'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$i</span><span class="o">=</span><span class="m">1</span><span class="p">;</span></div><div class='line' id='LC108'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">while</span><span class="p">(</span><span class="nb">file_exists</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">)){</span></div><div class='line' id='LC109'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$target_path</span> <span class="o">=</span> <span class="nv">$temp_path</span> <span class="o">.</span> <span class="s2">&quot;-&quot;</span> <span class="o">.</span> <span class="nv">$i</span> <span class="o">.</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_ext</span><span class="p">();</span></div><div class='line' id='LC110'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$i</span><span class="o">++</span><span class="p">;</span></div><div class='line' id='LC111'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC112'>		<span class="p">}</span></div><div class='line' id='LC113'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$target_path</span><span class="p">;</span></div><div class='line' id='LC114'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC115'>&nbsp;&nbsp;</div><div class='line' id='LC116'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC117'><span class="sd">    * processFile will take a file, or use the current file given to it</span></div><div class='line' id='LC118'><span class="sd">    * and attempt to save the file to the file system.</span></div><div class='line' id='LC119'><span class="sd">    * processFile will check to make sure the file is there, and its type is allowed to be saved.</span></div><div class='line' id='LC120'><span class="sd">    * </span></div><div class='line' id='LC121'><span class="sd">    * @param file array of uploaded file (optional)</span></div><div class='line' id='LC122'><span class="sd">    * @return String | false String of finalFile name saved to the file system or false if unable to save to file system. </span></div><div class='line' id='LC123'><span class="sd">    * @access public</span></div><div class='line' id='LC124'><span class="sd">    */</span></div><div class='line' id='LC125'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">processFile</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC126'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC127'>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC128'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//check if we have a file and if we allow the type, return false otherwise.</span></div><div class='line' id='LC129'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">checkFile</span><span class="p">()</span> <span class="o">||</span> <span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">checkType</span><span class="p">()</span> <span class="o">||</span> <span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">checkSize</span><span class="p">()){</span></div><div class='line' id='LC130'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC131'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC132'>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC133'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//make sure the file doesn&#39;t already exist, if it does, add an itteration to it</span></div><div class='line' id='LC134'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$up_dir</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;uploadDir&#39;</span><span class="p">];</span></div><div class='line' id='LC135'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$fileName</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">__handleFileNameCallback</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;name&#39;</span><span class="p">]);</span></div><div class='line' id='LC136'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//if callback returns false hault the upload </span></div><div class='line' id='LC137'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$fileName</span><span class="p">){</span></div><div class='line' id='LC138'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC139'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span>    </div><div class='line' id='LC140'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$target_path</span> <span class="o">=</span> <span class="nv">$up_dir</span> <span class="o">.</span> <span class="nx">DS</span> <span class="o">.</span> <span class="nv">$fileName</span><span class="p">;</span></div><div class='line' id='LC141'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$target_path</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">__handleUnique</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">);</span></div><div class='line' id='LC142'>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC143'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//now move the file.</span></div><div class='line' id='LC144'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">move_uploaded_file</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;tmp_name&#39;</span><span class="p">],</span> <span class="nv">$target_path</span><span class="p">)){</span></div><div class='line' id='LC145'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">finalFile</span> <span class="o">=</span> <span class="nb">basename</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">);</span></div><div class='line' id='LC146'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">finalFile</span><span class="p">;</span></div><div class='line' id='LC147'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC148'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span><span class="p">{</span></div><div class='line' id='LC149'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="s1">&#39;Unable to save temp file to file system.&#39;</span><span class="p">);</span></div><div class='line' id='LC150'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC151'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC152'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC153'>&nbsp;&nbsp;</div><div class='line' id='LC154'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC155'><span class="sd">    * setFile will set a this-&gt;file if given one.</span></div><div class='line' id='LC156'><span class="sd">    * </span></div><div class='line' id='LC157'><span class="sd">    * @param file array of uploaded file. (optional)</span></div><div class='line' id='LC158'><span class="sd">    * @return void</span></div><div class='line' id='LC159'><span class="sd">    */</span></div><div class='line' id='LC160'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">setFile</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC161'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$file</span><span class="p">)</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span> <span class="o">=</span> <span class="nv">$file</span><span class="p">;</span></div><div class='line' id='LC162'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC163'>&nbsp;&nbsp;</div><div class='line' id='LC164'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC165'><span class="sd">    * Returns the extension of the uploaded filename.</span></div><div class='line' id='LC166'><span class="sd">    *</span></div><div class='line' id='LC167'><span class="sd">    * @return string $extension A filename extension</span></div><div class='line' id='LC168'><span class="sd">    * @param file array of uploaded file (optional)</span></div><div class='line' id='LC169'><span class="sd">    * @access protected</span></div><div class='line' id='LC170'><span class="sd">    */</span></div><div class='line' id='LC171'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">_ext</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC172'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC173'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nb">strrchr</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;name&#39;</span><span class="p">],</span><span class="s2">&quot;.&quot;</span><span class="p">);</span></div><div class='line' id='LC174'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC175'>&nbsp;&nbsp;</div><div class='line' id='LC176'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC177'><span class="sd">  * Adds error messages to the component</span></div><div class='line' id='LC178'><span class="sd">  *</span></div><div class='line' id='LC179'><span class="sd">  * @param string $text String of error message to save</span></div><div class='line' id='LC180'><span class="sd">  * @return void</span></div><div class='line' id='LC181'><span class="sd">  * @access protected</span></div><div class='line' id='LC182'><span class="sd">  */</span></div><div class='line' id='LC183'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">_error</span><span class="p">(</span><span class="nv">$text</span><span class="p">){</span></div><div class='line' id='LC184'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">errors</span><span class="p">[]</span> <span class="o">=</span> <span class="nx">__</span><span class="p">(</span><span class="nv">$text</span><span class="p">,</span><span class="k">true</span><span class="p">);</span></div><div class='line' id='LC185'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC186'>&nbsp;&nbsp;</div><div class='line' id='LC187'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC188'><span class="sd">  * Checks if the uploaded type is allowed defined in the allowedTypes</span></div><div class='line' id='LC189'><span class="sd">  *</span></div><div class='line' id='LC190'><span class="sd">  * @return boolean if type is accepted</span></div><div class='line' id='LC191'><span class="sd">  * @param file array of uploaded file (optional)</span></div><div class='line' id='LC192'><span class="sd">  * @access public</span></div><div class='line' id='LC193'><span class="sd">  */</span></div><div class='line' id='LC194'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">checkType</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC195'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC196'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;allowedTypes&#39;</span><span class="p">]</span> <span class="k">as</span> <span class="nv">$ext</span> <span class="o">=&gt;</span> <span class="nv">$types</span><span class="p">){</span>      </div><div class='line' id='LC197'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nb">is_string</span><span class="p">(</span><span class="nv">$ext</span><span class="p">)){</span></div><div class='line' id='LC198'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$ext</span> <span class="o">=</span> <span class="nv">$types</span><span class="p">;</span></div><div class='line' id='LC199'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC200'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$ext</span> <span class="o">==</span> <span class="s1">&#39;*&#39;</span><span class="p">){</span></div><div class='line' id='LC201'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC202'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC203'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC204'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$ext</span> <span class="o">=</span> <span class="nb">strtolower</span><span class="p">(</span><span class="s1">&#39;.&#39;</span> <span class="o">.</span> <span class="nb">str_replace</span><span class="p">(</span><span class="s1">&#39;.&#39;</span><span class="p">,</span><span class="s1">&#39;&#39;</span><span class="p">,</span> <span class="nv">$ext</span><span class="p">));</span></div><div class='line' id='LC205'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$file_ext</span> <span class="o">=</span> <span class="nb">strtolower</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_ext</span><span class="p">());</span></div><div class='line' id='LC206'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$file_ext</span> <span class="o">==</span> <span class="nv">$ext</span><span class="p">){</span></div><div class='line' id='LC207'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$types</span><span class="p">)</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nb">in_array</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;type&#39;</span><span class="p">],</span> <span class="nv">$types</span><span class="p">)){</span></div><div class='line' id='LC208'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="s2">&quot;</span><span class="si">{</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;type&#39;</span><span class="p">]</span><span class="si">}</span><span class="s2"> is not an allowed type.&quot;</span><span class="p">);</span></div><div class='line' id='LC209'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC210'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC211'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC212'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC213'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC214'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span>    </div><div class='line' id='LC215'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC216'><br/></div><div class='line' id='LC217'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="s2">&quot;extension is not allowed.&quot;</span><span class="p">);</span></div><div class='line' id='LC218'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC219'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC220'>&nbsp;&nbsp;</div><div class='line' id='LC221'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC222'><span class="sd">    * Checks if there is a file uploaded</span></div><div class='line' id='LC223'><span class="sd">    *</span></div><div class='line' id='LC224'><span class="sd">    * @return void</span></div><div class='line' id='LC225'><span class="sd">    * @access public</span></div><div class='line' id='LC226'><span class="sd">    * @param file array of uploaded file (optional)</span></div><div class='line' id='LC227'><span class="sd">    */</span></div><div class='line' id='LC228'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">checkFile</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC229'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC230'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">hasUpload</span><span class="p">()</span> <span class="o">&amp;&amp;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">){</span></div><div class='line' id='LC231'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">isset</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;error&#39;</span><span class="p">])</span> <span class="o">&amp;&amp;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;error&#39;</span><span class="p">]</span> <span class="o">==</span> <span class="nx">UPLOAD_ERR_OK</span> <span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC232'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC233'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC234'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC235'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">uploadErrors</span><span class="p">[</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;error&#39;</span><span class="p">]]);</span></div><div class='line' id='LC236'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC237'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span>        </div><div class='line' id='LC238'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC239'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC240'>&nbsp;&nbsp;</div><div class='line' id='LC241'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC242'><span class="sd">    * Checks if the file uploaded exceeds the maxFileSize setting (if there is onw)</span></div><div class='line' id='LC243'><span class="sd">    *</span></div><div class='line' id='LC244'><span class="sd">    * @return boolean</span></div><div class='line' id='LC245'><span class="sd">    * @access public</span></div><div class='line' id='LC246'><span class="sd">    * @param file array of uploaded file (optional)</span></div><div class='line' id='LC247'><span class="sd">    */</span></div><div class='line' id='LC248'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">checkSize</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC249'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC250'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">hasUpload</span><span class="p">()</span> <span class="o">&amp;&amp;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">){</span></div><div class='line' id='LC251'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;maxFileSize&#39;</span><span class="p">]){</span> <span class="c1">//We don&#39;t want to test maxFileSize</span></div><div class='line' id='LC252'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC253'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC254'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">elseif</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;maxFileSize&#39;</span><span class="p">]</span> <span class="o">&amp;&amp;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">[</span><span class="s1">&#39;size&#39;</span><span class="p">]</span> <span class="o">&lt;</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;maxFileSize&#39;</span><span class="p">]){</span></div><div class='line' id='LC255'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC256'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC257'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC258'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_error</span><span class="p">(</span><span class="s2">&quot;File exceeds </span><span class="si">{</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;maxFileSize&#39;</span><span class="p">]</span><span class="si">}</span><span class="s2"> byte limit.&quot;</span><span class="p">);</span></div><div class='line' id='LC259'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC260'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC261'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC262'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC263'>&nbsp;&nbsp;</div><div class='line' id='LC264'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC265'><span class="sd">    * removeFile removes a specific file from the uploaded directory</span></div><div class='line' id='LC266'><span class="sd">    *</span></div><div class='line' id='LC267'><span class="sd">    * @param string $name A reference to the filename to delete from the uploadDirectory</span></div><div class='line' id='LC268'><span class="sd">    * @return boolean</span></div><div class='line' id='LC269'><span class="sd">    * @access public</span></div><div class='line' id='LC270'><span class="sd">    */</span></div><div class='line' id='LC271'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">removeFile</span><span class="p">(</span><span class="nv">$name</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC272'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nv">$name</span> <span class="o">||</span> <span class="nb">strpos</span><span class="p">(</span><span class="nv">$name</span><span class="p">,</span> <span class="s1">&#39;://&#39;</span><span class="p">)){</span></div><div class='line' id='LC273'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC274'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC275'>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC276'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$up_dir</span> <span class="o">=</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">options</span><span class="p">[</span><span class="s1">&#39;uploadDir&#39;</span><span class="p">];</span></div><div class='line' id='LC277'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$target_path</span> <span class="o">=</span> <span class="nv">$up_dir</span> <span class="o">.</span> <span class="nx">DS</span> <span class="o">.</span> <span class="nv">$name</span><span class="p">;</span></div><div class='line' id='LC278'>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC279'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="c1">//delete main image -- $name</span></div><div class='line' id='LC280'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="o">@</span><span class="nb">unlink</span><span class="p">(</span><span class="nv">$target_path</span><span class="p">)){</span></div><div class='line' id='LC281'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC282'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span> <span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC283'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC284'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC285'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC286'>&nbsp;&nbsp;</div><div class='line' id='LC287'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC288'><span class="sd">    * hasUpload</span></div><div class='line' id='LC289'><span class="sd">    * </span></div><div class='line' id='LC290'><span class="sd">    * @return boolean true | false depending if a file was actually uploaded.</span></div><div class='line' id='LC291'><span class="sd">    * @param file array of uploaded file (optional)</span></div><div class='line' id='LC292'><span class="sd">    */</span></div><div class='line' id='LC293'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">hasUpload</span><span class="p">(</span><span class="nv">$file</span> <span class="o">=</span> <span class="k">null</span><span class="p">){</span></div><div class='line' id='LC294'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$this</span><span class="o">-&gt;</span><span class="na">setFile</span><span class="p">(</span><span class="nv">$file</span><span class="p">);</span></div><div class='line' id='LC295'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multiArrayKeyExists</span><span class="p">(</span><span class="s2">&quot;tmp_name&quot;</span><span class="p">,</span> <span class="nv">$this</span><span class="o">-&gt;</span><span class="na">file</span><span class="p">));</span></div><div class='line' id='LC296'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC297'>&nbsp;&nbsp;</div><div class='line' id='LC298'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC299'><span class="sd">    * @return boolean true if errors were detected.</span></div><div class='line' id='LC300'><span class="sd">    */</span></div><div class='line' id='LC301'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">hasErrors</span><span class="p">(){</span></div><div class='line' id='LC302'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nb">count</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">errors</span><span class="p">);</span></div><div class='line' id='LC303'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC304'>&nbsp;&nbsp;</div><div class='line' id='LC305'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC306'><span class="sd">    * showErrors itterates through the errors array</span></div><div class='line' id='LC307'><span class="sd">    * and returns a concatinated string of errors sepearated by</span></div><div class='line' id='LC308'><span class="sd">    * the $sep</span></div><div class='line' id='LC309'><span class="sd">    *</span></div><div class='line' id='LC310'><span class="sd">    * @param string $sep A seperated defaults to &lt;br /&gt;</span></div><div class='line' id='LC311'><span class="sd">    * @return string</span></div><div class='line' id='LC312'><span class="sd">    * @access public</span></div><div class='line' id='LC313'><span class="sd">    */</span></div><div class='line' id='LC314'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">showErrors</span><span class="p">(</span><span class="nv">$sep</span> <span class="o">=</span> <span class="s2">&quot; &quot;</span><span class="p">){</span></div><div class='line' id='LC315'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$retval</span> <span class="o">=</span> <span class="s2">&quot;&quot;</span><span class="p">;</span></div><div class='line' id='LC316'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">errors</span> <span class="k">as</span> <span class="nv">$error</span><span class="p">){</span></div><div class='line' id='LC317'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nv">$retval</span> <span class="o">.=</span> <span class="s2">&quot;</span><span class="si">$error</span><span class="s2"> </span><span class="si">$sep</span><span class="s2">&quot;</span><span class="p">;</span></div><div class='line' id='LC318'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC319'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="nv">$retval</span><span class="p">;</span></div><div class='line' id='LC320'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC321'>&nbsp;&nbsp;</div><div class='line' id='LC322'>&nbsp;&nbsp;<span class="sd">/**</span></div><div class='line' id='LC323'><span class="sd">    * Searches through the $haystack for a $key.</span></div><div class='line' id='LC324'><span class="sd">    *</span></div><div class='line' id='LC325'><span class="sd">    * @param string $needle String of key to search for in $haystack</span></div><div class='line' id='LC326'><span class="sd">    * @param array $haystack Array of which to search for $needle</span></div><div class='line' id='LC327'><span class="sd">    * @return boolean true if given key is in an array</span></div><div class='line' id='LC328'><span class="sd">    * @access protected</span></div><div class='line' id='LC329'><span class="sd">    */</span></div><div class='line' id='LC330'>&nbsp;&nbsp;<span class="k">function</span> <span class="nf">_multiArrayKeyExists</span><span class="p">(</span><span class="nv">$needle</span><span class="p">,</span> <span class="nv">$haystack</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC331'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$haystack</span><span class="p">)){</span></div><div class='line' id='LC332'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">foreach</span> <span class="p">(</span><span class="nv">$haystack</span> <span class="k">as</span> <span class="nv">$key</span><span class="o">=&gt;</span><span class="nv">$value</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC333'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nv">$needle</span><span class="o">===</span><span class="nv">$key</span> <span class="o">&amp;&amp;</span> <span class="nv">$value</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC334'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC335'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC336'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nb">is_array</span><span class="p">(</span><span class="nv">$value</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC337'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span><span class="p">(</span><span class="nv">$this</span><span class="o">-&gt;</span><span class="na">_multiArrayKeyExists</span><span class="p">(</span><span class="nv">$needle</span><span class="p">,</span> <span class="nv">$value</span><span class="p">)){</span></div><div class='line' id='LC338'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">true</span><span class="p">;</span></div><div class='line' id='LC339'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC340'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC341'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC342'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC343'>&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">return</span> <span class="k">false</span><span class="p">;</span></div><div class='line' id='LC344'>&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC345'><br/></div><div class='line' id='LC346'><span class="p">}</span></div><div class='line' id='LC347'><span class="cp">?&gt;</span><span class="x"></span></div></pre></div>
              
            
          </td>
        </tr>
      </table>
    
  </div>


          </div>
        </div>
      </div>
    </div>
  

  </div>



<div class="frame frame-loading" style="display:none;">
  <img src="/images/modules/ajax/big_spinner_336699.gif">
</div>
    </div>
  
      
    </div>

    <div id="footer" class="clearfix">
      <div class="site">
        <div class="sponsor">
          <a href="http://www.rackspace.com" class="logo">
            <img alt="Dedicated Server" src="https://assets1.github.com/images/modules/footer/rackspace_logo.png?v2?47cb04938970e27960b000394e25d106da82d0b6" />
          </a>
          Powered by the <a href="http://www.rackspace.com ">Dedicated
          Servers</a> and<br/> <a href="http://www.rackspacecloud.com">Cloud
          Computing</a> of Rackspace Hosting<span>&reg;</span>
        </div>

        <ul class="links">
          <li class="blog"><a href="https://github.com/blog">Blog</a></li>
          <li><a href="http://support.github.com">Support</a></li>
          <li><a href="https://github.com/training">Training</a></li>
          <li><a href="http://jobs.github.com">Job Board</a></li>
          <li><a href="http://shop.github.com">Shop</a></li>
          <li><a href="https://github.com/contact">Contact</a></li>
          <li><a href="http://develop.github.com">API</a></li>
          <li><a href="http://status.github.com">Status</a></li>
        </ul>
        <ul class="sosueme">
          <li class="main">&copy; 2011 <span id="_rrt" title="0.39687s from fe2.rs.github.com">GitHub</span> Inc. All rights reserved.</li>
          <li><a href="/site/terms">Terms of Service</a></li>
          <li><a href="/site/privacy">Privacy</a></li>
          <li><a href="https://github.com/security">Security</a></li>
        </ul>
      </div>
    </div><!-- /#footer -->

    
      
      
        <!-- current locale:  -->
        <div class="locales">
          <div class="site">

            <ul class="choices clearfix limited-locales">
              <li><span class="current">English</span></li>
              
                  <li><a rel="nofollow" href="?locale=de">Deutsch</a></li>
              
                  <li><a rel="nofollow" href="?locale=fr">Français</a></li>
              
                  <li><a rel="nofollow" href="?locale=ja">日本語</a></li>
              
                  <li><a rel="nofollow" href="?locale=pt-BR">Português (BR)</a></li>
              
                  <li><a rel="nofollow" href="?locale=ru">Русский</a></li>
              
                  <li><a rel="nofollow" href="?locale=zh">中文</a></li>
              
              <li class="all"><a href="#" class="minibutton btn-forward js-all-locales"><span><span class="icon"></span>See all available languages</span></a></li>
            </ul>

            <div class="all-locales clearfix">
              <h3>Your current locale selection: <strong>English</strong>. Choose another?</h3>
              
              
                <ul class="choices">
                  
                      <li><a rel="nofollow" href="?locale=en">English</a></li>
                  
                      <li><a rel="nofollow" href="?locale=af">Afrikaans</a></li>
                  
                      <li><a rel="nofollow" href="?locale=ca">Català</a></li>
                  
                      <li><a rel="nofollow" href="?locale=cs">Čeština</a></li>
                  
                </ul>
              
                <ul class="choices">
                  
                      <li><a rel="nofollow" href="?locale=de">Deutsch</a></li>
                  
                      <li><a rel="nofollow" href="?locale=es">Español</a></li>
                  
                      <li><a rel="nofollow" href="?locale=fr">Français</a></li>
                  
                      <li><a rel="nofollow" href="?locale=hr">Hrvatski</a></li>
                  
                </ul>
              
                <ul class="choices">
                  
                      <li><a rel="nofollow" href="?locale=id">Indonesia</a></li>
                  
                      <li><a rel="nofollow" href="?locale=it">Italiano</a></li>
                  
                      <li><a rel="nofollow" href="?locale=ja">日本語</a></li>
                  
                      <li><a rel="nofollow" href="?locale=nl">Nederlands</a></li>
                  
                </ul>
              
                <ul class="choices">
                  
                      <li><a rel="nofollow" href="?locale=no">Norsk</a></li>
                  
                      <li><a rel="nofollow" href="?locale=pl">Polski</a></li>
                  
                      <li><a rel="nofollow" href="?locale=pt-BR">Português (BR)</a></li>
                  
                      <li><a rel="nofollow" href="?locale=ru">Русский</a></li>
                  
                </ul>
              
                <ul class="choices">
                  
                      <li><a rel="nofollow" href="?locale=sr">Српски</a></li>
                  
                      <li><a rel="nofollow" href="?locale=sv">Svenska</a></li>
                  
                      <li><a rel="nofollow" href="?locale=zh">中文</a></li>
                  
                </ul>
              
            </div>

          </div>
          <div class="fade"></div>
        </div>
      
    

    <script>window._auth_token = "c4bd4d10f0a87fb4c5ee6188cb2dbc5d8a28c7cc"</script>
    <div id="keyboard_shortcuts_pane" style="display:none">
  <h2>Keyboard Shortcuts</h2>

  <div class="columns threecols">
    <div class="column first">
      <h3>Site wide shortcuts</h3>
      <dl class="keyboard-mappings">
        <dt>s</dt>
        <dd>Focus site search</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>?</dt>
        <dd>Bring up this help dialog</dd>
      </dl>
    </div><!-- /.column.first -->
    <div class="column middle">
      <h3>Commit list</h3>
      <dl class="keyboard-mappings">
        <dt>j</dt>
        <dd>Move selected down</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>k</dt>
        <dd>Move selected up</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>t</dt>
        <dd>Open tree</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>p</dt>
        <dd>Open parent</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>c <em>or</em> o <em>or</em> enter</dt>
        <dd>Open commit</dd>
      </dl>
    </div><!-- /.column.first -->
    <div class="column last">
      <h3>Pull request list</h3>
      <dl class="keyboard-mappings">
        <dt>j</dt>
        <dd>Move selected down</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>k</dt>
        <dd>Move selected up</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>o <em>or</em> enter</dt>
        <dd>Open issue</dd>
      </dl>
    </div><!-- /.columns.last -->
  </div><!-- /.columns.equacols -->

  <div class="rule"></div>

  <h3>Issues</h3>

  <div class="columns threecols">
    <div class="column first">
      <dl class="keyboard-mappings">
        <dt>j</dt>
        <dd>Move selected down</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>k</dt>
        <dd>Move selected up</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>x</dt>
        <dd>Toggle select target</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>o <em>or</em> enter</dt>
        <dd>Open issue</dd>
      </dl>
    </div><!-- /.column.first -->
    <div class="column middle">
      <dl class="keyboard-mappings">
        <dt>I</dt>
        <dd>Mark selected as read</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>U</dt>
        <dd>Mark selected as unread</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>e</dt>
        <dd>Close selected</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>y</dt>
        <dd>Remove selected from view</dd>
      </dl>
    </div><!-- /.column.middle -->
    <div class="column last">
      <dl class="keyboard-mappings">
        <dt>c</dt>
        <dd>Create issue</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>l</dt>
        <dd>Create label</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>i</dt>
        <dd>Back to inbox</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>u</dt>
        <dd>Back to issues</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>/</dt>
        <dd>Focus issues search</dd>
      </dl>
    </div>
  </div>

  <div class="rule"></div>

  <h3>Network Graph</h3>
  <div class="columns equacols">
    <div class="column first">
      <dl class="keyboard-mappings">
        <dt>← <em>or</em> h</dt>
        <dd>Scroll left</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>→ <em>or</em> l</dt>
        <dd>Scroll right</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>↑ <em>or</em> k</dt>
        <dd>Scroll up</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>↓ <em>or</em> j</dt>
        <dd>Scroll down</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>t</dt>
        <dd>Toggle visibility of head labels</dd>
      </dl>
    </div><!-- /.column.first -->
    <div class="column last">
      <dl class="keyboard-mappings">
        <dt>shift ← <em>or</em> shift h</dt>
        <dd>Scroll all the way left</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>shift → <em>or</em> shift l</dt>
        <dd>Scroll all the way right</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>shift ↑ <em>or</em> shift k</dt>
        <dd>Scroll all the way up</dd>
      </dl>
      <dl class="keyboard-mappings">
        <dt>shift ↓ <em>or</em> shift j</dt>
        <dd>Scroll all the way down</dd>
      </dl>
    </div><!-- /.column.last -->
  </div>

</div>
    

    <!--[if IE 8]>
    <script type="text/javascript" charset="utf-8">
      $(document.body).addClass("ie8")
    </script>
    <![endif]-->

    <!--[if IE 7]>
    <script type="text/javascript" charset="utf-8">
      $(document.body).addClass("ie7")
    </script>
    <![endif]-->

    <script type="text/javascript">
      _kmq.push(['trackClick', 'entice-signup-button', 'Entice banner clicked']);
      
    </script>
    
  </body>
</html>

