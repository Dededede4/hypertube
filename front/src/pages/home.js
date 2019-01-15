import React from 'react';
import { withRouter } from 'react-router';
import langue from '../modules/langage';
import Stars from '../components/stars';

const searchBarStyle = {
  width: '60%',
  marginLeft: '20%',
};

const noData = 'https://bedekodzic.pl/wp-content/uploads/2018/05/%EF%BC%9F.png';

const movies = [
  {
    id: '122325435',
    title: 'Matrix',
    pic: null,
    rate: 5,
    date: 2000,
  },
  {
    id: '654647575',
    title: 'Guilhem',
    pic: null,
    rate: 5,
    date: 1887,
  },
  {
    id: '1232324324',
    title: 'mprevot',
    pic: null,
    rate: 0,
    date: 2000,
  },
  {
    id: '9879799',
    title: 'Matr ix',
    pic: null,
    rate: 3,
    date: 2000,
  },
  {
    id: '6546546',
    title: 'Matrdsadsadix',
    pic: null,
    rate: 2,
    date: 2000,
  },
  {
    id: '5',
    title: 'Maaaatrix',
    pic: null,
    rate: 1,
    date: 2023,
  },
  {
    id: '5435435',
    title: 'hypertube',
    pic: null,
    rate: 5,
    date: 2014,
  },
  {
    id: '7657',
    title: '42',
    pic: null,
    rate: 5,
    date: 2013,
  },
  {
    id: '32424',
    title: 'Matrix',
    pic: null,
    rate: 0,
    date: 200,
  },
];

const wraper = {
  marginTop: '4em',
  display: 'grid',
  gridTemplateColumns: 'repeat(3, 1fr)',
  gridGap: '10px',
};

const HomePage = ({ history }) => (
  <div>
    <input
      style={searchBarStyle}
      className="input is-large "
      type="text"
      placeholder={langue.translate('search')}
    />
    <div style={wraper}>
      {movies.map(movie => (
        <div
          class="card"
          style={{ cursor: 'pointer' }}
          onClick={() => history.push(`/movie/${movie.id}`)}
        >
          <div class="card-image">
            <figure class="image is-4by3">
              <img src={movie.pic || noData} alt="Placeholder image" />
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{movie.title}</p>
                <p class="subtitle is-6">{movie.date}</p>
              </div>
            </div>
            <div class="content">
              <Stars rate={movie.rate} />
            </div>
          </div>
        </div>
      ))}
    </div>
  </div>
);

export default withRouter(HomePage);
