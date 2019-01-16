import React from 'react';
import { withRouter } from 'react-router';
import langue from '../modules/langage';
import Stars from '../components/stars';

const searchBarStyle = {
  width: '60%',
  marginLeft: '20%',
};

const noData = 'https://bedekodzic.pl/wp-content/uploads/2018/05/%EF%BC%9F.png';

const moviesData = [
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

const MovieCard = withRouter(({ history, movie }) => (
  <div
    className="card"
    style={{ cursor: 'pointer' }}
    onClick={() => history.push(`/movie/${movie.id}`)}
  >
    <div className="card-image">
      <figure className="image is-4by3">
        <img src={movie.pic || noData} alt="Placeholder" />
      </figure>
    </div>
    <div className="card-content">
      <div className="media">
        <div className="media-content">
          <p className="title is-4">{movie.title}</p>
          <p className="subtitle is-6">{movie.date}</p>
        </div>
      </div>
      <div className="content">
        <Stars rate={movie.rate} />
      </div>
    </div>
  </div>
));

class HomePage extends React.Component {
  state = { movies: [] };

  scrollcb = () => {
    if (window.scrollY + window.innerHeight + 40 >= document.getElementById('root').offsetHeight) {
      this.state.movies.push(...moviesData);
      this.setState({ movies: this.state.movies });
      console.log('Hey', window.scrollY, moviesData);
    }
  };

  componentDidMount() {
    this.setState({ movies: moviesData.slice(0) });
    window.addEventListener('scroll', this.scrollcb);
  }

  componentWillUnmount() {
    window.grid.removeEventListener('scroll', this.scrollcb);
  }

  render() {
    return (
      <div>
        <input
          style={searchBarStyle}
          className="input is-large "
          type="text"
          placeholder={langue.translate('search')}
        />
        <div ref={elem => (this.grid = elem)} className="Movies-grid">
          {console.log(this.state.movies)}
          {this.state.movies.map((movie, index) => (
            <MovieCard key={index} movie={movie} />
          ))}
        </div>
      </div>
    );
  }
}

export default withRouter(HomePage);
