import React from 'react';

const Stars = ({ rate }) => (
  <span>
    <span className={rate >= 1 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span className={rate >= 2 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span className={rate >= 3 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span className={rate >= 4 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span className={rate >= 5 ? 'fa fa-star checked' : 'fa fa-star'} />
  </span>
);

export default Stars;
