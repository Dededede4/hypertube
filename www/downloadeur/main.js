#!/usr/bin/env node

var torrentStream = require('torrent-stream');
var fs = require("fs");
var Transcoder = require('stream-transcoder');
var amqp = require('amqplib/callback_api');

amqp.connect('amqp://localhost', function(err, conn) {
  conn.createChannel(function(err, ch) {
    var q = 'torrent-to-download';

    ch.assertQueue(q, {durable: true});
    console.log(" [*] Waiting for messages in %s. To exit press CTRL+C", q);
    ch.consume(q, function(msg) {
      console.log(" [x] Received %s", msg.content.toString());

      var btih = msg.content.toString();
      var engine = torrentStream(fs.readFileSync('/var/www/public/download/torrent/'+btih+'.torrent'));
      engine.on('ready', function() {
		var i = 0;
		engine.files.forEach(function(file) {
			console.log('"'+file.name.split('.').pop()+'"');
				if (file.name.split('.').pop() != 'mp4')
					return ;
				i++;
				console.log('filename:', file.name);
				if (i > 1)
				{
					return;
				}
				console.log('ogogog');
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
					    .stream().pipe(fs.createWriteStream('/var/www/public/download/stream/'+btih+'.mp4'));
	});
});
    }, {noAck: true});
  });
});
