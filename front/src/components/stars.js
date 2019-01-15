import React from 'react';

const Stars = ({ rate }) => (
  <span>
    <span class={rate >= 1 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span class={rate >= 2 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span class={rate >= 3 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span class={rate >= 4 ? 'fa fa-star checked' : 'fa fa-star'} />
    <span class={rate >= 5 ? 'fa fa-star checked' : 'fa fa-star'} />
  </span>
);

export default Stars;
