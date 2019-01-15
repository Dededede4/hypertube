import React from 'react';
import Stars from '../components/stars';

const video = {
  title: 'Rabbit',
  productor: 'egg',
  actor: 'the white rabbit',
  date: '2018',
  duration: '1h30',
  rate: 4,
  description: 'Ad vitam aeternm blablabla patati patatat...',
};

const MoviePage = ({ match }) => (
  <div>
    <h1 className="title" style={{ textAlign: 'center' }}>
      {video.title}
    </h1>
    <video height="640" with="360" style={{ display: 'block', margin: '0 auto' }} controls>
      <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4" />
    </video>
    <hr />
    <article className="box" style={{ width: '100%', position: 'relative' }}>
      <div className="columns">
        <div className="column">
          Productor :
          <p className="subtitle">
            <b>{video.productor}</b>
          </p>
          Actor:
          <p className="subtitle">
            <b>{video.actor}</b>
          </p>
          Date:
          <p className="subtitle">
            <b>{video.date}</b>
          </p>
        </div>
        <div className="column">
          Duration:
          <p className="subtitle">
            <b>{video.duration}</b>
          </p>
          Description:
          <p className="subtitle">
            <b>{video.description}</b>
          </p>
          Rate:
          <p className="subtitle">
            <b>
              <Stars rate={video.rate} />
            </b>
          </p>
        </div>
      </div>
    </article>
  </div>
);

export default MoviePage;
