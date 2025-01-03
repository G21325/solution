<?php
$base_url = "https://app.ncare.live/c3VydmVyX8RpbEU9Mi8xNy8yMDE0GIDU6RgzQ6NTAgdEoaeFzbF92YWxIZTO0U0ezN1IzMyfvcGVMZEJCTEFWeVN3PTOmdFsaWRtaW51aiPhnPTI2/";

 the URL
$channel_id = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($channel_id)) {
    die("Error: No channel ID provided.");
}

//script by @fredflix ceo
$m3u8_link = $base_url . $channel_id . "/playlist.m3u8";
?>

<html>

<head>

<title></title>
<link rel="icon" href=""> 
<link rel="stylesheet" type="text/css" href="">
    <script src="//content.jwplatform.com/libraries/SAHhwvZq.js"></script>

<script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/level-selector@0.2.0/dist/level-selector.min.js"></script>

<script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@latest'></script>

<script src="https://cdn.jsdelivr.net/npm/@clappr/hlsjs-playback@1.0.1/dist/hlsjs-playback.min.js"></script><div id="player" style="height: 100%; width: 100%;"></div>
</head>
<body>

</div>

<script>

    var player = new Clappr.Player({ 

    source: '<?php echo $m3u8_link; ?>',

    width:'100%', 

    height:'100%',

    autoPlay: true, 
    stretching: "exactfit",
    aspectratio: "16:9",

    plugins: [HlsjsPlayback,LevelSelector],

    mimeType: "application/x-mpegURL", 

    mediacontrol: {seekbar: "red", buttons: "#fff"},  

    parentId: "#player"} ); 

</script>

</body>

<script>

setTimeout(videovisible, 3000)

function videovisible() {

    document.getElementById('loading').style.display = 'none'

}

document.addEventListener("DOMContentLoaded", () => {

    const e = document.querySelector("video"),

        n = e.getElementsByTagName("source")[0].src,

        o = {};

    if (Hls.isSupported()) {

        var config = {

            maxMaxBufferLength: 100,

        };

        const t = new Hls(config);

        t.loadSource(n), t.on(Hls.Events.MANIFEST_PARSED, function(n, l) {

            const s = t.levels.map(e => e.height);

            o.quality = {

                default: s[0],

                options: s,

                forced: !0,

                onChange: e => (function(e) {

                    window.hls.levels.forEach((n, o) => {

                        n.height === e && (window.hls.currentLevel = o)

                    })

                })(e)

            };

            new Plyr(e, o)

        }), t.attachMedia(e), window.hls = t

    } else {

        new Plyr(e, o)

    }

});

</script>

</body>

</html>
