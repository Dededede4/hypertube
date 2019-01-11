import React from 'react';
import { BrowserRouter as Router, withRouter, Route, Link, Switch, Redirect } from "react-router-dom";
import logo from './logo.svg';
import './App.css';
import NavBar from './components/navbar.js'
import langue from './modules/langage'

const Index = () => <h1>INDEX</h1>
const About = () => <h1>About</h1>
const Users = () => <h1>Users</h1>

class App extends React.Component {
  state = {
    langue: langue.lang
  }

  changeLangage = new_lang => e => {
    if (langue.change_langage(new_lang))
      this.setState({langue: new_lang})
  }

  render() {
    return (
      <div>
        <NavBar onLangChange={this.changeLangage} />
      <Router>
      <Switch>
        <Route path="/"  component={Index} />
        <Route path="/about/"  component={About} />
        <Route path="/users/" component={Users} />
        </Switch>
        </Router>
      </div>
    );
  }
}

export default App;
