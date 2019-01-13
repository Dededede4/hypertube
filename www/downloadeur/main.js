var torrentStream = require('torrent-stream');

var engine = torrentStream('magnet:?xt=urn:btih:218102874f75f0132728331519a2e6e469d01cf9&dn=Scary+Movie+%5BQuadrilogy%5D+720p+mkv+-+YIFY&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Fzer0day.ch%3A1337&tr=udp%3A%2F%2Fopen.demonii.com%3A1337&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Fexodus.desync.com%3A6969');
var Transcoder = require('stream-transcoder');

var fs = require("fs");
var myFile = fs.createWriteStream("video.mp4");
engine.on('ready', function() {
	var i = 0;
		engine.files.forEach(function(file) {
				i++;
				if (i > 1)
					return;
					console.log('filename:', file.name);
					var stream = file.createReadStream();

						new Transcoder(stream)
	  				    .maxSize(320, 240)
					    .videoCodec('h264')
					    .videoBitrate(800 * 1000)
					    .fps(25)
					    .audioCodec('aac')
					    .sampleRate(44100)
					    .channels(2)
					    .audioBitrate(128 * 1000)
					    .format('mp4')
					    .on('finish', function() {
					    	next();
					    })
					    .stream().pipe(myFile);
 	});
});
