import React from 'react';
import { debounce } from 'lodash';
import { withState } from 'recompose';

const ControlledInput = props => {
  console.log(props);
  const debounced = debounce(e => props.onChange(e), 500);
  const cb = e => {
    debounced(e.target.value);
  };
  return <input {...props} onChange={cb} />;
};

const enhance = withState('input', 'setInput', '');

export default enhance(ControlledInput);
