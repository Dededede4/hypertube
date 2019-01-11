import React from "react"
import langue from '../modules/langage'

const NavBar = ({onLangChange}) => (
<nav className="navbar is-transparent">
  <div className="navbar-brand">
    <div className="navbar-burger burger" data-target="langages_options">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="langages_options" className="navbar-menu">
    <div className="navbar-start">
      <a onClick={onLangChange("francais")} className="navbar-item">
        🇫🇷
      </a>
      <div className="navbar-item">
        <a onClick={onLangChange("english")} className="navbar-item" >
        🇬🇧
        </a>
      </div>
    </div>

    <div className="navbar-end">
      <div className="navbar-item">
        <div className="field is-grouped">
          <p className="control">
            <a className="bd-tw-button button">
              <span>
              <span>{langue.translate('profile')}</span>
              </span>
            </a>
          </p>
          <p className="control">
            <a className="button is-danger" >
              <span>{langue.translate('disconnect')}</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>
)

export default NavBar;