import React from 'react';
import { BrowserRouter as Router, withRouter, Route, Link, Switch, Redirect } from "react-router-dom";
import logo from './logo.svg';
import './App.css';

const loginFn = history => e => {
  console.log(e.button)
  sessionStorage.setItem('TOKEN', 'MDR');
  history.push('/');
}

const changement = e => {
  console.log(e.nativeEvent.target.value)
}

const Index = () => <h1>INDEX</h1>
const About = () => <h1>About</h1>
const Users = () => <h1>Users</h1>
const Login = withRouter(({history}) => (
  <div>
  username:
  <input onChange={changement} type="text" />
  password:
  <input type="password" />
  <button onClick={loginFn(history)}>Submmit</button>
  </div>
  ))

  // const Login = () => (
  // <div>
  // username:
  // <input type="text" />
  // password:
  // <input type="password" />
  // <button onClick={loginFn(history)}>Submmit</button>
  // </div>
  // )
  
const PrivateRoute = ({component: Component}, ...rest) =>(
  <Route
  {...rest}
  render={props => 
    sessionStorage.getItem('TOKEN') ? 
    <Component {...props} /> :
    <Redirect to={{pathname: '/login'}} />

  }
  />
)

class App extends React.Component {
  render() {
    return (
      <div>
      <Router>
      <div>
       <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/about/">About</Link>
          </li>
          <li>
            <Link to="/users/">Users</Link>
          </li>
        </ul>
      </nav>
      <Switch>
        <PrivateRoute path="/" exact component={Index} />
        <PrivateRoute path="/about/"  component={About} />
        <PrivateRoute path="/users/" component={Users} />
        <Route path="/login/" component={Login} />
        </Switch>
        </div>
        </Router>
      </div>
    );
  }
}

export default App;
